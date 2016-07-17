<?php

namespace common\models;

use Yii;
use yii\helpers\Html;
/**
 * This is the model class for table "content_translation".
 *
 * @property integer $id
 * @property integer $content_id
 * @property integer $language_id
 * @property string $label
 * @property string $content
 *
 * @property Content $parent
 * @property Language $language
 */
class ContentTranslation extends \yii\db\ActiveRecord
{
    public $content_type ;
    public $max ;
    public $is_required ;
    public $note ;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content_id', 'language_id', 'max', 'is_required', 'content_type'], 'integer'],
            
            [['content_id', 'language_id'], 'required'],
            
            ['content', 'string','when'=>function($model){return $model->content_type == Content::CONTENT_TYPE_TEXTINPUT && $model->content_type == Content::CONTENT_TYPE_TEXTAREA;}],
            ['content', 'string', 'max' => $this->max, 'when'=>function($model){return !empty($model->max) && $model->max > 0 ;}],
            ['content', 'integer', 'when'=>function($model){return $model->content_type == Content::CONTENT_TYPE_INTEGER;}],
            ['content', 'required', 'when'=>function($model){return $model->is_required;}],
            
            [['label'], 'string', 'max' => 255],
            [['content_id'], 'exist', 'skipOnError' => true, 'targetClass' => Content::className(), 'targetAttribute' => ['content_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
        ];
    }

    public function scenarios() {
        parent::scenarios();
        return[
            'edit'=>['content'],
            'init'=>['content_id', 'language_id', 'content_type', 'max', 'is_required', 'label'],
        ];
    }
    
    public function getContent() {
        return Yii::$app->content->format($this->content);
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'content_id' => Yii::t('app', 'Content ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'label' => Yii::t('app', 'Label'),
            'content' => $this->label,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Content::className(), ['id' => 'content_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }
    
    public function getInput() {
        $attribute = "[{$this->id}]content" ;
        return Yii::$app->content->getInput($this,$attribute, $this->content_type);
    }
}
