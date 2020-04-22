<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_menu".
 *
 * @property int $id Menu
 * @property int $id_sub Submenu Level 1
 * @property int $id_sub2 Submenu Level 2
 * @property string $level
 * @property string $module
 * @property string $class
 * @property string|null $url_controller
 * @property string|null $url_view
 * @property string|null $url_parameter param1=value1,param2=value2
 * @property int $seq
 * @property string|null $icon
 * @property string|null $name
 */
class UserMenu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sub', 'id_sub2', 'seq'], 'integer'],
            [['level', 'module'], 'required'],
            [['class'], 'string'],
            [['level', 'module', 'url_controller', 'url_view', 'url_parameter', 'icon', 'name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Menu',
            'id_sub' => 'Submenu Level 1',
            'id_sub2' => 'Submenu Level 2',
            'level' => 'User Level',
            'module' => 'Module',
            'class' => 'Class',
            'url_controller' => 'Url Controller',
            'url_view' => 'Url View',
            'url_parameter' => 'Url Parameter',
            'seq' => 'Sequence',
            'icon' => 'Icon',
            'name' => 'Name',
        ];
    }
}
