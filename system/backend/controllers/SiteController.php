<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\UserLog;
use backend\models\AppSettings;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'captcha'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get', 'post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fontFile' => '@webroot/fonts/DejaVuSanssr.ttf',
                'foreColor' => 0x17a2b8,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        Yii::$app->cache->flush();
        
        if (!Yii::$app->user->isGuest) 
        {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) 
        {
            $app_settings = AppSettings::findOne(['code' => 'SETTING_LOCK_LOGIN_IP']);

            if ($app_settings['value'] === 'YES')
            {
                if (UserLog::find()
                    ->where(['id_user' => Yii::$app->user->identity->id])
                    ->andWhere(['<>', 'ip_address', Yii::$app->getRequest()->getUserIP()])
                    ->exists())
                {
                    $username = Yii::$app->user->identity->username;
                    Yii::$app->user->logout();
                    Yii::$app->application->log('Attemping Login');
                    Yii::$app->getSession()->setFlash('login', 
                        [
                            'type'     => 'warning',
                            'duration' => 5000,
                            'title'    => 'System Information',
                            'message'  => "Username : $username has login in another IP Address,<br>Make sure you are Logout before closing the Browser.<br>Please contact Administrator",
                        ]
                    );

                    return $this->redirect(['login']);
                }
                else
                {
                    $log             = new UserLog();
                    $log->id_user    = Yii::$app->user->identity->id;
                    $log->ip_address = Yii::$app->getRequest()->getUserIP(); 
                    $log->user_agent = Yii::$app->getRequest()->getUserAgent();
                    $log->save();

                    Yii::$app->application->log('Login');
                    Yii::$app->getSession()->setFlash('login', 
                        [
                            'type'     => 'success',
                            'duration' => 5000,
                            'title'    => 'System Information',
                            'message'  => "Login Success at " . date('Y-m-d H:i:s'),
                        ]
                    );

                    return $this->goBack();
                }

            }

            $log             = UserLog::find()->where(['id_user' => Yii::$app->user->identity->id])->one() ?: new UserLog;
            $log->id_user    = Yii::$app->user->identity->id;
            $log->ip_address = Yii::$app->getRequest()->getUserIP(); 
            $log->user_agent = Yii::$app->getRequest()->getUserAgent();
            $log->save();

            Yii::$app->getSession()->setFlash('login', 
                [
                    'type'     => 'success',
                    'icon'     => 'icon-alert',
                    'title'    => 'System Information',
                    'message'  => "Login Success at " . date('Y-m-d H:i:s'),
                ]
            );  

            return $this->goBack();

        } 
        else 
        {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->application->log('Logout');

        $app_settings = AppSettings::findOne(['code' => 'SETTING_LOCK_LOGIN_IP']);

        if ($app_settings['value'] === 'YES')
        {
            foreach (UserLog::find()->where([
                'id_user' => Yii::$app->user->identity->id, 
                'ip_address' => Yii::$app->getRequest()->getUserIP()
            ])->all() as $log) 
            {
                $log->delete();
            }
        }
        else
        {
            foreach (UserLog::find()->where([
                'id_user' => Yii::$app->user->identity->id
            ])->all() as $log) 
            {
                $log->delete();
            }
        }

        Yii::$app->user->logout();
        Yii::$app->session->close();
        Yii::$app->session->destroy();
        Yii::$app->getSession()->setFlash('logout', 
            [
                'type'     => 'success',
                'duration' => 5000,
                'title'    => 'System Information',
                'message'  => "Logout Success at " . date('Y-m-d H:i:s'),
            ]
        );

        return $this->goHome();
    }
}
