<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'verification')->widget(Captcha::className(), [
                    'imageOptions' => ['id' => 'verification-image'],
                    'template' => '
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="input-group">
                                    {input}
                                    <div class="input-group-append">
                                        <button class="form-control btn btn-info verification-button" title="Click to refresh">↺</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4" title="Please refresh if unreadable">
                                {image}
                            </div>
                        </div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php

$js = <<< JS
$('.verification-button').on('click', function (e) {
    e.preventDefault();
    $('#verification-image').yiiCaptcha('refresh');
});
/* Fix The Universe Problem */
$('.form-control').keypress(function (e) {
    if (e.which == 13) { e.preventDefault(); $('#signup-form').submit(); }
});
JS;

$css = <<< CSS
#verification-image {
    border-radius: 5px;
    border:1px solid #ddd
}
@media (max-width: 991px) {
    #verification-image {
        margin: 15px 0;
    }
}
CSS;

$this->registerJs($js);
$this->registerCss($css);
