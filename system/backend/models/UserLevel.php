<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_level".
 *
 * @property string $code
 * @property string $type
 * @property string $name
 */
class UserLevel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_level';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'type', 'name'], 'required'],
            [['code'], 'string', 'max' => 10],
            [['type'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 50],
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
            'type' => 'Type',
            'name' => 'Name',
        ];
    }
}
