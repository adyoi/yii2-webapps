<?php

namespace backend\controllers;

use backend\models\UserType;
use backend\models\UserLevel;
use backend\models\Branch;
use backend\models\Customer;

class ReffController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUserType($code)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $callback = [
            'status' => false, 
            'message' => 'Unknown Error'
        ];

        if ($code)
        {
            $callback['status']  = true;
            $callback['message'] = 'Success';

            $user_level = UserLevel::find()->where(['type' => $code])->asArray()->all();

            switch ($code) 
            {
                case 'B':
                    $data_code = Branch::find()->asArray()->all();
                    break;

                case 'C':
                    $data_code = Customer::find()->asArray()->all();
                    break;

                default:
                    $data_code = [];
                    break;
            }
            $callback['data_level'] = $user_level;
            $callback['data_code']  = $data_code;
        }

        return $callback;
        
        // return json_encode($callback);
    }

}
