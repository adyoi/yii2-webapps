<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="login-box">
        
        <div class="login-logo"> 
            <a href="<?=Url::base()?>"><b>Yii2</b>Webapps</a>
        </div>

        <div class="card">

            <div class="card-body login-card-body">

                <p class="login-box-msg">Sign in to start your session</p>

                <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'md-float-material form-material']]); ?>

                <?= $form->field($model, 'username', [
                    'options' => ['class' => 'form-group'],
                    'inputOptions' => [ 'class' => 'form-control', 'placeholder' => 'Username'],
                    'labelOptions' => [ 'class' => ''],
                    'template' => '
                        <div class="input-group mb-3">
                            {input}
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        {error}{hint}
                        </div>'
                    ])->textInput(['autofocus' => true,], [ 'class' => 'form-group form-primary',]) ?>

                <?= $form->field($model, 'password', [
                    'options' => ['class' => 'form-group'],
                    'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Password'],
                    'labelOptions' => [ 'class' => ''],
                    'template' => '
                        <div class="input-group mb-3">
                            {input}
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        {error}{hint}
                        </div>'
                    ])->passwordInput(['autofocus' => true,], [ 'class' => 'form-group form-primary',]) ?>

                <?= $form->field($model, 'verification', [
                    'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Verification'],
                    //'template' => '{input}{error}{hint}',
                    ])->widget(Captcha::classname(), [
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
                    ])->label(false) ?>

                <div class="row">

                    <div class="col-8">

                        <?= $form->field($model, 'rememberMe', [
                        'options' => ['class' => ''],
                        'inputOptions' => [ 'class' => 'icheck-primary'],
                        'labelOptions' => [ 'class' => ''],
                        'template' => '',
                        ])->checkbox([],false) ?>

                    </div>

                    <div class="col-4">

                        <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>    
                    </div>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
            <!-- /.login-card-body -->

        </div>
        <!-- /.login-box -->

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
$(".fas.fa-lock").click(function() {
    $(this).toggleClass("fa fa-unlock");
    input = $(this).parents('.input-group').find("input");
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
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
.invalid-feedback {
    display: block;
}
CSS;

$this->registerJs($js);
$this->registerCss($css);
