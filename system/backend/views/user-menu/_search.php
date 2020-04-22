<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserMenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-menu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_sub') ?>

    <?= $form->field($model, 'id_sub2') ?>

    <?= $form->field($model, 'level') ?>

    <?= $form->field($model, 'module') ?>

    <?php // echo $form->field($model, 'class') ?>

    <?php // echo $form->field($model, 'url_controller') ?>

    <?php // echo $form->field($model, 'url_view') ?>

    <?php // echo $form->field($model, 'url_parameter') ?>

    <?php // echo $form->field($model, 'seq') ?>

    <?php // echo $form->field($model, 'icon') ?>

    <?php // echo $form->field($model, 'name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
