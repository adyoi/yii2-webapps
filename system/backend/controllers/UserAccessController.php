<?php

namespace backend\controllers;

use Yii;
use backend\models\UserAccess;
use backend\models\UserAccessSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserAccessController implements the CRUD actions for UserAccess model.
 */
class UserAccessController extends Controller
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
     * Lists all UserAccess models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserAccessSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionControl()
    {
        $model = new UserAccess();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            return $this->redirect(['index', 'level' => $model->level, 'module' => $model->module]);

        } else {

            return $this->render('control', [
                'model' => $model,
                'controller' => $this->actionGetcontrollersandactions(),
            ]);

        }
    }
    
    protected function actionGetcontrollersandactions()
    {
        $fulllist = [];
        $controllerlist = [];
        $alias = '@backend/controllers';

        if (Yii::$app->request->get('module') === 'app-frontend-webapps')
        {
            $alias = '@frontend/controllers';
        }

        if ($handle = opendir(Yii::getAlias($alias))) 
        {
            while (false !== ($file = readdir($handle))) 
            {
                if ($file != "." && $file != ".." && substr($file, strrpos($file, '.') - 10) == 'Controller.php') 
                {
                    $controllerlist[] = $file;
                }
            }

            closedir($handle);
        }

        asort($controllerlist);
        
        foreach ($controllerlist as $controller)
        {
            $handle = fopen(Yii::getAlias($alias) . '/' . $controller, "r");

            if ($handle) 
            {
                while (($line = fgets($handle)) !== false) 
                {
                    if (preg_match('/public function action(.*?)\(/', $line, $action))
                    {
                        if (strlen($action[1]) > 2)
                        {
                            $controller_fix = preg_replace('/Controller.php/', '', $controller);
                            $controller_divide = preg_split('/(?=[A-Z])/', $controller_fix, -1, PREG_SPLIT_NO_EMPTY);
                            $controller_divide_ = isset($controller_divide) && is_array($controller_divide) ? $controller_divide : [];
                            $controller_lowletter = strtolower(implode('-', $controller_divide_));
                            $action_divide = preg_split('/(?=[A-Z])/', trim($action[1]), -1, PREG_SPLIT_NO_EMPTY);
                            $action_divide_ = isset($action_divide) && is_array($action_divide) ? $action_divide : [];
                            $action_lowletter = strtolower(implode('-', $action_divide));
                            $fulllist[$controller_lowletter][] = $action_lowletter;
                        }
                    }
                }
            }

            fclose($handle);
        }

        return $fulllist;
    }

    public function actionCekidot()
    {
        $checkbox = Yii::$app->request->post('checkbox');
        $level = Yii::$app->request->post('level');
        $module = Yii::$app->request->post('module');

        if ($checkbox)
        {
            $params = array();
            parse_str($checkbox, $params);

            $fix = [];

            foreach ($this->actionGetcontrollersandactions() as $key => $value) {

                foreach ($value as $key1 => $value2) {

                    $fix[$key][$value2] = isset($params['checkbox'][$key][$value2]) ?: 0;
                }
                
            }

            foreach ($fix as $key => $value) 
            {
                $temp = [];

                foreach ($value as $key2 => $value2) 
                {
                    $temp[$key2] = $value2 == 1 ? true : false;
                }

                $format = array(
                    'level'      => $level,
                    'module'     => $module,
                    'controller' => $key,
                    'action'     => json_encode($temp)
                );

                $user_access = UserAccess::find()->where([
                    'level' => $level, 
                    'module' => $module, 
                    'controller' => $key])->one();

                if (!$user_access)
                {
                    $model = new UserAccess();
                    $model->level = $level;
                    $model->module = $module;
                    $model->controller = $key;
                    $model->datestamp = date('Y-m-d H:i:s');
                    $model->action = json_encode($temp);
                    $model->id_stamp = Yii::$app->user->identity->id;
                    $model->save();
                    $temp = [];
                }
                else
                {
                    $user_access->datestamp = date('Y-m-d H:i:s');
                    $user_access->action = json_encode($temp);
                    $user_access->id_stamp = Yii::$app->user->identity->id;
                    $user_access->save();
                    $temp = [];
                }
            }

            $result = array(
                'status' => 'success',
                'message' => 'Berhasil Update Data',
            );
        }
        else
        {
            $result = array(
                'status' => 'error',
                'message' => 'Ada kesalahan user akses',
            );
        }

        return json_encode($result);
    }

    /**
     * Displays a single UserAccess model.
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
     * Creates a new UserAccess model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserAccess();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserAccess model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserAccess model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserAccess model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserAccess the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserAccess::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
