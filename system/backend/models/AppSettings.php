<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "app_settings".
 *
 * @property string $code
 * @property string $value
 */
class AppSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'value'], 'required'],
            [['code'], 'string', 'max' => 50],
            [['value'], 'string', 'max' => 255],
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
            'value' => 'Value',
        ];
    }
}
