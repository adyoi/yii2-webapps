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
    
    <div class="row">

        <div class="col-sm-12">

            <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'md-float-material form-material']]); ?>

                    <div class="text-center">
                        <img src="<?=Url::base()?>/images/logo.png" alt="logo.png">
                    </div>
                    
                    <div class="auth-box card">

                        <div class="card-block">

                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary"><?= Html::encode($this->title) ?></h3>
                                </div>
                            </div>

                            <p class="text-muted text-center p-b-5">Please fill out the following fields to login:</p>

                            <?= $form->field($model, 'username', [
                                'options' => ['class' => 'form-group form-primary'],
                                'inputOptions' => [ 'class' => 'form-control fill'],
                                'labelOptions' => [ 'class' => 'float-label'],
                                'template' => '{input}<span class="form-bar"></span>{label}{error}{hint}'
                                ])->textInput(['autofocus' => true,], [ 'class' => 'form-group form-primary',]) ?>

                            <?= $form->field($model, 'password', [
                                'options' => ['class' => 'form-group form-primary'],
                                'inputOptions' => ['class' => 'form-control fill'],
                                'labelOptions' => [ 'class' => 'float-label'],
                                'template' => '{input}<span class="form-bar"></span>{label}{error}{hint}'
                                ])->passwordInput(['autofocus' => true,], [ 'class' => 'form-group form-primary',]) ?>

                            <div class="row m-t-25 text-left">
                                
                                <div class="col-12">

                                    <?= $form->field($model, 'rememberMe', [
                                        'template' => '
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                {input}
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Remember me</span>
                                            </label>
                                        </div>
                                        {error}',
                                    ])->checkbox([],false) ?>

                                    <div class="forgot-phone text-right float-right">
                                        <a href="#" class="text-right f-w-600 d-none"> Forgot Password?</a>
                                    </div>

                                </div>

                            </div>

                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-md btn-block waves-effect text-center m-b-20', 'name' => 'login-button']) ?>
                                </div>
                            </div>                            

                        </div>

                </div>

            <?php ActiveForm::end(); ?>

        </div>
        <!-- end of col-sm-12 -->

    </div>

</div>

<?php

$js = <<< JS

JS;

$css = <<< CSS

CSS;

$this->registerJs($js);
$this->registerCss($css);

