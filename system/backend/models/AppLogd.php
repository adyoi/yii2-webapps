<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "app_logd".
 *
 * @property int $id
 * @property int $id_user
 * @property string|null $table_name
 * @property string|null $update
 * @property string $timestamp
 */
class AppLogd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_logd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user'], 'integer'],
            [['update'], 'string'],
            [['timestamp'], 'safe'],
            [['table_name'], 'string', 'max' => 50],
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
            'table_name' => 'Table Name',
            'update' => 'Update',
            'timestamp' => 'Timestamp',
        ];
    }
}
