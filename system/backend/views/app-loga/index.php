<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppLogaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'App Logas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-index">
    <!-- Default box -->
    <div class="card">
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

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <div class="table-responsive table-nowrap">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        [
                            'label' => 'Username',
                            'attribute' => 'id_user',
                            'value' => function ($data) {
                                $user = \backend\models\User::findOne(['id' => $data['id_user']]);
                                return $user['username'];
                            },
                        ],
                        'name',
                        'update:ntext',
                        'ip_address',
                        // 'user_agent:ntext',
                        'timestamp',

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Action',
                            'template' => '{view}',
                            'buttons' => [
                            'view' => function($url, $model) {
                                return Html::a('<button class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>', 
                                    ['view', 'id' => $model['id']], 
                                    ['title' => 'View']);
                                }
                            ]
                        ],
                    ],
                ]); ?>

            </div>

        </div>

    </div>

</div>
