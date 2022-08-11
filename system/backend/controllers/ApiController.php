<?php

namespace backend\controllers;

use Yii;
use yii\filters\Cors;
use yii\web\Response;
use yii\rest\ActiveController;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

class ApiController extends ActiveController
{
	// The model class name. This property must be set.
    public $modelClass = 'backend\models\AppLoga';

	public function behaviors()
	{
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => Cors::className(),    
            'cors' => [
                // restrict access to
                'Origin' => ['localhost', '127.0.0.1'],
                // Allow only POST and PUT methods
                'Access-Control-Request-Method' => ['GET', 'POST'],
                // Allow only headers 'X-Wsse'
                'Access-Control-Request-Headers' => ['X-Wsse'],
                // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                'Access-Control-Allow-Credentials' => true,
                // Allow OPTIONS caching
                'Access-Control-Max-Age' => 3600,
                // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
            ],
        ];

        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON; // || Response::FORMAT_XML

        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'except' => [

            	/* --- Custom API -- */

            	'ip',

            	/* --- $modelClass --- */

                'index',
				'view',
				//'create',  // uncomment for authorization
				//'update',  // uncomment for authorization
				//'delete',  // uncomment for authorization
				//'options', // uncomment for authorization
            ],
            'authMethods' => [
                HttpBasicAuth::className(),
                HttpBearerAuth::className(),
                QueryParamAuth::className(),
            ],
        ];

        /* --- With Basic Authorization --- */

        $behaviors['basicAuth'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => function ($username, $password) {
                $user = \common\models\User::find()->where(['username' => $username])->one();
                    if ($user->validatePassword($password)) {
                        return $user;
                }
                return null;
            },
        ];

        return $behaviors;
    }
    
    public function actionIp() {

        $callback = [];
        $callback['user_ip'] = Yii::$app->getRequest()->getUserIP();
        $callback['user_agent'] = Yii::$app->getRequest()->getUserAgent();

        /* ---------------------- START APP LOG API ---------------------- */
        $app_loga             = new \backend\models\AppLoga();
        $app_loga->id_user    = Yii::$app->user->identity->id;
        $app_loga->name       = 'API_IP';                                     // Change Name API
        $app_loga->update     = json_encode($callback);                       // Summary Callback
        $app_loga->ip_address = Yii::$app->getRequest()->getUserIP();
        $app_loga->user_agent = Yii::$app->getRequest()->getUserAgent();
        $app_loga->save(false);
        /* ---------------------- (PLACE BEFORE RETURN) ---------------------- */

        return $callback;
    }

}
