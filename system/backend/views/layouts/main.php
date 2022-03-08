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
use common\widgets\Alert;

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
        .center {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%); /* (x, y)  => position */
          -ms-transform: translate(-50%, -50%); /* IE 9 */
          -webkit-transform: translate(-50%, -50%); /* Chrome, Safari, Opera */    
        }
        .nav-divider {
            margin: 10px 0;
            border-bottom: 1px solid #4f5962;
        }
    </style>
</head>
<body class="hold-transition <?= Yii::$app->user->isGuest ? 'login-page' : 'sidebar-mini layout-fixed' ?>">
<?php $this->beginBody() ?>

<?php if (Yii::$app->user->isGuest): ?>

  <div class="center">
    <?= $content ?>
  </div>
    
<?php else: ?>

    <!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=Url::base()?>/logout" class="nav-link">Logout</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?=Url::base()?>/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?=Url::base()?>/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?=Url::base()?>/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=Url::base()?>" class="brand-link">
      <img src="<?=Url::base()?>/dist/img/Yii2WebappsLogo.png"
           alt="Yii2 Webapps Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Yii2 Webapps</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=Url::base().Yii::$app->user->identity->image?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= Url::toRoute(['user/view', 'id' => Yii::$app->user->identity->id])?>" class="d-block"><?=Yii::$app->user->identity->name?></a>
        </div>
      </div>

      <?php

            $user    = Yii::$app->user->identity->id;
            $level   = Yii::$app->user->identity->level;
            $items   = array();
            $items[] = ['label' => '<div class="nav-header">Main Menu</div>'];
            $items[] = ['label' => '<i class="nav-icon fa fa-home"></i><p>Dashboard</p>', 'url' => ['site/index']];

            /* ------------------------------------------ MENU LEVEL 1 ------------------------------------------ */

            $user_menu = \backend\models\UserMenu::find()->where(['level' => Yii::$app->user->identity->level, 'module' => Yii::$app->controller->module->id])->orderBy(['seq' => SORT_ASC, 'id' => SORT_DESC])->asArray()->all();

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
                                $items[] = ['label' => '<div class="nav-header">'.$value['name'].$label_menu.'</div>'];
                                break;
                            
                            case 'D':
                                $items[] = ['label' => '<div class="nav-divider"></div>'];
                                break;
                            
                            case 'L':
                                $items[] = ['label' => '<i class="nav-icon '.$value['icon'].'"></i><p>'.$value['name'].$label_menu.'</p>', 'url' => $url_];
                                break;
                            
                            case 'S':

                                /* ------------------------------------------ MENU LEVEL 2 ------------------------------------------ */
                                
                                $user_menu2 = \backend\models\UserMenu::find()->where(['level' => Yii::$app->user->identity->level, 'module' => Yii::$app->controller->module->id, 'id_sub' => $value['id']])->orderBy(['seq' => SORT_ASC, 'id' => SORT_DESC])->asArray()->all();
                                
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
                                                    $items2[] = ['label' => '<div class="nav-header">'.$value2['name'].$label_menu2.'</div>'];
                                                    break;
                                                case 'D':
                                                    $items2[] = ['label' => '<div class="nav-divider"></div>'];
                                                    break;
                                                case 'L':
                                                    $items2[] = ['label' => '<i class="nav-icon '.$value2['icon'].'"></i><p>'.$value2['name'].$label_menu2.'</p>', 'url' => $url2_];
                                                    break;
                                                case 'S':

                                                    /* ------------------------------------------ MENU LEVEL 3 ------------------------------------------ */
                                
                                                    $user_menu3 = \backend\models\UserMenu::find()->where(['level' => Yii::$app->user->identity->level, 'module' => Yii::$app->controller->module->id, 'id_sub' => $value['id'], 'id_sub2' => $value2['id']])->orderBy(['seq' => SORT_ASC, 'id' => SORT_DESC])->asArray()->all();

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
                                                                        $items3[] = ['label' => '<div class="nav-header">'.$value3['name'].$label_menu3.'</div>'];
                                                                        break;
                                                                    case 'D':
                                                                        $items3[] = ['label' => '<div class="nav-divider"></div>'];
                                                                        break;
                                                                    case 'L':
                                                                        $items3[] = ['label' => '<i class="nav-icon '.$value3['icon'].'"></i><p>'.$value3['name'].$label_menu3.'</p>', 'url' => $url3_];
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

                                                    $items2[] = ['label' => '<i class="nav-icon '.$value2['icon'].'"></i><p>'.$value2['name'].$label_menu2.'<i class="fas fa-angle-left right"></i></p>',
                                                                    'url' => 'javascript:void(0)',
                                                                    'options'=>['class'=>'nav-item has-treeview'],
                                                                    // 'itemOptions' => ['class'=>'nav nav-treeview'],
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

                                $items[] = ['label' => '<i class="nav-icon '.$value['icon'].'"></i><p>'.$value['name'].$label_menu.'<i class="fas fa-angle-left right"></i></p>',
                                                'url' => 'javascript:void(0)',
                                                'options'=>['class'=>'nav-item has-treeview'],
                                                // 'itemOptions' => ['class'=>'nav nav-treeview'],
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

        <?= '<nav class="mt-2">' ?>

          <?php echo Menu::widget([
              'items' => $items,
              'encodeLabels' => false,
              'activateItems' => true,
              'activateParents' => true,
              // 'activeCssClass' => 'active',
              'itemOptions' => [
                  'class' => 'nav-item',
              ],
              'options' => [
                  'class' => 'nav nav-pills nav-sidebar flex-column nav-flat',
                  'role' => 'menu',
                  'data-widget' => 'treeview',
                  'data-accordion' => 'false',
              ],
              'linkTemplate' => '<a href="{url}" class="nav-link">{label}</a>',
              'submenuTemplate' => '<ul class="nav nav-treeview">{items}</ul>',
          ]); ?>

        <?= '</div>' ?>

    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><?=isset($this->params['page_title']) ? $this->params['page_title'] : ''?><?=isset($this->params['page_desc']) ? ' <span style="font-size:1rem;">' . $this->params['page_desc'] . '</span>' : ''?></h3>
          </div>
          <div class="col-sm-6">
            <?= Breadcrumbs::widget([
              'options' => ['class' => 'float-sm-right'],
              'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <?= Alert::widget() ?>
      <?= $content ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer text-sm">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved. <a href="https://github.com/adyoi/yii2-webapps">Yii2 Webapps</a>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
<script type="text/javascript">
/*
 * Pace Animated loading
 */
$(document).ajaxStart(function() { 
    Pace.restart(); 
});

/* 
 * Yii2 Widget Menu for AdminLTE by adyoi
 */
$( ".nav-sidebar li" ).each(function( index ) {
  // Moved active class from parent
  if ($(this).hasClass('active')) {
    // Add active class on nav-link
    $(this).find('.nav-link').addClass('active');
    // Indicated Submenu is open
    if ($(this).hasClass('has-treeview')) {
      // Add menu-open class on treeview
      $(this).addClass('menu-open');
      // Remove active class on treeview
      $(this).find('.nav-link').removeClass('active');
    }
    // Remove active class on nav-items
    $(this).removeClass('active');
  }
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
            swal.fire({
                title: '<?=$title?>',
                text: '<?=$text?>',
                icon: '<?=$type?>',
                timer: <?=$timer?>,
                showCancelButton: false,
                showConfirmButton: true
            });
        });
    </script>
<?php endforeach; ?>
</html>
<?php $this->endPage() ?>
