<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\UserLevel;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */

$select_level = ArrayHelper::map(UserLevel::find()->asArray()->all(), function($model, $defaultValue) {

    return md5($model['code']);

}, function($model, $defaultValue) {

        return sprintf('%s', $model['name']);
    }
);

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-lg-4">

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control border-input']) ?>
            
            <?= $form->field($model, 'password_repeat')->passwordInput(['class' => 'form-control border-input']) ?>

        </div>

        <div class="col-lg-4">

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'level')->widget(Select2::classname(),[
                    'data' => $select_level,
                    'options' => [
                        'placeholder' => 'Pilih Level',
                    ],
                    'pluginOptions' => [
                        'allowClear' => false
                    ],
                ]);
            ?>

            <?= $form->field($model, 'status')->widget(Select2::classname(),[
                'data' => [ 10 => 'ACTIVE', 9 => 'INACTIVE', 0 => 'DELETED' ],
                'options' => [
                    'placeholder' => 'Pilih ...',
                    'value' => $model->isNewRecord ? 10 : null,
                ],
                'pluginOptions' => [
                    'allowClear' => false
                ],
            ]) ?>

        </div>

        <div class="col-lg-4">

            <?php 

            $image = $model->image && is_file(Yii::getAlias('@webroot') . $model->image) ? $model->image : '/images/no_photo.jpg';

            ?>

            <?= $form->field($model, 'image', [
                    'template' => '
                    {label}
                    <div id="preview">
                    <img id="img-preview" src="'. Url::base() . $image .'" alt="user image" />
                    </div>
                    {input}
                    {error}',
                ])->fileInput(['accept' => 'image/*']) ?>

        </div>

    </div>

    <div class="row">

        <div class="col-md-12 text-center">
            
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-xs btn-success']) ?>
            </div>

        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$js = <<< JS

$('#user-image').on('change', function(e) {
    e.preventDefault();
    readURL(this);
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img-preview').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        $('#img-preview').attr('src', '$image');
    }
}

JS;

$css = <<< CSS

#preview {
    border: 1px solid #ddd;
    padding: 20px;
    margin: 0 0 20px;
}

#preview img {
    width: 100%;
    max-height: 220px;
}

CSS;

$this->registerJs($js);
$this->registerCss($css);
