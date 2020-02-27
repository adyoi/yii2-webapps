<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\UserLevel;

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
                <div class="user-view">
                        <p>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>

                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                //'id',
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
</div>
