<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "experts_in".
 *
 * @property integer $id
 * @property string $image
 *
 * @property ExpertsInTranslation[] $translations
 */
class ExpertsIn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'experts_in';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png','skipOnEmpty'=>true ,'on' => [ 'update']],
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png','skipOnEmpty'=>false ,'on' => ['insert']],
        ];
    }
    
    public function behaviors() {
        $baseurl = isset(Yii::$app->components['urlManagerFrontEnd']) ? Yii::$app->urlManagerFrontEnd->baseUrl : Yii::$app->urlManager->baseUrl ;
        return[
            [
                'class'=>\backend\components\MultipleLanguage::className(),
                'translatedAttributes'=>['title']
            ],            
            [
                'class' => \backend\components\UploadImageBehavior::className(),
                'attributes' => ['image'],
                'scenarios' => ['insert', 'update'],
                'path' => '@frontend/web/media/experts-in/{id}',
                'url' => "$baseurl/media/experts-in/{id}",                
                'unlinkOnDelete'=>true,
                
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
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslations()
    {
        return $this->hasMany(ExpertsInTranslation::className(), ['expert_id' => 'id']);
    }
    
    public function beforeDelete() {
        parent::beforeDelete();
        $this->unlinkAll("translations",true);
        return TRUE;
    }
}
