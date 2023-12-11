<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

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
                            <div class="col-lg-5" title="Please refresh if unreadable">
                                {image}
                            </div>
                        </div>',
                ]) ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    <br>
                    Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
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
    if (e.which == 13) { e.preventDefault(); $('#login-form').submit(); }
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
