<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "home_slider_translation".
 *
 * @property integer $id
 * @property integer $slide_id
 * @property integer $language_code
 * @property string $title
 * @property string $text
 *
 * @property HomeSlider $slide
 * @property Language $language
 */
class HomeSliderTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'home_slider_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['slide_id'], 'integer'],
            [['language_code'], 'string', 'max' => 5],
            [['text','title'], 'string', 'max' => 255],
            [['slide_id'], 'exist', 'skipOnError' => true, 'targetClass' => HomeSlider::className(), 'targetAttribute' => ['slide_id' => 'id']],
            [['language_code'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_code' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slide_id' => 'Slide ID',
            'language_code' => 'Language Code',
            'title' => 'Title',
            'text' => 'Text',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlide()
    {
        return $this->hasOne(HomeSlider::className(), ['id' => 'slide_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['code' => 'language_code']);
    }
}
