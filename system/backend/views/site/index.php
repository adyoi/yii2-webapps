<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$this->params['page_title'] = 'Dashboard';
$this->params['page_desc'] = 'Yii2-Webapps';
$this->params['title_card'] = 'Information';

?>

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Welcome!</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize" data-toggle="tooltip" title="Maximize">
                <i class="fas fa-expand"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">

            <div class="jumbotron">

                <h1 align="center">Yii2 Web Application</h1>
                <p align="center" class="lead">Yii2 Web Application is a Starter Project dedicated to the yii2 developer community which is equipped with features for fast application creation needs with extra security.</p>
                <p align="center"><a class="btn btn-lg btn-primary" href="https://github.com/adyoi/yii2-webapps">Open on Github</a></p>
            
            </div>
            <div class="body-content">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>This project was built with :</h5>
                            AdminLTE 3 <a href="https://adminlte.io/docs/3.0" target="_blank">https://adminlte.io/docs/3.0</a><br>
                            Yii2 Lastest Version <a href="https://www.yiiframework.com/doc/guide/2.0/en" target="_blank">https://www.yiiframework.com/doc/guide/2.0/en</a><br>
                            Bootstrap 4 <a href="https://getbootstrap.com/docs/4.0/getting-started/introduction" target="_blank">https://getbootstrap.com/docs/4.0/getting-started/introduction</a>
                    </div>
                    <div class="col-lg-6">
                        <h5>Become an Open Source Collective contributor :</h5>
                        <a href="https://opencollective.com/yiisoft" target="_blank">https://opencollective.com/yiisoft</a><br>
                        <a href="https://opencollective.com/phpfoundation" target="_blank">https://opencollective.com/phpfoundation</a><br>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="text-center"><i>Created and Designed by <a href="https://adyoi.blogspot.com/" target="_blank">@adyoi</a></i></div>
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

<?php

$js = <<< JS

JS;

$css = <<< CSS

CSS;

$this->registerJs($js);
$this->registerCss($css);

?>
