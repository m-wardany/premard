<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $id
 * @property string $logo
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['logo', 'image', 'extensions' => 'jpg, jpeg, gif, png','skipOnEmpty'=>true ,'on' => [ 'update']],
            ['logo', 'image', 'extensions' => 'jpg, jpeg, gif, png','skipOnEmpty'=>false ,'on' => ['insert']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'logo' => Yii::t('app', 'Logo'),
        ];
    }
    
    
    function behaviors()
    {
        $baseurl = isset(Yii::$app->components['urlManagerFrontEnd']) ? Yii::$app->urlManagerFrontEnd->baseUrl : Yii::$app->urlManager->baseUrl ;
        return [
            [
                'class' => \backend\components\UploadImageBehavior::className(),
                'attributes' => ['logo'],
                'scenarios' => ['insert', 'update'],
                'path' => '@frontend/web/media/clients/{id}',
                'url' => "$baseurl/media/clients/{id}",                
                'unlinkOnDelete'=>true,
                'thumbs' => [
                    'thumb' => ['width' => 300, 'height' => 300, 'mode'=>  \Imagine\Image\ImageInterface::THUMBNAIL_INSET],
                    'preview' => ['width' => 100, 'height' => 100, 'mode'=>  \Imagine\Image\ImageInterface::THUMBNAIL_INSET],
               ],
            ],
        ];
    }
}
