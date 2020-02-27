<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "app_log".
 *
 * @property int $id
 * @property int $id_user
 * @property string $module
 * @property string $activity
 * @property string $timestamp
 */
class AppLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'module', 'activity'], 'required'],
            [['id_user'], 'integer'],
            [['timestamp'], 'safe'],
            [['module', 'activity'], 'string', 'max' => 50],
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
            'module' => 'Module',
            'activity' => 'Activity',
            'timestamp' => 'Timestamp',
        ];
    }
}
