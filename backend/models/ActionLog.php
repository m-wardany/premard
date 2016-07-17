<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "action_log".
 *
 * @property integer $id
 * @property string $ip
 * @property string $date_time
 */
class ActionLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'action_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ip', 'date_time'], 'required'],
            [['date_time'], 'safe'],
            [['ip'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
            'date_time' => 'Date Time',
        ];
    }
}
