<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\uRL;
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style type="text/css">
        .loadingin {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('<?=Url::base()?>/images/loading/loader-icons-set-1-32x64x128/loader-64x/Preloader_3.gif') center no-repeat #fff;
        }
    </style>
</head>
<body themebg-pattern="theme1">
<?php $this->beginBody() ?>

<div class="loadingin"></div>

<?php if (Yii::$app->user->isGuest): ?>

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <?= $content ?>
        </div>
        <!-- end of container-fluid -->
    </section>
    
<?php else: ?>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            
            <!-- [ Header ] start -->
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="<?=Url::base()?>">
                            <img class="img-fluid" src="<?=Url::base()?>/images/logo.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="javascript:void(0)">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <!-- <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close">
                                            <i class="feather icon-x input-group-text"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn">
                                            <i class="feather icon-search input-group-text"></i>
                                        </span>
                                    </div>
                                </div>
                            </li> -->
                            <li>
                                <a href="javascript:void(0)" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="full-screen feather icon-maximize"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                               <i class="feather icon-calendar"></i> <span id="dater"></span> - <i class="feather icon-clock"></i> <span id="timer" style="width: 50px;display: inline-block;"></span>
                            </li>
                           <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <?php
                                        $image = Yii::$app->user->identity->image && 
                                                 is_file(Yii::getAlias('@webroot') . 
                                                 Yii::$app->user->identity->image) ? 
                                                 Yii::$app->user->identity->image : 
                                                 '/images/no_photo.jpg';
                                        ?>
                                        <img src="<?=Url::base().$image?>" class="img-radius" alt="User-Profile-Image">
                                        <span><?= Yii::$app->user->identity->name ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="<?=Url::base()?>/system/setting">
                                            <i class="feather icon-settings"></i> Settings
                                        </a>
                                        </li>
                                        <li>
                                            <a href="<?=Url::base()?>/user/profile">
                                            <i class="feather icon-user"></i> Profile
                                        </a>
                                        </li>
                                        <li>
                                            <a href="<?=Url::base()?>/logout">
                                            <i class="feather icon-log-out"></i> Logout
                                        </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">

                <div class="pcoded-wrapper">

                    <?php

                        $user    = Yii::$app->user->identity->id;
                        $level   = Yii::$app->user->identity->level;
                        $items   = array();
                        $items[] = ['label' => '<div class="pcoded-navigation-label">Main Menu</div>'];
                        $items[] = ['label' => '<span class="pcoded-micon"><i class="feather icon-monitor"></i></span><span class="pcoded-mtext">Dashboard</span>', 'url' => ['site/index']];         

                        /* ------------------------------------------ MENU LEVEL 1 ------------------------------------------ */

                        $user_menu = \backend\models\UserMenu::find()->where(['level' => Yii::$app->user->identity->level, 'module' => Yii::$app->controller->module->id])->orderBy(['seq' => SORT_ASC])->asArray()->all();

                        if (count($user_menu) > 0) // Check if Array Exists
                        {
                            foreach ($user_menu as $key => $value) 
                            {
                                $label_menu = '';

                                if (Url::current() == Url::toRoute('user-menu/create') || 
                                    Url::current(['id' => null]) == Url::toRoute('user-menu/update') || 
                                    Url::current(['id' => null]) == Url::toRoute('user-menu/view') || 
                                    Url::current(['page' => null]) == Url::toRoute('user-menu/index'))
                                {
                                    $label_menu =  ' (' . $value['seq'] . ')';
                                }

                                if ($value['id_sub'] == 0)
                                {
                                    $url       = sprintf('%s/%s', $value['url_controller'], $value['url_view']);
                                    $url_      = array();
                                    $url_array = array($url);

                                    if (strpos($value['url_parameter'], ',')) {

                                        $url_parameter = explode(',', $value['url_parameter']);

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

                                        if (strpos($value['url_parameter'], '=')) {

                                            $param = explode('=', $value['url_parameter']);

                                            $url_param_array[trim($param[0])] = trim($param[1]);

                                        }

                                        $url_ = array_merge($url_array, $url_param_array);

                                    }

                                    switch ($value['class']) 
                                    {
                                        case 'H':
                                            $items[] = ['label' => '<div class="pcoded-navigation-label">'.$value['name'].$label_menu.'</div>'];
                                            break;
                                        case 'D':
                                            $items[] = ['label' => '<span class="pcoded-divider"></span>'];
                                            break;
                                        case 'L':
                                            $items[] = ['label' => '<span class="pcoded-micon"><i class="feather '.$value['icon'].'"></i></span><span class="pcoded-mtext">'.$value['name'].$label_menu.'</span>', 'url' => $url_];
                                            break;
                                        case 'S':

                                            /* ------------------------------------------ MENU LEVEL 2 ------------------------------------------ */
                                            
                                            $user_menu2 = \backend\models\UserMenu::find()->where(['level' => Yii::$app->user->identity->level, 'module' => Yii::$app->controller->module->id, 'id_sub' => $value['id']])->orderBy(['seq' => SORT_ASC])->asArray()->all();
                                            
                                            $items2 = array();

                                            if (count($user_menu2) > 0) // Check if Array Exists
                                            {
                                                foreach ($user_menu2 as $key2 => $value2) 
                                                {
                                                    $label_menu2 = '';

                                                    if (Url::current() == Url::toRoute('user-menu/create') || 
                                                        Url::current(['id' => null]) == Url::toRoute('user-menu/update') || 
                                                        Url::current(['id' => null]) == Url::toRoute('user-menu/view') || 
                                                        Url::current(['page' => null]) == Url::toRoute('user-menu/index'))
                                                    {
                                                        $label_menu2 =  ' (' . $value2['seq'] . ')';
                                                    }

                                                    if ($value2['id_sub2'] == 0)
                                                    {
                                                        $url2       = sprintf('%s/%s', $value2['url_controller'], $value2['url_view']);
                                                        $url2_      = array();
                                                        $url2_array = array($url2);

                                                        if (strpos($value2['url_parameter'], ',')) {

                                                            $url2_parameter = explode(',', $value2['url_parameter']);

                                                            $url2_param_array = [];

                                                            foreach ($url2_parameter as $key2 => $value2) {

                                                                if (strpos($value2, '=')) {

                                                                    $param = explode('=', $value2);

                                                                    $url2_param_array[trim($param[0])] = trim($param[1]);
                                                                }
                                                                
                                                            }

                                                            $url2_ = array_merge($url2_array, $url2_param_array);

                                                        } else {

                                                            $url2_param_array = [];

                                                            if (strpos($value2['url_parameter'], '=')) {

                                                                $param = explode('=', $value2['url_parameter']);

                                                                $url2_param_array[trim($param[0])] = trim($param[1]);

                                                            }

                                                            $url2_ = array_merge($url2_array, $url2_param_array);

                                                        }

                                                        switch ($value2['class']) {
                                                            case 'H':
                                                                $items2[] = ['label' => '<div class="pcoded-navigation-label">'.$value2['name'].$label_menu2.'</div>'];
                                                                break;
                                                            case 'D':
                                                                $items2[] = ['label' => '<span class="pcoded-divider"></span>'];
                                                                break;
                                                            case 'L':
                                                                $items2[] = ['label' => '<span class="pcoded-micon"><i class="feather '.$value2['icon'].'"></i></span><span class="pcoded-mtext">'.$value2['name'].$label_menu2.'</span>', 'url' => $url2_];
                                                                break;
                                                            case 'S':

                                                                /* ------------------------------------------ MENU LEVEL 3 ------------------------------------------ */
                                            
                                                                $user_menu3 = \backend\models\UserMenu::find()->where(['level' => Yii::$app->user->identity->level, 'module' => Yii::$app->controller->module->id, 'id_sub' => $value['id'], 'id_sub2' => $value2['id']])->orderBy(['seq' => SORT_ASC])->asArray()->all();

                                                                $items3 = array();

                                                                if (count($user_menu3) > 0) // Check if Array Exists
                                                                {
                                                                    foreach ($user_menu3 as $key3 => $value3) 
                                                                    {
                                                                        $label_menu3 = '';

                                                                        if (Url::current() == Url::toRoute('user-menu/create') || 
                                                                            Url::current(['id' => null]) == Url::toRoute('user-menu/update') || 
                                                                            Url::current(['id' => null]) == Url::toRoute('user-menu/view') || 
                                                                            Url::current(['page' => null]) == Url::toRoute('user-menu/index'))
                                                                        {
                                                                            $label_menu3 =  ' (' . $value3['seq'] . ')';
                                                                        }

                                                                        if ($value3['id_sub2'] == $value2['id']) 
                                                                        {
                                                                            $url3       = sprintf('%s/%s', $value3['url_controller'], $value3['url_view']);
                                                                            $url3_      = array();
                                                                            $url3_array = array($url3);

                                                                            if (strpos($value['url_parameter'], ',')) {

                                                                                $url3_parameter = explode(',', $value3['url_parameter']);

                                                                                $url3_param_array = [];

                                                                                foreach ($url3_parameter as $key2 => $value2) {

                                                                                    if (strpos($value2, '=')) {

                                                                                        $param = explode('=', $value2);

                                                                                        $url3_param_array[trim($param[0])] = trim($param[1]);
                                                                                    }
                                                                                    
                                                                                }

                                                                                $url3_ = array_merge($url3_array, $url3_param_array);

                                                                            } else {

                                                                                $url3_param_array = [];

                                                                                if (strpos($value3['url_parameter'], '=')) {

                                                                                    $param = explode('=', $value3['url_parameter']);

                                                                                    $url3_param_array[trim($param[0])] = trim($param[1]);

                                                                                }

                                                                                $url3_ = array_merge($url3_array, $url3_param_array);

                                                                            }

                                                                            switch ($value3['class']) {
                                                                                case 'H':
                                                                                    $items3[] = ['label' => '<div class="pcoded-navigation-label">'.$value3['name'].$label_menu3.'</div>'];
                                                                                    break;
                                                                                case 'D':
                                                                                    $items3[] = ['label' => '<span class="pcoded-divider"></span>'];
                                                                                    break;
                                                                                case 'L':
                                                                                    $items3[] = ['label' => '<span class="pcoded-micon"><i class="feather '.$value3['icon'].'"></i></span><span class="pcoded-mtext">'.$value3['name'].$label_menu3.'</span>', 'url' => $url3_];
                                                                                    break;
                                                                                case 'S':
                                                                                    /* MENU LEVEL 4 */
                                                                                break;

                                                                                default:
                                                                                    break;
                                                                            }
                                                                        }
                                                                    }
                                                                }

                                                                $items2[] = ['label' => '<span class="pcoded-micon"><i class="feather '.$value2['icon'].'"></i></span><span class="pcoded-mtext">'.$value2['name'].$label_menu2.'</span>',
                                                                                'url' => 'javascript:void(0)',
                                                                                'options'=>['class'=>'pcoded-hasmenu'],
                                                                                'itemOptions' => ['class'=>'pcoded-submenu'],
                                                                                'items' => $items3,
                                                                            ];

                                                                //['label' => '<i class="feather '.$value2['icon'].'"></i> <span>'.$value2['name'].'</span>'.$label_menu2, 'url' => $url2_, 'items' => $items3];
                                                                break;
                                
                                                            default:
                                                                break;
                                                        }
                                                    }
                                                }
                                            }

                                            $items[] = ['label' => '<span class="pcoded-micon"><i class="feather '.$value['icon'].'"></i></span><span class="pcoded-mtext">'.$value['name'].$label_menu.'</span>',
                                                            'url' => 'javascript:void(0)',
                                                            'options'=>['class'=>'pcoded-hasmenu'],
                                                            'itemOptions' => ['class'=>'pcoded-submenu'],
                                                            'items' => $items2,
                                                        ];
                                            
                                            //['label' => '<i class="feather '.$value['icon'].'"></i> <span>'.$value['name'].'</span>'.$label_menu, 'url' => $url_, 'items' => $items2];
                                            break;
            
                                        default:
                                            break;
                                    }
                                }
                            }
                        }

                    ?>

                    <?= '<nav class="pcoded-navbar">' ?>
                        <?= '<div class="nav-list">' ?>
                            <?= '<div class="pcoded-inner-navbar main-menu">'?>
                                <?=  Menu::widget([
                                    'items' => $items,
                                    'encodeLabels' => false,
                                    'activateParents' => true,
                                    'activeCssClass' => 'active pcoded-trigger',
                                    'itemOptions' => [
                                        'class' => '',
                                    ],
                                    'options' => [
                                        'class' => 'pcoded-item pcoded-left-item',
                                    ],
                                    'linkTemplate' => '
                                        <a href="{url}" class="waves-effect waves-dark">
                                            {label}
                                        </a>',
                                    'submenuTemplate' => '<ul class="pcoded-submenu">{items}</ul>',
                                ]); ?>
                            <?= '</div>' ?>
                        <?= '</div>' ?>
                    <?= '</div>' ?>

                    <!-- [ navigation menu ] end -->
                    <div class="pcoded-content">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-6">
                                    <div class="page-header-title">
                                        <i class="feather icon-sidebar bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5><?= Html::encode(isset($this->params['page_title']) ? $this->params['page_title'] : '') ?></h5>
                                            <span><?= Html::encode(isset($this->params['page_desc']) ? $this->params['page_desc'] : '') ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="page-header-breadcrumb">
                                        <?= Breadcrumbs::widget([
                                        'homeLink' => [
                                            'label' => '<i class="feather icon-monitor"></i> Dashboard',
                                            'url' => Url::to(['site/index']),
                                            'template' => '<li class="breadcrumb-item">{link}</li> ',
                                        ],
                                        'encodeLabels' => false,
                                        'options' => ['class' => 'breadcrumb breadcrumb-title'],
                                        'itemTemplate' => "<li class='breadcrumb-item'><i>{link}</i></li>",
                                        'activeItemTemplate' => "<li class='breadcrumb-item active'><i>{link}</i></li>",
                                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                        ]) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <?= $content ?>
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ___________________________________________________________________________________________
                         _________________ let this stamped here, with this you have prayed for me _________________
                         Tangerang Selatan, 28 Februari 2019 _______________________________________________________
                         by Adi Apriyanto __________________________________________________________________________
                         ___________________________________________________________________________________________ -->

                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="<?=Url::base()?>/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="<?=Url::base()?>/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="<?=Url::base()?>/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="<?=Url::base()?>/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="<?=Url::base()?>/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->

<?php $this->endBody() ?>
</body>
<script>
jQuery(window).on('load', function() {
    $('.loadingin').fadeOut(2000);
});
</script>
<?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
    <?php
        $title = !empty($message["title"]) ? $message["title"]: "Title Not Set!";
        $text  = !empty($message["message"]) ? $message["message"] : "Message Not Set!";
        $type  = !empty($message["type"]) ? $message["type"] : "error";
        $timer = !empty($message["duration"]) ? $message["duration"] : 3000;
    ?>
    <script>
        jQuery(document).ready(function(e) {
            swal({
                html: true, 
                title: '<?=$title?>',
                text: '<?=$text?>',
                type: '<?=$type?>',
                timer: <?=$timer?>,
                showCancelButton: false,
                showConfirmButton: true
            });
        });
    </script>
<?php endforeach; ?>
</html>
<?php $this->endPage() ?>
