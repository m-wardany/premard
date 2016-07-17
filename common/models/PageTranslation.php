<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "page_translation".
 *
 * @property integer $id
 * @property string $language_code
 * @property integer $page_id
 * @property string $title
 * @property string $body
 *
 * @property Page $page
 * @property Language $language
 */
class PageTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id'], 'integer'],
            [['body'], 'string'],
            [['language_code'], 'string', 'max' => 5],
            [['title'], 'string', 'max' => 255],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['page_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'language_code' => 'Language Code',
            'page_id' => 'Page ID',
            'title' => 'Title',
            'body' => 'Body',
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
    public function getLanguage() 
    { 
        return $this->hasOne(Language::className(), ['code' => 'language_code']); 
    }
}
