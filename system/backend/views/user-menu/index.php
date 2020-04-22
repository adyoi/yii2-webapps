<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\UserLevel;
use backend\models\UserMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserMenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Menus';
$this->params['page_title'] = 'Index';
$this->params['page_desc'] = $this->title;
$this->params['breadcrumbs'][] = $this->title;

$select_level = ArrayHelper::map(UserLevel::find()->asArray()->all(), function($model, $defaultValue) {

    return md5($model['code']);

}, function($model, $defaultValue) {

        return sprintf('%s', $model['name']);
    }
);

$feather = ['icon-alert-octagon' => 'icon-alert-octagon', 'icon-alert-circle' => 'icon-alert-circle', 'icon-activity' => 'icon-activity', 'icon-alert-triangle','icon-alert-triangle', 'icon-align-center' => 'icon-align-center', 'icon-airplay' => 'icon-airplay', 'icon-align-justify' => 'icon-align-justify', 'icon-align-left' => 'icon-align-left', 'icon-align-right' => 'icon-align-right', 'icon-arrow-down-left' => 'icon-arrow-down-left', 'icon-arrow-down-right' => 'icon-arrow-down-right', 'icon-anchor' => 'icon-anchor', 'icon-aperture' => 'icon-aperture', 'icon-arrow-left' => 'icon-arrow-left', 'icon-arrow-right' => 'icon-arrow-right', 'icon-arrow-down' => 'icon-arrow-down', 'icon-arrow-up-left' => 'icon-arrow-up-left', 'icon-arrow-up-right','icon-arrow-up-right', 'icon-arrow-up' => 'icon-arrow-up', 'icon-award' => 'icon-award', 'icon-bar-chart' => 'icon-bar-chart', 'icon-at-sign' => 'icon-at-sign', 'icon-bar-chart-2' => 'icon-bar-chart-2', 'icon-battery-charging' => 'icon-battery-charging', 'icon-bell-off' => 'icon-bell-off', 'icon-battery' => 'icon-battery', 'icon-bluetooth' => 'icon-bluetooth', 'icon-bell' => 'icon-bell', 'icon-book' => 'icon-book', 'icon-briefcase' => 'icon-briefcase', 'icon-camera-off' => 'icon-camera-off', 'icon-calendar' => 'icon-calendar', 'icon-bookmark' => 'icon-bookmark', 'icon-box' => 'icon-box', 'icon-camera' => 'icon-camera', 'icon-check-circle' => 'icon-check-circle', 'icon-check' => 'icon-check', 'icon-check-square' => 'icon-check-square', 'icon-cast' => 'icon-cast', 'icon-chevron-down' => 'icon-chevron-down', 'icon-chevron-left' => 'icon-chevron-left', 'icon-chevron-right' => 'icon-chevron-right', 'icon-chevron-up' => 'icon-chevron-up', 'icon-chevrons-down' => 'icon-chevrons-down', 'icon-chevrons-right','icon-chevrons-right', 'icon-chevrons-up' => 'icon-chevrons-up', 'icon-chevrons-left' => 'icon-chevrons-left', 'icon-circle' => 'icon-circle', 'icon-clipboard' => 'icon-clipboard', 'icon-chrome' => 'icon-chrome', 'icon-clock' => 'icon-clock', 'icon-cloud-lightning' => 'icon-cloud-lightning', 'icon-cloud-drizzle' => 'icon-cloud-drizzle', 'icon-cloud-rain' => 'icon-cloud-rain', 'icon-cloud-off' => 'icon-cloud-off', 'icon-codepen' => 'icon-codepen', 'icon-cloud-snow' => 'icon-cloud-snow', 'icon-compass' => 'icon-compass', 'icon-copy' => 'icon-copy', 'icon-corner-down-right' =>'icon-corner-down-right', 'icon-corner-down-left' => 'icon-corner-down-left', 'icon-corner-left-down' => 'icon-corner-left-down', 'icon-corner-left-up','icon-corner-left-up', 'icon-corner-up-left','icon-corner-up-left', 'icon-corner-up-right' => 'icon-corner-up-right', 'icon-corner-right-down' =>'icon-corner-right-down', 'icon-corner-right-up' => 'icon-corner-right-up', 'icon-cpu' => 'icon-cpu', 'icon-credit-card' => 'icon-credit-card', 'icon-crosshair' => 'icon-crosshair', 'icon-disc' => 'icon-disc', 'icon-delete' => 'icon-delete', 'icon-download-cloud','icon-download-cloud', 'icon-download' => 'icon-download', 'icon-droplet' => 'icon-droplet', 'icon-edit-2' => 'icon-edit-2', 'icon-edit' => 'icon-edit', 'icon-edit-1' => 'icon-edit-1', 'icon-external-link' => 'icon-external-link', 'icon-eye' => 'icon-eye', 'icon-feather' => 'icon-feather', 'icon-facebook' => 'icon-facebook', 'icon-file-minus' => 'icon-file-minus', 'icon-eye-off' => 'icon-eye-off', 'icon-fast-forward' => 'icon-fast-forward', 'icon-file-text' => 'icon-file-text', 'icon-film' => 'icon-film', 'icon-file' => 'icon-file', 'icon-file-plus' => 'icon-file-plus', 'icon-folder' => 'icon-folder', 'icon-filter' => 'icon-filter', 'icon-flag' => 'icon-flag', 'icon-globe' => 'icon-globe', 'icon-grid' => 'icon-grid', 'icon-heart' => 'icon-heart', 'icon-home' => 'icon-home', 'icon-github' => 'icon-github', 'icon-image' => 'icon-image', 'icon-inbox' => 'icon-inbox', 'icon-layers' => 'icon-layers', 'icon-info' => 'icon-info', 'icon-instagram' => 'icon-instagram', 'icon-layout' => 'icon-layout', 'icon-link-2' => 'icon-link-2', 'icon-life-buoy' => 'icon-life-buoy', 'icon-link' => 'icon-link', 'icon-log-in' => 'icon-log-in', 'icon-list' => 'icon-list', 'icon-lock' => 'icon-lock', 'icon-log-out' => 'icon-log-out', 'icon-loader' => 'icon-loader', 'icon-mail' => 'icon-mail', 'icon-maximize-2' => 'icon-maximize-2', 'icon-map' => 'icon-map', 'icon-map-pin' => 'icon-map-pin', 'icon-menu' => 'icon-menu', 'icon-message-circle','icon-message-circle', 'icon-message-square','icon-message-square', 'icon-minimize-2' => 'icon-minimize-2', 'icon-mic-off' => 'icon-mic-off', 'icon-minus-circle' => 'icon-minus-circle', 'icon-mic' => 'icon-mic', 'icon-minus-square' => 'icon-minus-square', 'icon-minus' => 'icon-minus', 'icon-moon' => 'icon-moon', 'icon-monitor' => 'icon-monitor', 'icon-more-vertical' => 'icon-more-vertical', 'icon-more-horizontal' => 'icon-more-horizontal', 'icon-move' => 'icon-move', 'icon-music' => 'icon-music', 'icon-navigation-2' => 'icon-navigation-2', 'icon-navigation' => 'icon-navigation', 'icon-octagon' => 'icon-octagon', 'icon-package' => 'icon-package', 'icon-pause-circle' => 'icon-pause-circle', 'icon-pause' => 'icon-pause', 'icon-percent' => 'icon-percent', 'icon-phone-call' => 'icon-phone-call', 'icon-phone-forwarded' => 'icon-phone-forwarded', 'icon-phone-missed' => 'icon-phone-missed', 'icon-phone-off' => 'icon-phone-off', 'icon-phone-incoming','icon-phone-incoming', 'icon-phone' => 'icon-phone', 'icon-phone-outgoing','icon-phone-outgoing', 'icon-pie-chart' => 'icon-pie-chart', 'icon-play-circle' => 'icon-play-circle', 'icon-play' => 'icon-play', 'icon-plus-square' => 'icon-plus-square', 'icon-plus-circle' => 'icon-plus-circle', 'icon-plus' => 'icon-plus', 'icon-pocket' => 'icon-pocket', 'icon-printer' => 'icon-printer', 'icon-power' => 'icon-power', 'icon-radio' => 'icon-radio', 'icon-repeat' => 'icon-repeat', 'icon-refresh-ccw' => 'icon-refresh-ccw', 'icon-rewind' => 'icon-rewind', 'icon-rotate-ccw' => 'icon-rotate-ccw', 'icon-refresh-cw' => 'icon-refresh-cw', 'icon-rotate-cw' => 'icon-rotate-cw', 'icon-save' => 'icon-save', 'icon-search' => 'icon-search', 'icon-server' => 'icon-server', 'icon-scissors' => 'icon-scissors', 'icon-share-2' => 'icon-share-2', 'icon-share' => 'icon-share', 'icon-shield' => 'icon-shield', 'icon-settings' => 'icon-settings', 'icon-skip-back' => 'icon-skip-back', 'icon-shuffle' => 'icon-shuffle', 'icon-sidebar' => 'icon-sidebar', 'icon-skip-forward' => 'icon-skip-forward', 'icon-slack' => 'icon-slack', 'icon-slash' => 'icon-slash', 'icon-smartphone' => 'icon-smartphone', 'icon-square' => 'icon-square', 'icon-speaker' => 'icon-speaker', 'icon-star' => 'icon-star', 'icon-stop-circle' => 'icon-stop-circle', 'icon-sun' => 'icon-sun', 'icon-sunrise' => 'icon-sunrise', 'icon-tablet' => 'icon-tablet', 'icon-tag' => 'icon-tag', 'icon-sunset' => 'icon-sunset', 'icon-target' => 'icon-target', 'icon-thermometer' => 'icon-thermometer', 'icon-thumbs-up' => 'icon-thumbs-up', 'icon-thumbs-down' => 'icon-thumbs-down', 'icon-toggle-left' => 'icon-toggle-left', 'icon-toggle-right' => 'icon-toggle-right', 'icon-trash-2' => 'icon-trash-2', 'icon-trash' => 'icon-trash', 'icon-trending-up' => 'icon-trending-up', 'icon-trending-down' => 'icon-trending-down', 'icon-triangle' => 'icon-triangle', 'icon-type' => 'icon-type', 'icon-twitter' => 'icon-twitter', 'icon-upload' => 'icon-upload', 'icon-umbrella' => 'icon-umbrella', 'icon-upload-cloud' => 'icon-upload-cloud', 'icon-unlock' => 'icon-unlock', 'icon-user-check' => 'icon-user-check', 'icon-user-minus' => 'icon-user-minus', 'icon-user-plus' => 'icon-user-plus', 'icon-user-x' => 'icon-user-x', 'icon-user' => 'icon-user', 'icon-users' => 'icon-users', 'icon-video-off' => 'icon-video-off', 'icon-video' => 'icon-video', 'icon-voicemail' => 'icon-voicemail', 'icon-volume-x' => 'icon-volume-x', 'icon-volume-2' => 'icon-volume-2', 'icon-volume-1' => 'icon-volume-1', 'icon-volume' => 'icon-volume', 'icon-watch' => 'icon-watch', 'icon-wifi' => 'icon-wifi', 'icon-x-square' => 'icon-x-square', 'icon-wind' => 'icon-wind', 'icon-x' => 'icon-x', 'icon-x-circle' => 'icon-x-circle', 'icon-zap' => 'icon-zap', 'icon-zoom-in' => 'icon-zoom-in', 'icon-zoom-out' => 'icon-zoom-out', 'icon-command' => 'icon-command', 'icon-cloud' => 'icon-cloud', 'icon-hash' => 'icon-hash', 'icon-headphones' => 'icon-headphones', 'icon-underline' => 'icon-underline', 'icon-italic' => 'icon-italic', 'icon-bold' => 'icon-bold', 'icon-crop' => 'icon-crop', 'icon-help-circle' => 'icon-help-circle', 'icon-paperclip' => 'icon-paperclip', 'icon-shopping-cart' => 'icon-shopping-cart', 'icon-tv' => 'icon-tv', 'icon-wifi-off' => 'icon-wifi-off', 'icon-minimize' => 'icon-minimize', 'icon-maximize' => 'icon-maximize', 'icon-gitlab' => 'icon-gitlab', 'icon-sliders' => 'icon-sliders', 'icon-star-on' => 'icon-star-on', 'icon-heart-on' => 'icon-heart-on',
];

?>

<div class="card table-card">
    <div class="card-header">
        <h5 class="card-title"><?= Html::encode($this->title) ?></h5>
        <div class="card-header-right">                       
            <ul class="list-unstyled card-option">
                <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                <li><i class="feather icon-maximize full-card"></i></li>
                <li><i class="feather icon-minus minimize-card"></i></li>
                <li><i class="feather icon-refresh-cw reload-card"></i></li>
                <li><i class="feather icon-trash close-card"></i></li>
                <li><i class="feather icon-chevron-left open-card-option"></i></li>
            </ul>
        </div>
    </div>
    <div class="card-block">
        <div class="card-body">
            <div class="user-menu-index">

                <p>
                    <?= Html::a('Create User Menu', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <div class="table-responsive">

                    <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        [
                            'format' => 'raw',
                            'attribute' => 'id',
                            'value' => function ($data) {
                                $user_menu = UserMenu::findOne($data['id']);
                                return $user_menu ? '<label class="label label-primary">' . $user_menu['name'] . '</label>' : '';
                            },
                        ],
                        [
                            'format' => 'raw',
                            'attribute' => 'id_sub',
                            'value' => function ($data) {
                                $user_menu = UserMenu::findOne($data['id_sub']);
                                return $user_menu ? '<label class="label label-primary">' . $user_menu['name'] . '</label>' : '';
                            },
                        ],
                        [
                            'format' => 'raw',
                            'attribute' => 'id_sub2',
                            'value' => function ($data) {
                                $user_menu = UserMenu::findOne($data['id_sub2']);
                                return $user_menu ? '<label class="label label-primary">' . $user_menu['name'] . '</label>' : '';
                            },
                        ],
                        [
                            'filter' => $select_level,
                            'attribute' => 'level',
                            'value' => function ($data) {

                                $level = \yii\helpers\ArrayHelper::map(UserLevel::find()->asArray()->all(),

                                    function($model, $defaultValue) 
                                    {
                                        return md5($model['code']);
                                    },

                                    'name'
                                );

                                if (array_key_exists($data['level'], $level))
                                {
                                    return $level[$data['level']];
                                }

                            },
                        ],
                        [
                            'filter' => ['app-frontend-webapps' => 'FRONTEND', 'app-backend-webapps' => 'BACKEND'],
                            'attribute' => 'module',
                            'value' => function ($data) {
                                $module = ['app-frontend-webapps' => 'FRONTEND', 'app-backend-webapps' => 'BACKEND'];
                                return $module[$data['module']];
                            },
                        ],
                        [
                            'filter' => ['L' => 'LINK', 'S' => 'SUB MENU', 'H' => 'HEADER', 'D' => 'DIVIDER'],
                            'attribute' => 'class',
                            'value' => function ($data) {
                                $class = ['L' => 'LINK', 'S' => 'SUB MENU', 'H' => 'HEADER', 'D' => 'DIVIDER'];
                                return $class[$data['class']];
                            },
                        ],
                        'url_controller',
                        'url_view',
                        'url_parameter',
                        [
                            'format' => 'raw',
                            'label' => 'Link',
                            'value' => function($data) {

                                $url       = sprintf('%s/%s', $data['url_controller'], $data['url_view']);
                                $url_      = array();
                                $url_array = array($url);

                                if (strpos($data['url_parameter'], ',')) {

                                    $url_parameter = explode(',', $data['url_parameter']);

                                    $url_param_array = [];

                                    foreach ($url_parameter as $key2 => $value2) {

                                        if (strpos($value2, '=')) {

                                            $param = explode('=', $value2);

                                            $url_param_array[trim($param[0])] = trim($param[1]);
                                        }
                                        
                                    }

                                    $url_ = array_merge($url_array, $url_param_array);

                                } else {

                                    $url_param_array = [];

                                    if (strpos($data['url_parameter'], '=')) {

                                        $param = explode('=', $data['url_parameter']);

                                        $url_param_array[trim($param[0])] = trim($param[1]);

                                    }

                                    $url_ = array_merge($url_array, $url_param_array);

                                }

                                return Html::a('Live Url', $url_);
                            }, 
                        ],
                        [
                            'format' => 'raw',
                            'attribute' => 'seq',
                            'value' => function ($data) {
                                return '<label class="label label-success">' . $data['seq'] . '</label>';
                            },
                        ],
                        [
                            'format' => 'raw',
                            'filter' => $feather,
                            'attribute' => 'icon',
                            'value' => function ($data) {
                                return $data['icon'] ? '<i class="feather ' . $data['icon']  . '"></i> (' . $data['icon'] . ')' : null;
                            },
                        ],
                        'name',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>

                </div>
            </div>
        </div>
    </div>
</div>
