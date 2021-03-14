<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        //'css/site.css',
        "//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700",
        "//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css",
        "plugins/pace-progress/themes/green/pace-theme-minimal.css",
        "plugins/overlayScrollbars/css/OverlayScrollbars.min.css",
        "plugins/fontawesome-free/css/all.min.css",
        "plugins/sweetalert2/sweetalert2.css",
        "dist/css/adminlte.min.css",
        "dist/css/webapps.css",

    ];
    public $js = [

        "plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
        "plugins/pace-progress/pace.min.js",
        // "plugins/bootstrap/js/bootstrap.bundle.min.js",
        "plugins/sweetalert2/sweetalert2.all.js",
        "dist/js/adminlte.min.js",
        "dist/js/demo.js",
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
