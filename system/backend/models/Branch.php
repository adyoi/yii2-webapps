<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "branch".
 *
 * @property string $code
 * @property string $bch_type
 * @property string $bch_name
 * @property string $bch_address
 *
 * @property Customer[] $customers
 */
class Branch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branch';
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
            [['code', 'bch_type', 'bch_name', 'bch_address'], 'required'],
            [['code', 'bch_type', 'bch_name'], 'string', 'max' => 50],
            [['bch_address'], 'string', 'max' => 255],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'bch_type' => 'Type',
            'bch_name' => 'Name',
            'bch_address' => 'Address',
        ];
    }

    /**
     * Gets query for [[Customers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['code_branch' => 'code']);
    }
}
