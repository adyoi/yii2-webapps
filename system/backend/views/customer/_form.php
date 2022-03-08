<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\BaseStringHelper;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Customer;
use backend\models\Branch;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */
/* @var $form yii\widgets\ActiveForm */

$code_digit  = 5;
$code_prefix = 'CUS';
$code_model  = Customer::find()->where(['LIKE', 'code', $code_prefix])->max('code');
$code_init   = (int) BaseStringHelper::byteSubstr($code_model, strlen($code_prefix), strlen($code_prefix) + $code_digit);
$code_seq    = str_pad($code_init + 1 , $code_digit, '0', STR_PAD_LEFT);
$code_format = $code_prefix . $code_seq;

$select_branch = ArrayHelper::map(Branch::find()->asArray()->all(),'code', function($model, $defaultValue) {

        return $model['bch_name'];
    }
);


?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true, 'value' => $model->isNewrecord ? $code_format : $model->code, 'readonly' => true]) ?>

    <?= $form->field($model, 'code_branch')->widget(Select2::classname(),[
            'data' => $select_branch,
            'options' => [
                'placeholder' => 'Pilih Branch',
            ],
            'pluginOptions' => [
                'allowClear' => false
            ],
        ]);
    ?>

    <?= $form->field($model, 'cus_type')->widget(Select2::classname(),[
            'data' => ['AGENT' => 'AGENT', 'RETAIL' => 'RETAIL'],
            'options' => [
                'placeholder' => 'Pilih Tipe Customer',
            ],
            'pluginOptions' => [
                'allowClear' => false
            ],
        ]);
    ?>

    <?= $form->field($model, 'cus_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cus_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
