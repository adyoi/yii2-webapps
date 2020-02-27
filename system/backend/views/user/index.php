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
$this->params['page_desc'] = $this->title;
$this->params['breadcrumbs'][] = $this->title;

$select_level = ArrayHelper::map(UserLevel::find()->asArray()->all(), function($model, $defaultValue) {

    return md5($model['code']);

}, function($model, $defaultValue) {

        return sprintf('%s', $model['name']);
    }
);

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
                <div class="user-index">

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
            </div>
        </div>
    </div>
</div>
