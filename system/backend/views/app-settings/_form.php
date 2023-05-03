<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\AppSettings $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="app-settings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['readonly' => true]) ?>

    <?php

        if (!$model->isNewRecord)
        {
            if ($model->code === 'SETTING_LOCK_LOGIN_IP')
            {
                echo $form->field($model, 'value')->dropDownList([ 'YES' => 'YES', 'NO' => 'NO'], ['prompt' => '']);
            }
            else
            {
                echo $form->field($model, 'value')->textInput(['maxlength' => true]);
            }
        }
        else
        {
            echo $form->field($model, 'value')->textInput(['maxlength' => true]);
        }

    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
