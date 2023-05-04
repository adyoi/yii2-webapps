<?php

namespace backend\controllers;

use Yii;
use backend\models\Transaction;
use backend\models\TransactionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransactionController implements the CRUD actions for Transaction model.
 */
class TransactionController extends Controller
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
     * Lists all Transaction models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TransactionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transaction model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if ($this->request->isAjax) 
        {
            return $this->renderAjax('_view', [ // Render Ajax to use PJAX
                'model' => $this->findModel($id),
            ]);
        } 
        else 
        {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Transaction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model   = new Transaction();
        $error   = false;
        $message = '<!-- The requested not valid -->';

        /*if ($this->request->isPost) {

            $post = $this->request->post('Transaction');
        
            $transaction = Transaction::findOne(['number' => $post['number']]);

            if ($transaction) 
            {
                $model = $transaction;
            }

            if ($model->load($this->request->post())  && $model->validate()) {

                $model->datetime = date('Y-m-d H:i:s');
                $model->id_user  = Yii::$app->user->identity->id;
                $model->save();

                if ($this->request->isAjax) 
                {
                    if ($transaction) 
                    {
                        $message = 'Data Updated';
                    } 
                    else 
                    {
                        $message = 'Data Saved';
                    }
                }
                else
                {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            else
            {
                if ($model->errors)
                {
                    $error = true;
                    $message = json_encode($model->errors);
                }
            }
        } 
        else 
        {
            if ($this->request->isAjax) 
            {
                $get = $this->request->get('number');
                $model = Transaction::findOne(['number' => $get]);
            }
            else
            {
                $model->loadDefaultValues();
            }
        }*/

        if ($this->request->isPost) {

            if ($model->load($this->request->post()) && $model->validate()) {

                $model->datetime = date('Y-m-d H:i:s');
                $model->id_user  = Yii::$app->user->identity->id;
                $model->save();

                if ($this->request->isAjax) 
                {
                    $message = 'Data Saved';
                }
                else
                {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            else
            {
                if ($model->errors)
                {
                    $error = true;
                    $message = json_encode($model->errors);
                }
            }
        } 
        else 
        {
            $model->loadDefaultValues();
        }

        if ($this->request->isAjax) 
        {
            return $this->renderAjax('_form_', [ // Render Ajax to use PJAX
                'model' => $model,
                'error' => $error,
                'message' => $message,
            ]);
        } 
        else 
        {
            return $this->render('create', [
                'model' => $model,
                'error' => $error,
                'message' => $message,
            ]);
        }
    }

    /**
     * Updates an existing Transaction model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model   = $this->findModel($id);
        $error   = false;
        $message = '<!-- The requested not valid -->';

        if ($this->request->isPost && $model->load($this->request->post()) && $model->validate()) {

            $model->id_user  = Yii::$app->user->identity->id;
            $model->save();

            if ($this->request->isAjax) 
            {
                $message = 'Data Updated';
            }
            else
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        else
        {
            if ($model->errors)
            {
                $error = true;
                $message = json_encode($model->errors);
            }
        }

        if ($this->request->isAjax) 
        {
            return $this->renderAjax('_form_', [ // Render Ajax to use PJAX
                'model' => $model,
                'error' => $error,
                'message' => $message,
            ]);
        } 
        else 
        {
            return $this->render('update', [
                'model' => $model,
                'error' => $error,
                'message' => $message,
            ]);
        }
    }

    /**
     * Deletes an existing Transaction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        if ($this->request->isAjax) 
        {
            return 'Data Deleted';
        } 
        else 
        {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Transaction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Transaction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transaction::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
