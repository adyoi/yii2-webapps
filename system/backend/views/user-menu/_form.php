<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use backend\models\UserLevel;
use backend\models\UserMenu;

/* @var $this yii\web\View */
/* @var $model backend\models\UserMenu */
/* @var $form yii\widgets\ActiveForm */

$feather = ['icon-alert-octagon' => 'icon-alert-octagon', 'icon-alert-circle' => 'icon-alert-circle', 'icon-activity' => 'icon-activity', 'icon-alert-triangle','icon-alert-triangle', 'icon-align-center' => 'icon-align-center', 'icon-airplay' => 'icon-airplay', 'icon-align-justify' => 'icon-align-justify', 'icon-align-left' => 'icon-align-left', 'icon-align-right' => 'icon-align-right', 'icon-arrow-down-left' => 'icon-arrow-down-left', 'icon-arrow-down-right' => 'icon-arrow-down-right', 'icon-anchor' => 'icon-anchor', 'icon-aperture' => 'icon-aperture', 'icon-arrow-left' => 'icon-arrow-left', 'icon-arrow-right' => 'icon-arrow-right', 'icon-arrow-down' => 'icon-arrow-down', 'icon-arrow-up-left' => 'icon-arrow-up-left', 'icon-arrow-up-right','icon-arrow-up-right', 'icon-arrow-up' => 'icon-arrow-up', 'icon-award' => 'icon-award', 'icon-bar-chart' => 'icon-bar-chart', 'icon-at-sign' => 'icon-at-sign', 'icon-bar-chart-2' => 'icon-bar-chart-2', 'icon-battery-charging' => 'icon-battery-charging', 'icon-bell-off' => 'icon-bell-off', 'icon-battery' => 'icon-battery', 'icon-bluetooth' => 'icon-bluetooth', 'icon-bell' => 'icon-bell', 'icon-book' => 'icon-book', 'icon-briefcase' => 'icon-briefcase', 'icon-camera-off' => 'icon-camera-off', 'icon-calendar' => 'icon-calendar', 'icon-bookmark' => 'icon-bookmark', 'icon-box' => 'icon-box', 'icon-camera' => 'icon-camera', 'icon-check-circle' => 'icon-check-circle', 'icon-check' => 'icon-check', 'icon-check-square' => 'icon-check-square', 'icon-cast' => 'icon-cast', 'icon-chevron-down' => 'icon-chevron-down', 'icon-chevron-left' => 'icon-chevron-left', 'icon-chevron-right' => 'icon-chevron-right', 'icon-chevron-up' => 'icon-chevron-up', 'icon-chevrons-down' => 'icon-chevrons-down', 'icon-chevrons-right','icon-chevrons-right', 'icon-chevrons-up' => 'icon-chevrons-up', 'icon-chevrons-left' => 'icon-chevrons-left', 'icon-circle' => 'icon-circle', 'icon-clipboard' => 'icon-clipboard', 'icon-chrome' => 'icon-chrome', 'icon-clock' => 'icon-clock', 'icon-cloud-lightning' => 'icon-cloud-lightning', 'icon-cloud-drizzle' => 'icon-cloud-drizzle', 'icon-cloud-rain' => 'icon-cloud-rain', 'icon-cloud-off' => 'icon-cloud-off', 'icon-codepen' => 'icon-codepen', 'icon-cloud-snow' => 'icon-cloud-snow', 'icon-compass' => 'icon-compass', 'icon-copy' => 'icon-copy', 'icon-corner-down-right' =>'icon-corner-down-right', 'icon-corner-down-left' => 'icon-corner-down-left', 'icon-corner-left-down' => 'icon-corner-left-down', 'icon-corner-left-up','icon-corner-left-up', 'icon-corner-up-left','icon-corner-up-left', 'icon-corner-up-right' => 'icon-corner-up-right', 'icon-corner-right-down' =>'icon-corner-right-down', 'icon-corner-right-up' => 'icon-corner-right-up', 'icon-cpu' => 'icon-cpu', 'icon-credit-card' => 'icon-credit-card', 'icon-crosshair' => 'icon-crosshair', 'icon-disc' => 'icon-disc', 'icon-delete' => 'icon-delete', 'icon-download-cloud','icon-download-cloud', 'icon-download' => 'icon-download', 'icon-droplet' => 'icon-droplet', 'icon-edit-2' => 'icon-edit-2', 'icon-edit' => 'icon-edit', 'icon-edit-1' => 'icon-edit-1', 'icon-external-link' => 'icon-external-link', 'icon-eye' => 'icon-eye', 'icon-feather' => 'icon-feather', 'icon-facebook' => 'icon-facebook', 'icon-file-minus' => 'icon-file-minus', 'icon-eye-off' => 'icon-eye-off', 'icon-fast-forward' => 'icon-fast-forward', 'icon-file-text' => 'icon-file-text', 'icon-film' => 'icon-film', 'icon-file' => 'icon-file', 'icon-file-plus' => 'icon-file-plus', 'icon-folder' => 'icon-folder', 'icon-filter' => 'icon-filter', 'icon-flag' => 'icon-flag', 'icon-globe' => 'icon-globe', 'icon-grid' => 'icon-grid', 'icon-heart' => 'icon-heart', 'icon-home' => 'icon-home', 'icon-github' => 'icon-github', 'icon-image' => 'icon-image', 'icon-inbox' => 'icon-inbox', 'icon-layers' => 'icon-layers', 'icon-info' => 'icon-info', 'icon-instagram' => 'icon-instagram', 'icon-layout' => 'icon-layout', 'icon-link-2' => 'icon-link-2', 'icon-life-buoy' => 'icon-life-buoy', 'icon-link' => 'icon-link', 'icon-log-in' => 'icon-log-in', 'icon-list' => 'icon-list', 'icon-lock' => 'icon-lock', 'icon-log-out' => 'icon-log-out', 'icon-loader' => 'icon-loader', 'icon-mail' => 'icon-mail', 'icon-maximize-2' => 'icon-maximize-2', 'icon-map' => 'icon-map', 'icon-map-pin' => 'icon-map-pin', 'icon-menu' => 'icon-menu', 'icon-message-circle','icon-message-circle', 'icon-message-square','icon-message-square', 'icon-minimize-2' => 'icon-minimize-2', 'icon-mic-off' => 'icon-mic-off', 'icon-minus-circle' => 'icon-minus-circle', 'icon-mic' => 'icon-mic', 'icon-minus-square' => 'icon-minus-square', 'icon-minus' => 'icon-minus', 'icon-moon' => 'icon-moon', 'icon-monitor' => 'icon-monitor', 'icon-more-vertical' => 'icon-more-vertical', 'icon-more-horizontal' => 'icon-more-horizontal', 'icon-move' => 'icon-move', 'icon-music' => 'icon-music', 'icon-navigation-2' => 'icon-navigation-2', 'icon-navigation' => 'icon-navigation', 'icon-octagon' => 'icon-octagon', 'icon-package' => 'icon-package', 'icon-pause-circle' => 'icon-pause-circle', 'icon-pause' => 'icon-pause', 'icon-percent' => 'icon-percent', 'icon-phone-call' => 'icon-phone-call', 'icon-phone-forwarded' => 'icon-phone-forwarded', 'icon-phone-missed' => 'icon-phone-missed', 'icon-phone-off' => 'icon-phone-off', 'icon-phone-incoming','icon-phone-incoming', 'icon-phone' => 'icon-phone', 'icon-phone-outgoing','icon-phone-outgoing', 'icon-pie-chart' => 'icon-pie-chart', 'icon-play-circle' => 'icon-play-circle', 'icon-play' => 'icon-play', 'icon-plus-square' => 'icon-plus-square', 'icon-plus-circle' => 'icon-plus-circle', 'icon-plus' => 'icon-plus', 'icon-pocket' => 'icon-pocket', 'icon-printer' => 'icon-printer', 'icon-power' => 'icon-power', 'icon-radio' => 'icon-radio', 'icon-repeat' => 'icon-repeat', 'icon-refresh-ccw' => 'icon-refresh-ccw', 'icon-rewind' => 'icon-rewind', 'icon-rotate-ccw' => 'icon-rotate-ccw', 'icon-refresh-cw' => 'icon-refresh-cw', 'icon-rotate-cw' => 'icon-rotate-cw', 'icon-save' => 'icon-save', 'icon-search' => 'icon-search', 'icon-server' => 'icon-server', 'icon-scissors' => 'icon-scissors', 'icon-share-2' => 'icon-share-2', 'icon-share' => 'icon-share', 'icon-shield' => 'icon-shield', 'icon-settings' => 'icon-settings', 'icon-skip-back' => 'icon-skip-back', 'icon-shuffle' => 'icon-shuffle', 'icon-sidebar' => 'icon-sidebar', 'icon-skip-forward' => 'icon-skip-forward', 'icon-slack' => 'icon-slack', 'icon-slash' => 'icon-slash', 'icon-smartphone' => 'icon-smartphone', 'icon-square' => 'icon-square', 'icon-speaker' => 'icon-speaker', 'icon-star' => 'icon-star', 'icon-stop-circle' => 'icon-stop-circle', 'icon-sun' => 'icon-sun', 'icon-sunrise' => 'icon-sunrise', 'icon-tablet' => 'icon-tablet', 'icon-tag' => 'icon-tag', 'icon-sunset' => 'icon-sunset', 'icon-target' => 'icon-target', 'icon-thermometer' => 'icon-thermometer', 'icon-thumbs-up' => 'icon-thumbs-up', 'icon-thumbs-down' => 'icon-thumbs-down', 'icon-toggle-left' => 'icon-toggle-left', 'icon-toggle-right' => 'icon-toggle-right', 'icon-trash-2' => 'icon-trash-2', 'icon-trash' => 'icon-trash', 'icon-trending-up' => 'icon-trending-up', 'icon-trending-down' => 'icon-trending-down', 'icon-triangle' => 'icon-triangle', 'icon-type' => 'icon-type', 'icon-twitter' => 'icon-twitter', 'icon-upload' => 'icon-upload', 'icon-umbrella' => 'icon-umbrella', 'icon-upload-cloud' => 'icon-upload-cloud', 'icon-unlock' => 'icon-unlock', 'icon-user-check' => 'icon-user-check', 'icon-user-minus' => 'icon-user-minus', 'icon-user-plus' => 'icon-user-plus', 'icon-user-x' => 'icon-user-x', 'icon-user' => 'icon-user', 'icon-users' => 'icon-users', 'icon-video-off' => 'icon-video-off', 'icon-video' => 'icon-video', 'icon-voicemail' => 'icon-voicemail', 'icon-volume-x' => 'icon-volume-x', 'icon-volume-2' => 'icon-volume-2', 'icon-volume-1' => 'icon-volume-1', 'icon-volume' => 'icon-volume', 'icon-watch' => 'icon-watch', 'icon-wifi' => 'icon-wifi', 'icon-x-square' => 'icon-x-square', 'icon-wind' => 'icon-wind', 'icon-x' => 'icon-x', 'icon-x-circle' => 'icon-x-circle', 'icon-zap' => 'icon-zap', 'icon-zoom-in' => 'icon-zoom-in', 'icon-zoom-out' => 'icon-zoom-out', 'icon-command' => 'icon-command', 'icon-cloud' => 'icon-cloud', 'icon-hash' => 'icon-hash', 'icon-headphones' => 'icon-headphones', 'icon-underline' => 'icon-underline', 'icon-italic' => 'icon-italic', 'icon-bold' => 'icon-bold', 'icon-crop' => 'icon-crop', 'icon-help-circle' => 'icon-help-circle', 'icon-paperclip' => 'icon-paperclip', 'icon-shopping-cart' => 'icon-shopping-cart', 'icon-tv' => 'icon-tv', 'icon-wifi-off' => 'icon-wifi-off', 'icon-minimize' => 'icon-minimize', 'icon-maximize' => 'icon-maximize', 'icon-gitlab' => 'icon-gitlab', 'icon-sliders' => 'icon-sliders', 'icon-star-on' => 'icon-star-on', 'icon-heart-on' => 'icon-heart-on',
];

$select_level = ArrayHelper::map(UserLevel::find()->asArray()->all(), function($model, $defaultValue) {

    return md5($model['code']);

}, function($model, $defaultValue) {

        return sprintf('%s', $model['name']);
    }
);

$select_menu = array(0 => 'NONE') + ArrayHelper::map(UserMenu::find()->asArray()->all(),'id', function($model, $defaultValue) {

        return $model['name'];
    }
);

$fulllist = [];
$fulllist2 = [];
$controllerlist = [];

if ($handle = opendir(Yii::getAlias('@app/controllers'))) 
{
    while (false !== ($file = readdir($handle))) 
    {
        if ($file != "." && $file != ".." && substr($file, strrpos($file, '.') - 10) == 'Controller.php') 
        {
            $controllerlist[] = $file;
        }
    }

    closedir($handle);
}

asort($controllerlist);

foreach ($controllerlist as $controller)
{
    $handle = fopen(Yii::getAlias('@app/controllers') . '/' . $controller, "r");

    if ($handle) 
    {
        while (($line = fgets($handle)) !== false) 
        {
            if (preg_match('/public function action(.*?)\(/', $line, $action))
            {
                if (strlen($action[1]) > 2)
                {
                    $controller_fix = preg_replace('/Controller.php/', '', $controller);
                    $controller_divide = preg_split('/(?=[A-Z])/', $controller_fix, -1, PREG_SPLIT_NO_EMPTY);
                    $controller_lowletter = strtolower(implode($controller_divide, '-'));
                    $action_divide = preg_split('/(?=[A-Z])/', trim($action[1]), -1, PREG_SPLIT_NO_EMPTY);
                    $action_lowletter = strtolower(implode($action_divide, '-'));
                    $fulllist[] = ['key' => $controller_lowletter, 'val' => $action_divide];
                    $fulllist2[$controller_lowletter][] = $action_divide;
                }
            }
        }
    }

    fclose($handle);
}
?>

<div class="user-menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-lg-3">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'id_sub')->widget(Select2::classname(),[
                    'data' => $select_menu,
                    'options' => [
                        'placeholder' => 'Pilih Menu Level 2',
                        'value' => $model->isNewRecord ? 0 : null,
                    ],
                    'pluginOptions' => [
                        'allowClear' => false
                    ],
                ]);
            ?>

            <?= $form->field($model, 'id_sub2')->widget(Select2::classname(),[
                    'data' => $select_menu,
                    'options' => [
                        'placeholder' => 'Pilih Menu Level 2',
                        'value' => $model->isNewRecord ? 0 : null,
                    ],
                    'pluginOptions' => [
                        'allowClear' => false
                    ],
                ]);
            ?>

        </div>

        <div class="col-lg-3">

            <?= $form->field($model, 'level')->widget(Select2::classname(),[
                    'data' => $select_level,
                    'options' => [
                        'placeholder' => 'User Level',
                        'value' => $model->isNewRecord ? Yii::$app->user->identity->level : null,
                    ],
                    'pluginOptions' => [
                        'allowClear' => false
                    ],
                ]);
            ?>

            <?= $form->field($model, 'module')->widget(Select2::classname(),[
                    'data' => ['app-backend-webapps' => 'app-backend-webapps', 'app-frontend-webapps' => 'app-frontend-webapps'] ,
                    'options' => [
                        'placeholder' => 'Pilih Module',
                        'value' => $model->isNewRecord ? 'app-backend-webapps' : null,
                    ],
                    'pluginOptions' => [
                        'allowClear' => false
                    ],
                ]);
            ?>

            <?= $form->field($model, 'class')->widget(Select2::classname(),[
                    'data' => [ 'L' => 'LINK', 'S' => 'SUB MENU', 'H' => 'HEADER', 'D' => 'DIVIDER' ],
                    'options' => [
                        'placeholder' => 'Pilih Class',
                        'value' => $model->isNewRecord ? 'L' : null,
                    ],
                    'pluginOptions' => [
                        'allowClear' => false
                    ],
                ]);
            ?>

        </div>    

        <div class="col-lg-3">

            <?= $form->field($model, 'url_controller')->widget(Select2::classname(),[
                    'data' => ArrayHelper::map($fulllist, 'key', 'key'),
                    'options' => [
                        'placeholder' => 'Pilih Controller',
                        'value' => $model->isNewRecord ? 'L' : null,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>

            <?= $form->field($model, 'url_view')->widget(Select2::classname(),[
                    'data' => $model->isNewRecord ? null : [$model->url_view => $model->url_view],
                    'options' => [
                        'placeholder' => 'Pilih View',
                        'value' => $model->isNewRecord ? null : null,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>

            <?= $form->field($model, 'url_parameter')->textInput(['maxlength' => true]) ?>

        </div>    

        <div class="col-lg-3">

            <?= $form->field($model, 'seq')->textInput(['type' => 'number', 'min' => 0, 'value' => $model->isNewRecord ? 0 : null]) ?>

            <?= $form->field($model, 'icon')->widget(Select2::classname(),[
                    'data' => $feather,
                    'options' => [
                        'placeholder' => 'Pilih Icon',
                    ],
                    'pluginOptions' => [
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function formatState (state) {
                          if (!state.id) {
                            return state.text;
                          }
                          var state = $(\'<i class="feather \' + state.text + \'"></i>\' + \' <span>(\' + state.text + \')</span>\');
                          return state;
                        }'),
                        'templateSelection' => new JsExpression('function formatState (state) {
                          if (!state.id) {
                            return state.text;
                          }
                          var state = $(\'<i class="feather \' + state.text + \'"></i>\' + \' <span>(\' + state.text + \')</span>\');
                          return state;
                        }'),
                        'allowClear' => false
                    ],
                ]);
            ?>
            
        </div>    

    </div>

    <div class="row">

        <div class="col-lg-12">

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$list = json_encode($fulllist2);

$js = <<< JS

$('#usermenu-url_controller').on('change', function(e){
    var asu = '$list';
    var asi = this.value;
    what = JSON.parse(asu);
    html = '';
    $.each(what[asi], function(i, val) {
        html+= '<option value="' + val.toString().toLowerCase() + '">' + val.toString().toLowerCase() + '</option>';
    });
    $("#usermenu-url_view").html(html);
});

JS;

$css = <<< CSS

CSS;

$this->registerJs($js);
$this->registerCss($css);
