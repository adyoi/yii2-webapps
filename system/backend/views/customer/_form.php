<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\BaseStringHelper;
use backend\models\Customer;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */
/* @var $form yii\widgets\ActiveForm */

$code_digit  = 5;
$code_prefix = 'CUS';
$code_model  = Customer::find()->where(['LIKE', 'code', $code_prefix])->max('code');
$code_init   = (int) BaseStringHelper::byteSubstr($code_model, strlen($code_prefix), strlen($code_prefix) + $code_digit);
$code_seq    = str_pad($code_init + 1 , $code_digit, '0', STR_PAD_LEFT);
$code_format = $code_prefix . $code_seq;

?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true, 'value' => $model->isNewrecord ? $code_format : $model->code, 'readonly' => true]) ?>

    <?= $form->field($model, 'code_branch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cus_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cus_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cus_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
