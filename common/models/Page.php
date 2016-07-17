<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $image
 *
 * @property HomeSlider[] $homeSliders
 * @property PageTranslation[] $translations
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png','skipOnEmpty'=>true ,'on' => [ 'update'],'minWidth'=>300],
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png','skipOnEmpty'=>false ,'on' => ['insert'],'minWidth'=>300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
        ];
    }
    
    
    public function behaviors() {
        $baseurl = isset(Yii::$app->components['urlManagerFrontEnd']) ? Yii::$app->urlManagerFrontEnd->baseUrl : Yii::$app->urlManager->baseUrl ;
        return[
            [
                'class'=>\backend\components\MultipleLanguage::className(),
                'translatedAttributes'=>['title', 'body']
            ],            
            [
                'class' => \backend\components\UploadImageBehavior::className(),
                'attributes' => ['image'],
                'scenarios' => ['insert', 'update'],
                'path' => '@frontend/web/media/pages/{id}',
                'url' => "$baseurl/media/pages/{id}",                
                'unlinkOnDelete'=>true,
                'thumbs' => [
                    'thumb' => ['width' => 300, 'height' => 300, 'mode'=> \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND],
                    'preview' => ['width' => 100, 'height' => 100, 'mode'=> \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND],
               ],
            ],
        ];
        
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHomeSliders()
    {
        return $this->hasMany(HomeSlider::className(), ['page_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslations()
    {
        return $this->hasMany(PageTranslation::className(), ['page_id' => 'id']);
    }
    public function beforeDelete() {
        parent::beforeDelete();
        $this->unlinkAll("translations",true);
        return TRUE;
    }
    
}
