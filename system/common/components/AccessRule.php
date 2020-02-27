<?php

namespace common\components;

use Yii;

class AccessRule extends \yii\filters\AccessRule {

    /**
     * @inheritdoc
     */
    protected function matchRole($user)
    {
        if (!$user->getIsGuest())
        {
            $access = \backend\models\UserAccess::findOne([
                'level' => Yii::$app->user->identity->level, 
                'module' => Yii::$app->controller->module->id, 
                'controller' => Yii::$app->controller->id
            ]);

            if (is_null($access) == false)
            {
                $auth = \yii\helpers\BaseJson::decode($access['action'], true);

                if (array_key_exists(Yii::$app->controller->action->id, $auth))
                {
                    return $auth[Yii::$app->controller->action->id];
                }
            }
        }

        $messages = 'You are not authorized to access this page!

                     1. Please contact the Administrator
                     2. Setting the "User Access" page on the [User -> User Access] menu

                     Thanks.';

        throw new \yii\web\ForbiddenHttpException($messages);
    }

    public static function getRules() 
    {
        $access = array();

        if (!Yii::$app->user->getIsGuest())
        {
            $access = \backend\models\UserAccess::findOne([
                'level' => Yii::$app->user->identity->level, 
                'module' => Yii::$app->controller->module->id, 
                'controller' => Yii::$app->controller->id
            ]);

            if (is_null($access) === false)
            {
                $auth = \yii\helpers\BaseJson::decode($access['action'], true);

                $auth_true = [];
                $auth_false = [];

                foreach ($auth as $key => $value) 
                {
                    if ($value === true) 
                    {
                        $auth_true[] = $key;
                    }
                    else
                    {
                        $auth_false[] = $key;
                    }
                }

                $role_true = [
                    'actions' => $auth_true, 
                    'allow' => true,
                ];

                $role_false = [
                    'actions' => $auth_false, 
                    'allow' => false,
                ];
                
                return array($role_true, $role_false);
            }

            return array();
        }

        $messages = 'The requested page does not exist. (Access Rules) ' . (count($access) > 0 ? json_encode($access) : '');
        throw new \yii\web\ForbiddenHttpException($messages);
    }

}