<?php

namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use backend\models\UserType;
use backend\models\UserLevel;
use backend\models\Branch;
use backend\models\Customer;

class ReffController extends \yii\web\Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'ruleConfig' => [
                'class' => \common\components\AccessRule::className()],
                'rules' => \common\components\AccessRule::getRules(),
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        /* Application Log */
        Yii::$app->application->log($action->id);
        if (!parent::beforeAction($action)) {
            return false;
        }
        // Another code here
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function afterAction($action, $result)
    {
        $result = parent::afterAction($action, $result);
        // Code here
        return $result;
    }
    
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
