<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\BaseStringHelper;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Branch;

/* @var $this yii\web\View */
/* @var $model backend\models\Branch */
/* @var $form yii\widgets\ActiveForm */

$code_digit  = 3;
$code_prefix = 'BCH';
$code_model  = Branch::find()->where(['LIKE', 'code', $code_prefix])->max('code');
$code_init   = (int) BaseStringHelper::byteSubstr($code_model, strlen($code_prefix), strlen($code_prefix) + $code_digit);
$code_seq    = str_pad($code_init + 1 , $code_digit, '0', STR_PAD_LEFT);
$code_format = $code_prefix . $code_seq;

?>

<div class="branch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true, 'value' => $model->isNewrecord ? $code_format : $model->code, 'readonly' => true]) ?>

    <?= $form->field($model, 'bch_type')->widget(Select2::classname(),[
            'data' => ['CENTER' => 'CENTER', 'SUB' => 'SUB'],
            'options' => [
                'placeholder' => 'Pilih Tipe Branch',
            ],
            'pluginOptions' => [
                'allowClear' => false
            ],
        ]);
    ?>

    <?= $form->field($model, 'bch_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bch_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
