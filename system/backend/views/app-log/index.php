<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'App Logs';
$this->params['page_title'] = 'Index';
$this->params['page_desc'] = $this->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card table-card">
    <div class="card-header">
        <h5 class="card-title"><?= Html::encode($this->title) ?></h5>
        <div class="card-header-right">                       
            <ul class="list-unstyled card-option">
                <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                <li><i class="feather icon-maximize full-card"></i></li>
                <li><i class="feather icon-minus minimize-card"></i></li>
                <li><i class="feather icon-refresh-cw reload-card"></i></li>
                <li><i class="feather icon-trash close-card"></i></li>
                <li><i class="feather icon-chevron-left open-card-option"></i></li>
            </ul>
        </div>
    </div>
    <div class="card-block">
        <div class="card-body">
            <div class="card-text">
                <div class="app-log-index">

                    <p>
                        <?= Html::a('<i class="feather icon-trash"></i> Clear', ['index', 'action' => 'clear'], [
                            'class' => 'btn btn-xs btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to clear log ?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <div class="table-responsive">

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //'id',
                                [
                                    'label' => 'Username',
                                    'attribute' => 'id_user',
                                    'value' => function ($data) {
                                        $user = \backend\models\User::findOne(['id' => $data['id_user']]);
                                        return $user['username'];
                                    },
                                ],
                                'module',
                                'activity',
                                'timestamp',

                                // ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
