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

        "//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800",
        "//fonts.googleapis.com/css?family=Quicksand:500,700",
        "css/bootstrap.min.css",
        "css/sweetalert.css",
        "pages/waves/css/waves.min.css",
        "icon/feather/css/feather.css",
        "icon/themify-icons/themify-icons.css",
        "icon/icofont/css/icofont.css",
        //"icon/font-awesome/css/all.css",
        "icon/font-glyphicons/css/font-glyphicons.css",
        //"pages/prism/prism.css",
        "css/style.css",
        "css/pages.css",
        //"css/widget.css",

    ];
    public $js = [

        "js/jquery-ui.min.js",
        "js/jquery.slimscroll.js",
        "js/modernizr.js",
        "js/css-scrollbars.js",
        "js/sweetalert.min.js",
        "pages/waves/js/waves.min.js",
        "pages/prism/custom-prism.js",
        "js/pcoded.min.js",
        "js/vertical/menu/menu-header-fixed.js",
        "js/jquery.mCustomScrollbar.concat.min.js",
        "js/script.js",
        "js/clock.js",
        "js/android_update.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
