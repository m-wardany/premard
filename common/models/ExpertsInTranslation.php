<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "experts_in_translation".
 *
 * @property integer $id
 * @property integer $expert_id
 * @property string $language_code
 * @property string $title
 *
 * @property ExpertsIn $expert
 */
class ExpertsInTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'experts_in_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['expert_id'], 'integer'],
            [['language_code'], 'string', 'max' => 5],
            [['title'], 'string', 'max' => 45],
            [['expert_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExpertsIn::className(), 'targetAttribute' => ['expert_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'expert_id' => 'Expert ID',
            'language_code' => 'Language Code',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpert()
    {
        return $this->hasOne(ExpertsIn::className(), ['id' => 'expert_id']);
    }
}
