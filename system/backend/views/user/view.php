<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\UserLevel;
use backend\models\UserType;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->name;
$this->params['page_title'] = 'View';
$this->params['page_desc'] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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
            <div class="user-view">
                
                <p>
                    <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        //'id',
                        [
                            'format' => 'raw',
                            'attribute' => 'type',
                            'value' => function ($data) {
                                $user_type = UserType::findOne($data['type']);
                                return $user_type['table'];
                            },
                        ],
                        'code',
                        [
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
                        'username',
                        //auth_key',
                        //'password_hash',
                        //'password_reset_token',
                        'email:email',
                        'name',
                        [
                            'format' => 'raw',
                            'attribute' => 'image',
                            'value' => function ($data) {

                                $image = $data['image'] && is_file(Yii::getAlias('@webroot') . $data['image']) ? $data['image'] : '../images/no_photo.jpg';
                                return Html::img(Url::base().$image, ['height' => '200']);
                            },
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($data) {
                                return [ 10 => 'ACTIVE', 9 => 'INACTIVE', 0 => 'DELETED' ][$data['status']];
                            },
                        ],
                        [
                            'attribute' => 'created_at',
                            'value' => function ($data) {
                                return date('d-m-Y H:i:s', $data['created_at']);
                            },
                        ],
                        [
                            'attribute' => 'updated_at',
                            'value' => function ($data) {
                                return date('d-m-Y H:i:s', $data['updated_at']);
                            },
                        ],
                        //'verification_token',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
