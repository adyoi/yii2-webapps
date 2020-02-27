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
                                        <input type="text" class="form-control" placeholder="Enter Keyword" style="width: 0px;">
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

                        $level = Yii::$app->user->identity->level;

                        switch ($level)
                        {
                            case md5('ADM'):

                                $items[] = ['label' => '<span class="pcoded-micon"><i class="feather icon-monitor"></i></span>
                                            <span class="pcoded-mtext">Dashboard</span>', 'url' => ['site/index']];
                                $items[] = ['label' => '<span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                    <span class="pcoded-mtext">User</span>',
                                    'url' => 'javascript:void(0)',
                                    'options'=>['class'=>'pcoded-hasmenu'],
                                    'items' => [
                                        ['label' => '<span class="pcoded-mtext">User</span>', 'url' => ['user/index']],
                                        ['label' => '<span class="pcoded-mtext">Level</span>', 'url' => ['user-level/index']],
                                        ['label' => '<span class="pcoded-mtext">Access</span>', 'url' => ['user-access/control']],
                                    ],
                                    'itemOptions' => ['class'=>'pcoded-submenu'],
                                ];
                                $items[] = ['label' => '<span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                                    <span class="pcoded-mtext">System</span>',
                                    'url' => 'javascript:void(0)',
                                    'options'=>['class'=>'pcoded-hasmenu'],
                                    'items' => [
                                        ['label' => '<span class="pcoded-mtext">System Info</span>', 'url' => ['system/info']],
                                        ['label' => '<span class="pcoded-mtext">Application Log</span>', 'url' => ['app-log/index']],
                                        ['label' => '<span class="pcoded-mtext">Application Log Database</span>', 'url' => ['app-logd/index']],
                                    ],
                                    'itemOptions' => ['class'=>'pcoded-submenu'],
                                ];
                                $items[] = ['label' => '<span class="pcoded-micon"><i class="feather icon-log-out"></i></span>
                                            <span class="pcoded-mtext">Logout</span>', 'url' => ['site/logout']];

                            break;

                            case md5('USR'):

                                $items[] = ['label' => '<span class="pcoded-micon"><i class="feather icon-monitor"></i></span>
                                            <span class="pcoded-mtext">Dashboard</span>', 'url' => ['site/index']];
                                $items[] = ['label' => '<span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                                    <span class="pcoded-mtext">System</span>',
                                    'url' => 'javascript:void(0)',
                                    'options'=>['class'=>'pcoded-hasmenu'],
                                    'items' => [
                                        ['label' => '<span class="pcoded-mtext">Info</span>', 'url' => ['system/info']],
                                    ],
                                    'itemOptions' => ['class'=>'pcoded-submenu'],
                                ];
                                $items[] = ['label' => '<span class="pcoded-micon"><i class="feather icon-log-out"></i></span>
                                            <span class="pcoded-mtext">Logout</span>', 'url' => ['site/logout']];

                            break;

                            default:

                                $items[] = ['label' => '<span class="pcoded-micon"><i class="feather icon-monitor"></i></span>
                                            <span class="pcoded-mtext">Dashboard</span>', 'url' => ['site/index']];
                                $items[] = ['label' => '<span class="pcoded-micon"><i class="feather icon-log-out"></i></span>
                                            <span class="pcoded-mtext">Logout</span>', 'url' => ['site/logout']];
                        }

                    ?>

                    <?= '<nav class="pcoded-navbar">' ?>
                        <?= '<div class="nav-list">' ?>
                            <?= '<div class="pcoded-inner-navbar main-menu">'?>
                                <?= '<div class="pcoded-navigation-label">Dashboard</div>' ?>
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
