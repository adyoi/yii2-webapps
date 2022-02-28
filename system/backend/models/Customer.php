<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property string $code
 * @property string $code_branch
 * @property string $cus_type
 * @property string $cus_name
 * @property string $cus_address
 *
 * @property Branch $codeBranch
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
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
            [['code', 'code_branch', 'cus_type', 'cus_name', 'cus_address'], 'required'],
            [['code', 'code_branch', 'cus_type', 'cus_name'], 'string', 'max' => 50],
            [['cus_address'], 'string', 'max' => 255],
            [['code'], 'unique'],
            [['code_branch'], 'exist', 'skipOnError' => true, 'targetClass' => Branch::className(), 'targetAttribute' => ['code_branch' => 'code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'code_branch' => 'Code Branch',
            'cus_type' => 'Type',
            'cus_name' => 'Name',
            'cus_address' => 'Address',
        ];
    }

    /**
     * Gets query for [[CodeBranch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodeBranch()
    {
        return $this->hasOne(Branch::className(), ['code' => 'code_branch']);
    }
}
