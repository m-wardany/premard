<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "home_slider".
 *
 * @property integer $id
 * @property integer $page_id
 * @property string $image
 *
 * @property Page $page
 * @property PortfolioTranslation[] $translations
 */
class Portfolio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio';
    }

    /**
     * @inheritdoc
     */
    public function _rules()
    {
        return [
//            [['page_id'], 'integer'],
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png','skipOnEmpty'=>true ,'on' => [ 'update'],'minWidth'=>300],
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png','skipOnEmpty'=>false ,'on' => ['insert'],'minWidth'=>300],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['page_id' => 'id']],
        ];
    }

    public function behaviors() {
        $baseurl = isset(Yii::$app->components['urlManagerFrontEnd']) ? Yii::$app->urlManagerFrontEnd->baseUrl : Yii::$app->urlManager->baseUrl ;
        return[
            [
                'class'=>\backend\components\MultipleLanguage::className(),
                'translatedAttributes'=>['title', 'text', 'link_text']
            ],
            [
                'class' => \backend\components\UploadImageBehavior::className(),
                'attributes' => ['image'],
                'scenarios' => ['insert', 'update'],
                'path' => '@frontend/web/media/portfolio/{id}',
                'url' => "$baseurl/media/portfolio/{id}",                
                'unlinkOnDelete'=>true,
                'thumbs' => [
                    'thumb' => ['width' => 300, 'height' => 300, 'mode'=> \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND],
                    'preview' => ['width' => 100, 'height' => 100, 'mode'=> \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND],
               ],
            ],
        ];
        
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Linked to page',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {   
        return $this->hasOne(Page::className(), ['id' => 'page_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslations()
    {
        return $this->hasMany(PortfolioTranslation::className(), ['slide_id' => 'id']);
    }
        
    public function beforeDelete() {
        parent::beforeDelete();
        $this->unlinkAll("translations",true);
        return TRUE;
    }
}
