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

    <?php if (Yii::$app->user->identity->level === '6fb4f22992a0d164b77267fde5477248'): // LEVEL_ADMIN_ONLY ?>

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"># Link Shortcuts</h3>
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

                <div class="body-content">

                    <div class="row">

                        <?php

                            $fulllist = [];
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
                                                $controller_fix       = preg_replace('/Controller.php/', '', $controller);
                                                $controller_divide    = preg_split('/(?=[A-Z])/', $controller_fix, -1, PREG_SPLIT_NO_EMPTY);
                                                $controller_divide_   = isset($controller_divide) && is_array($controller_divide) ? $controller_divide : [];
                                                $controller_lowletter = strtolower(implode('-', $controller_divide_));
                                                $action_divide        = preg_split('/(?=[A-Z])/', trim($action[1]), -1, PREG_SPLIT_NO_EMPTY);
                                                $action_divide_       = isset($action_divide) && is_array($action_divide) ? $action_divide : [];
                                                $action_lowletter     = strtolower(implode('-', $action_divide_));
                                                if (in_array($action_lowletter, ['index','create','input','info','control']))
                                                {
                                                    $fulllist[$controller_lowletter][] = $action_lowletter;
                                                }
                                            }
                                        }
                                    }
                                }

                                fclose($handle);
                            }

                            $count      = 0;
                            $devide     = 2;
                            $totalcount = count($fulllist);
                            $percount   = round($totalcount / $devide);

                            foreach ($fulllist as $key => $value) 
                            {
                                $what = ucwords(str_replace('-', ' ', $key));
                                $whatif = substr($what, 0, 30);
                                
                                if ($count % $percount == 0) 
                                {   
                                    echo '<div class="col-lg-' . round(12 / $devide) . '">';
                                    echo '<div class="table-responsive table-nowrap">';
                                    echo '<table class="table table-bordered">';
                                    echo '<thead>';
                                    echo '<tr>';
                                    echo '<th Width="10">No.</th>';
                                    echo '<th>Name</th>';
                                    echo '<th>Action</th>';
                                    echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                }

                                echo '<tr>';
                                echo '<td>' . ($count + 1) . '</td>';
                                echo '<td>' . $what . '</td>';
                                echo '<td>';

                                foreach ($value as $key2 => $value) 
                                {
                                    echo Html::a('<i class="fa fa-external-link-alt"></i>&nbsp;' . ucfirst($value), [$key.'/'.$value], ['target' => '_blank']);
                                    echo '&nbsp;&nbsp;&nbsp;';
                                }

                                echo '</td>';
                                echo '</tr>';

                                if ($count % $percount == ($percount-1)) 
                                {
                                    echo '</tbody>';
                                    echo '</table>';
                                    echo '</div>';
                                    echo '</div>';
                                }

                                /*if ($count % $totalcount == ($totalcount-1)) 
                                {
                                    echo '</tbody>';
                                    echo '</table>';
                                    echo '</div>';
                                    echo '</div>';
                                }*/

                                $count++;
                            }
                        ?>

                        <!-- FIX --> </div> <!-- FIX --> 

                    </div>

                </div>
                    
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="text-center"><i>Created and Designed by <a href="https://adyoi.blogspot.com/" target="_blank">@adyoi</a></i></div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    <?php endif; ?>

<?php

$js = <<< JS

JS;

$css = <<< CSS

CSS;

$this->registerJs($js);
$this->registerCss($css);

?>
