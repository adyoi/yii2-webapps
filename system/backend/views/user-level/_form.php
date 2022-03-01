<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\UserType;

/* @var $this yii\web\View */
/* @var $model backend\models\UserLevel */
/* @var $form yii\widgets\ActiveForm */

$select_type = ArrayHelper::map(UserType::find()->asArray()->all(),'code', function($model, $defaultValue) {

        return $model['table'];
    }
);

?>

<div class="user-level-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'type')->widget(Select2::classname(),[
            'data' => $select_type,
            'options' => [
                'placeholder' => 'Pilih Type',
                'value' => $model->isNewRecord ? 'B' : $model->type,
            ],
            'pluginOptions' => [
                'allowClear' => false
            ],
        ]);
    ?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
