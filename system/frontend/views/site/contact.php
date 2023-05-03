<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\bootstrap\ActiveForm;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
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
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
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
    if (e.which == 13) { e.preventDefault(); $('#contact-form').submit(); }
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
