<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="login-box">
        
        <div class="login-logo">
            <a href="<?=Url::base()?>"><b>Admin</b>LTE</a>
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
                    <span class="fas fa-envelope"></span>
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

                <div class="social-auth-links text-center mb-3">

                <p>- OR -</p>

                <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>

                <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>

                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
                </p>

                <p class="mb-0">
                <a href="register.html" class="text-center">Register a new membership</a>
                </p>

            </div>
            <!-- /.login-card-body -->

        </div>
        <!-- /.login-box -->

    </div>

</div>

<?php

$js = <<< JS

JS;

$css = <<< CSS

CSS;

$this->registerJs($js);
$this->registerCss($css);

