<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_type".
 *
 * @property string $code
 * @property string $table
 *
 * @property UserLevel[] $userLevels
 */
class UserType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'table'], 'required'],
            [['code'], 'string', 'max' => 2],
            [['table'], 'string', 'max' => 50],
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
            'table' => 'Table',
        ];
    }

    /**
     * Gets query for [[UserLevels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserLevels()
    {
        return $this->hasMany(UserLevel::className(), ['type' => 'code']);
    }
}
