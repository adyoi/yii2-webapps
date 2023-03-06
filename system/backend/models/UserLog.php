<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_log".
 *
 * @property int $id
 * @property int $id_user
 * @property string $ip_address
 * @property string|null $user_agent
 * @property string $timestamp
 */
class UserLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user'], 'integer'],
            [['ip_address'], 'required'],
            [['user_agent'], 'string'],
            [['timestamp'], 'safe'],
            [['ip_address'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'ip_address' => 'Ip Address',
            'user_agent' => 'User Agent',
            'timestamp' => 'Timestamp',
        ];
    }
}
