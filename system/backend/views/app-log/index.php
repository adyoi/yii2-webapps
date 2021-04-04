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
        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="maximize" data-toggle="tooltip" title="Maximize">
            <i class="fas fa-expand"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="card-text">
            <div class="app-log-index">

                <p>
                    <?= Html::a('<i class="feather icon-trash"></i> Clear', ['index', 'action' => 'clear'], [
                        'class' => 'btn btn-danger',
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
                        'pager' => [
                            'firstPageLabel' => 'First',
                            'lastPageLabel'  => 'Last'
                        ],
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
