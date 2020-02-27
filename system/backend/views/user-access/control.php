<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\dialog\Dialog;

/* @var $this yii\web\View */
/* @var $model backend\models\UserAccess */

$this->title = 'User Access';
$this->params['page_title'] = 'Control';
$this->params['page_desc'] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'User Access', 'url' => ['index']];
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
                <div class="user-access">
                    <?= $this->render('_control', [
                        'model' => $model,
                        'controller' => $controller,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
