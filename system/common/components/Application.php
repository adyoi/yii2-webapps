<?php

namespace common\components;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\base\Component;
use yii\base\InvalidConfigException;
use backend\models\AppLog;
use backend\models\AppLogd;
 
class Application extends Component
{
	public function log($activity)
	{
        $log = new AppLog();
        $log->module = Yii::$app->controller->module->id . '/' . Yii::$app->controller->id;
        $log->id_user = Yii::$app->user->getIsGuest() ? 0 : Yii::$app->user->identity->id;
        $log->activity = $activity;
        $log->save();
	}

    public function log_update($table_name, $update)
    {
        $log = new AppLogd();
        $log->id_user = Yii::$app->user->getIsGuest() ? 0 : Yii::$app->user->identity->id;
        $log->table_name = $table_name;
        $log->update = $update;
        $log->save();
    }
}
