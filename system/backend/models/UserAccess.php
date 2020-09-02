<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_access".
 *
 * @property int $id
 * @property string $level
 * @property string $module
 * @property string $controller
 * @property string $action
 * @property int $id_stamp
 * @property string $datestamp
 * @property string $timestamp
 */
class UserAccess extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_access';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['level', 'module', 'controller'], 'required'],
            [['action'], 'string'],
            [['id_stamp'], 'integer'],
            [['action', 'datestamp', 'timestamp'], 'safe'],
            [['level'], 'string', 'max' => 32],
            [['module'], 'string', 'max' => 20],
            [['controller'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level' => 'Level',
            'module' => 'Module',
            'controller' => 'Controller',
            'action' => 'Action',
            'id_stamp' => 'Id Stamp',
            'datestamp' => 'Datestamp',
            'timestamp' => 'Timestamp',
        ];
    }
}
