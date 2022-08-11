<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property int $id
 * @property string $number
 * @property string $code_customer
 * @property string $datetime
 * @property string $name
 * @property string $type
 * @property int $value
 * @property int $id_user
 * @property string $timestamp
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'code_customer', 'datetime', 'name', 'type'], 'required'],
            [['datetime', 'timestamp'], 'safe'],
            [['value', 'id_user'], 'integer'],
            [['number', 'code_customer', 'type'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'code_customer' => 'Code Customer',
            'datetime' => 'Datetime',
            'name' => 'Name',
            'type' => 'Type',
            'value' => 'Value',
            'id_user' => 'Id User',
            'timestamp' => 'Timestamp',
        ];
    }
}
