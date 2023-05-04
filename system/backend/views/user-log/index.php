<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Logs';
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

            <div class="user-log-index">

                <p>
                    <div class="col-lg-4">

                        <div class="form-group">
                            <?= Html::label('&nbsp;', '', ['class' => 'control-label']) ?>
                            <div class="button-group">
                                <?= Html::a('<i class="feather icon-trash"></i> Clear', ['index', 'action' => 'clear'], [
                                    'class' => 'btn btn-danger clear',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to clear log ?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </div>

                        </div>

                    </div>
                </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <div class="table-responsive table-nowrap">

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            //'id',

                            [
                                'format' => 'raw',
                                'attribute' => 'id_user',
                                'filter' => ArrayHelper::map(\backend\models\User::find()->asArray()->all(), 'id', 'username'),
                                'value' => function ($data) {
                                    $user = User::findOne($data['id_user']);
                                    return $user['username'];
                                },
                            ],

                            'ip_address',

                            // 'user_agent:ntext',

                            'timestamp',

                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Action',
                                'template' => '{view} {delete}',
                                'buttons' => [
                                'view' => function($url, $model) {
                                    return Html::a('<button class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>', 
                                        ['view', 'id' => $model['id']], 
                                        ['title' => 'View']);
                                },
                                'delete' => function($url, $model) {
                                    return Html::a('<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>', 
                                        ['delete', 'id' => $model['id']], 
                                        ['title' => 'Delete',
                                         'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                         'data-method'  => 'post']);
                                    }
                                ]
                            ],
                        ],
                        
                    ]); ?>

                </div>

            </div>

        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <div class="text-center"><i><?= Html::encode($this->title) ?></i></div>
        </div>
        <!-- /.card-footer-->

    </div>

</div>
