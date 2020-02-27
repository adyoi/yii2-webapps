<?php
defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'prod');

require __DIR__ . '/system/vendor/autoload.php';
require __DIR__ . '/system/vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/system/common/config/bootstrap.php';
require __DIR__ . '/system/frontend/config/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/system/common/config/main.php',
    require __DIR__ . '/system/common/config/main-local.php',
    require __DIR__ . '/system/frontend/config/main.php',
    require __DIR__ . '/system/frontend/config/main-local.php'
);

(new yii\web\Application($config))->run();
