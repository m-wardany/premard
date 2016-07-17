<?php

namespace common\models;

use backend\components\UploadImageBehavior;
use Imagine\Image\ImageInterface;
use Yii;

/**
 * This is the model class for table "language".
 *
 * @property integer $id
 * @property string $code
 * @property string $title
 * @property string $flag
 *
 * @property ContentTranslation[] $contentTranslations
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code','title'],'unique'],
            [['code','title'],'required'],
            [['code'], 'string', 'max' => 5],
            [['title'], 'string', 'max' => 45],
            ['flag', 'image', 'extensions' => 'jpg, jpeg, gif, png','skipOnEmpty'=>true ,'on' => [ 'update']],
            ['flag', 'image', 'extensions' => 'jpg, jpeg, gif, png','skipOnEmpty'=>false ,'on' => ['insert']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'title' => Yii::t('app', 'Title'),
            'flag' => Yii::t('app', 'Flag'),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $baseurl = isset(Yii::$app->components['urlManagerFrontEnd']) ? Yii::$app->urlManagerFrontEnd->baseUrl : Yii::$app->urlManager->baseUrl ;
        return [
            [
                'class' => UploadImageBehavior::className(),
                'attributes' => ['flag'],
                'scenarios' => ['insert', 'update'],
                'path' => '@frontend/web/media/languages/{id}',
                'url' => "$baseurl/media/languages/{id}",                
                'unlinkOnDelete'=>true,
                'thumbs' => [
                    'thumb' => ['width' => 24, 'height' => 18, 'mode'=>  ImageInterface::THUMBNAIL_OUTBOUND],
                ],
            ],
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContentTranslations()
    {
        return $this->hasMany(ContentTranslation::className(), ['language_id' => 'id']);
    }
    
    public function getTitleById($id) {
        $model = self::findOne($id);
        return $model ? $model->title:"";
    }
    public function getCodeById($id) {
        $model = self::findOne($id);
        return $model ? $model->code:"";
    }
    public function getLangIdByCode($code) {
        $model = self::find()->where("code ='$code'")->one();
        return $model ? $model->id:0;
    }
}
