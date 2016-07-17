<?php

namespace common\models;

use Yii;
use backend\components\UploadImageBehavior ;
use common\models\Content ;
/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $image
 * @property integer $width
 * @property integer $height
 *
 * @property Pages[] $pages
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'width', 'height'], 'integer'],
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png','skipOnEmpty'=>true ,'on' => [ 'update']],
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png','skipOnEmpty'=>true ,'on' => ['insert']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('image', 'ID'),
            'category_id' => Yii::t('image', 'Category'),
            'image' => Yii::t('image', 'Image'),
            'width' => Yii::t('image', 'Width'),
            'height' => Yii::t('image', 'Height'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(Content::className(), ['image_id' => 'id']);
    }
    
    function behaviors()
    {
        $baseurl = isset(Yii::$app->components['urlManagerFrontEnd']) ? Yii::$app->urlManagerFrontEnd->baseUrl : Yii::$app->urlManager->baseUrl ;
        return [
            [
                'class' => UploadImageBehavior::className(),
                'attributes' => ['image'],
                'scenarios' => ['insert', 'update'],
                'path' => '@frontend/web/media/images/{id}',
                'url' => "$baseurl/media/images/{id}",                
                'unlinkOnDelete'=>true,
                'thumbs' => [
                    'thumb' => ['width' => 300, 'height' => 300, 'mode'=> \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND],
                    'preview' => ['width' => 100, 'height' => 100, 'mode'=> \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND],
               ],
            ],
        ];
    }
    
    public function getCategory(){
        $page = new Content;
        return $page->getCategories()[$this->category_id];
    }
}
