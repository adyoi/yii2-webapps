<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "app_loga".
 *
 * @property int $id
 * @property int $id_user
 * @property string $name
 * @property string $update
 * @property string $ip_address
 * @property string|null $user_agent
 * @property string $timestamp
 */
class AppLoga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_loga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user'], 'integer'],
            [['name', 'update', 'ip_address'], 'required'],
            [['update', 'user_agent'], 'string'],
            [['timestamp'], 'safe'],
            [['name'], 'string', 'max' => 50],
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
            'name' => 'Name',
            'update' => 'Update',
            'ip_address' => 'Ip Address',
            'user_agent' => 'User Agent',
            'timestamp' => 'Timestamp',
        ];
    }
}
