<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\UserLevel;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['page_title'] = 'Index';
$this->params['page_desc'] = 'User Index';
$this->params['breadcrumbs'][] = $this->title;

$select_level = ArrayHelper::map(UserLevel::find()->asArray()->all(), function($model, $defaultValue) {

    return md5($model['code']);

}, function($model, $defaultValue) {

        return sprintf('%s', $model['name']);
    }
);

?>
<div class="user-index">
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

            <p>
                <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <div class="table-responsive">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        'username',
                        //'auth_key',
                        //'password_hash',
                        //'password_reset_token',
                        //'email:email',
                        //'created_at',
                        //'updated_at',
                        //'verification_token',
                        'name',
                        [
                            'filter' => $select_level,
                            'attribute' => 'level',
                            'value' => function ($data) {

                                $level = \yii\helpers\ArrayHelper::map(UserLevel::find()->asArray()->all(),

                                    function($model, $defaultValue) 
                                    {
                                        return md5($model['code']);
                                    },

                                    'name'
                                );

                                if (array_key_exists($data['level'], $level))
                                {
                                    return $level[$data['level']];
                                }

                            },
                        ],
                        [
                            'filter' => [ 10 => 'ACTIVE', 9 => 'INACTIVE', 0 => 'DELETED' ],
                            'attribute' => 'status',
                            'value' => function ($data) {
                                return [ 10 => 'ACTIVE', 9 => 'INACTIVE', 0 => 'DELETED' ][$data['status']];
                            },
                        ],

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="text-center"><i>@adyoi</i></div>
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</div>
