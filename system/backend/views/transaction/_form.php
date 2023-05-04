<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseStringHelper;
use kartik\select2\Select2;
use backend\models\Transaction;
use backend\models\Customer;

/** @var yii\web\View $this */
/** @var backend\models\Transaction $model */
/** @var yii\widgets\ActiveForm $form */

$code_digit  = 5;
$code_prefix = 'TRX';
$code_model  = Transaction::find()->where(['LIKE', 'number', $code_prefix])->max('number');
$code_init   = (int) BaseStringHelper::byteSubstr($code_model, strlen($code_prefix), strlen($code_prefix) + $code_digit);
$code_seq    = str_pad($code_init + 1 , $code_digit, '0', STR_PAD_LEFT);
$code_format = $code_prefix . $code_seq;

$select_customer = ArrayHelper::map(Customer::find()->asArray()->all(),'code', function($model, $defaultValue) {

        return $model['cus_name'];
    }
);
?>

<div class="transaction-form">

    <?php Pjax::begin([
        'id' => 'pjax-form',
        'enablePushState' => false,
        'timeout' => false,
    ]) ?> 

    <?php $form = ActiveForm::begin([
        'id' => 'input-form', 
        'options' => ['data' => ['pjax' => true]]
    ]); ?>

    <div class="row">

        <div class="col-lg-4">

            <?= $form->field($model, 'number')->textInput(['value' => $model->isNewRecord ? $code_format : $model->number, 'readonly' => true]) ?>

            <?= $form->field($model, 'code_customer')->widget(Select2::classname(),[
                    'data' => $select_customer,
                    'options' => [
                        'placeholder' => 'Select Customer',
                    ],
                    'pluginOptions' => [
                        'allowClear' => false
                    ],
                ]);
            ?>

        </div>

        <div class="col-lg-4">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'type')->widget(Select2::classname(),[
                    'data' => ['REGULER' => 'REGULER', 'MEDIUM' => 'MEDIUM', 'LARGE' => 'LARGE'],
                    'options' => [
                        'value' => $model->isNewRecord ? 'REGULER' : $model->type,
                        'placeholder' => 'Select Type',
                    ],
                    'pluginOptions' => [
                        'allowClear' => false
                    ],
                ]);
            ?>

        </div>

        <div class="col-lg-4">

            <?= $form->field($model, 'value')->textInput(['value' => $model->isNewRecord ? 1000 : $model->value, 'type' => 'number', 'step' => '500', 'min' => 0]) ?>

        </div>

    </div>

    <div class="row">

        <div class="col-md-12 text-center">

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'save_ btn btn-success']) ?>
            </div>

            <label class="pjax-message label"><?=$message?></label>

        </div>

    </div>

    <?php ActiveForm::end(); ?>

    <?php Pjax::end() ?>

</div>
