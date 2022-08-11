<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        // Bypass Validation Here
        $model->auth_key = 'AUTH_KEY';
        $model->password_hash = 'PASSWORD_HASH';
        $model->created_at = time();
        $model->updated_at = time();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $image = UploadedFile::getInstance($model, 'image');

            if ($image)
            {
                $file = Yii::$app->params['upload'] . 'user/' . $model->username . '.' . $image->extension;
                $path = Yii::getAlias('@webroot') . $file;
                $image->saveAs($path);
                $model->image = $file;
            }

            $model->auth_key = Yii::$app->security->generateRandomString();
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->password);
            $model->save();

            /* Application Log Database */
            $table_name = $model->getTableSchema()->name;
            $table_update = Yii::$app->request->post()[$model->formName()];
            Yii::$app->application->log_update($table_name.'/create', json_encode($table_update));
            
            Yii::$app->getSession()->setFlash('user_update_save', [
                    'type'     => 'success',
                    'duration' => 5000,
                    'title'    => 'System Information',
                    'message'  => 'Data Created !',
                ]
            );
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else
        {
            if ($model->errors)
            {
                $message = "";
                foreach ($model->errors as $key => $value) {
                    foreach ($value as $key1 => $value2) {
                        $message .= $value2 . "<br>";
                    }
                }
                Yii::$app->getSession()->setFlash('user_create', [
                        'type'     => 'error',
                        'duration' => 5000,
                        'title'  => 'Error',
                        'message'  => $message,
                    ]
                );
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        /* -------------------------------------- START DEMO VERSION ----------------------------------------- */

        if (in_array($id, [1,2,3,4,5]))
        {
            Yii::$app->getSession()->setFlash('user_update_demo', [
                    'type'     => 'error',
                    'duration' => 5000,
                    'title'    => 'Yii2-Webapps DEMO',
                    'message'  => 'Data Failed to Update',
                ]
            );

            return $this->redirect(['view', 'id' => $id]);
        }

        /* -------------------------------------- END DEMO VERSION ----------------------------------------- */

        $model = $this->findModel($id);

        // Bypass Validation Here
        $model->auth_key = 'AUTH_KEY';
        $model->password_hash = 'PASSWORD_HASH';
        $model->created_at = $model->created_at;
        $model->updated_at = time();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $image = UploadedFile::getInstance($model, 'image');

            if ($image)
            {
                $file = Yii::$app->params['upload'] . 'user/' . $model->username . '.' . $image->extension;
                $path = Yii::getAlias('@webroot') . $file;
                $image->saveAs($path);
                $model->image = $file;
            }
            else
            {
                $path = $this->findModel($id);
                $model->image = $path->image;
            }

            $model->auth_key = Yii::$app->security->generateRandomString();
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->password);
            $model->save();

            /* Application Log Database */
            $table_name = $model->getTableSchema()->name;
            $table_update = Yii::$app->request->post()[$model->formName()];
            Yii::$app->application->log_update($table_name.'/update', json_encode($table_update));

            if (Yii::$app->user->identity->id === $model->id)
            {
                /* Feedback Message */
                Yii::$app->getSession()->setFlash('user_update_save', [
                        'type'     => 'success',
                        'duration' => 5000,
                        'title'    => 'System Information',
                        'message'  => 'Password has change, Please Login again !',
                    ]
                );

                return $this->redirect(['site/index']);
            }
            else
            {
                /* Feedback Message */
                Yii::$app->getSession()->setFlash('user_update_save', [
                        'type'     => 'success',
                        'duration' => 5000,
                        'title'    => 'System Information',
                        'message'  => 'Data Updated !',
                    ]
                );
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        else
        {
            if ($model->errors)
            {
                $message = "";
                foreach ($model->errors as $key => $value) {
                    foreach ($value as $key1 => $value2) {
                        $message .= $value2 . "<br>";
                    }
                }
                Yii::$app->getSession()->setFlash('user_update', [
                        'type'     => 'error',
                        'duration' => 5000,
                        'title'    => 'Error',
                        'message'  => $message,
                    ]
                );
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        /* -------------------------------------- START DEMO VERSION ----------------------------------------- */

        if (in_array($id, [1,2,3,4,5]))
        {
            Yii::$app->getSession()->setFlash('user_delete_demo', [
                    'type'     => 'error',
                    'duration' => 5000,
                    'title'    => 'Yii2-Webapps DEMO',
                    'message'  => 'Data Failed to Delete',
                ]
            );

            return $this->redirect(['view', 'id' => $id]);
        }

        /* -------------------------------------- END DEMO VERSION ----------------------------------------- */

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
