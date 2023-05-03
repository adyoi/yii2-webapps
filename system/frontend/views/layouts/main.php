<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= sprintf('%s | %s', Html::encode($this->title), Html::encode(Yii::$app->name)) ?></title>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Yii2 Webapps" />
    <meta name="keywords" content="Yii2 Webapps" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="<?= Yii::$app->language ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Yii2 Webapps" />
    <meta property="og:url" content="<?= Url::base() ?>" />
    <meta property="og:site_name" content="Yii2 Webapps" />
    <link rel="canonical" href="<?= Url::base() ?>" />
    <link rel="shortcut icon" href="<?= Url::base() ?>/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= Url::base() ?>/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= Url::base() ?>/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= Url::base() ?>/favicon-16x16.png" />
    <link rel="manifest" href="<?= Url::base() ?>/manifest.json" />
    <link rel="mask-icon" href="<?= Url::base() ?>/safari-pinned-tab.svg" color="#111111" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="theme-color" content="#ffffff" />
    <script type="text/javascript" src="<?= Url::base() ?>/service-app.js"></script>
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
