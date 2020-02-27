<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\dialog\Dialog;

/* @var $this yii\web\View */

$this->title = 'System Information';
$this->params['page_title'] = 'Info';
$this->params['page_desc'] = $this->title;
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('@web/js/jquery.dataTables.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

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
            <div class="card-text">
                <div class="system-index">

		        	<div class="row">

		                <div class="col-lg-12">

		                    <h4>SERVER</h4>

		                    <div class="table-responsive">

			                    <table class="table table-bordered table-server">
			                        <tbody>
			                            <tr>
			                                <td>Name</td>
			                                <td><?= $_SERVER['SERVER_NAME'] ?></td>
			                            </tr>
			                            <tr>
			                                <td>Signature</td>
			                                <td><?= $_SERVER['SERVER_SIGNATURE'] ?></td>
			                            </tr>
			                            <tr>
			                                <td>OS</td>
			                                <td><?= PHP_OS ?></td>
			                            </tr>
			                        </tbody>
			                    </table>

			                </div>

		                </div>

		            </div>

		        	<div class="row">

		                <div class="col-lg-12">

		                    <h4>PHP</h4>

		                    <div class="table-responsive">

			                    <table class="table table-bordered table-server">
			                        <tbody>
			                            <tr>
			                                <td>Version</td>
			                                <td><?= phpversion() ?></td>
			                            </tr>
			                            <tr>
			                                <td>Time</td>
			                                <td><?= date('r (e)') ?></td>
			                            </tr>
			                            <tr>
			                                <td>OS</td>
			                                <td><?= php_uname() ?></td>
			                            </tr>
			                        </tbody>
			                    </table>

			                </div>

		                </div>

		            </div>

		        	<div class="row">

		                <div class="col-lg-12">

		                    <h4>MYSQL</h4>

		                    <div class="table-responsive">

			                    <table class="table table-bordered table-server">
			                        <tbody>
			                            <tr>
			                                <td>Version</td>
			                                <td><?= Yii::$app->db->createCommand("SELECT @@version")->queryScalar() ?></td>
			                            </tr>
			                            <tr>
			                                <td>Time</td>
			                                <td><?= Yii::$app->db->createCommand("SELECT CURRENT_TIMESTAMP()")->queryScalar() ?> (<?= Yii::$app->db->createCommand("SELECT @@system_time_zone")->queryScalar() ?>)</td>
			                            </tr>
			                        </tbody>
			                    </table>

			                </div>

		                </div>

		            </div>

		            <div class="row">

		                <div class="col-lg-12">

		                    <h4 class="text-center">Table Information</h4>

		    				<table class="table table-bordered table-database">
		                        <thead>
		                            <tr>
		                                <th width="10">No</th>
		                                <th>Table</th>
		                                <th>Engine</th>
		                                <th>Rows</th>
		                                <th>Size</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                            <?php

		                                $sql = "
		                                SELECT `engine` AS `Engine`,`table_name` AS `Table`,round(`data_length` + `index_length`) AS `Size`   
		                                FROM `information_schema`.`TABLES`  
		                                WHERE `table_schema` = '".Yii::$app->db->createCommand("SELECT DATABASE()")->queryScalar()."';";
		                                $rows = Yii::$app->db->createCommand($sql)->queryAll();
		                                $tr = '';
		                                foreach ($rows as $key => $val )
		                                {
		                                    $tr .= '<tr>';
		                                    $tr .= '<td class="no-sort"></td>';
		                                    $tr .= '<td>' . $val['Table'] . '</td>';
		                                    $tr .= '<td>' . $val['Engine'] . '</td>';
		                                    $tr .= '<td>' . Yii::$app->db->createCommand("SELECT COUNT(*) AS asu FROM `".$val['Table']."`")->queryScalar() . '</td>';
		                                    $tr .= '<td data-sort="'.$val['Size'].'">' . \Yii::$app->formatter->asShortSize($val['Size']) . '</td>';
		                                    $tr .= '</tr>';
		                                }
		                                echo $tr;
		                            ?>
		                        </tbody>

		                    </table>

		        		</div>

		        	</div>
		        </div>
		    </div>
		</div>
	</div>
</div>


<?php

$js = <<< JS
$(document).ajaxStart(function() { 
    Pace.restart(); 
});

var t = $('.table-database').DataTable({
    "order": [[ 3, "desc" ]],
    "columnDefs": [
        { "orderable": false, "targets": 0 }
      ]
});

t.on( 'order.dt search.dt', function () {
    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
} ).draw();

JS;

$css = <<< CSS

CSS;

$this->registerCss($css);
$this->registerJs($js);

?>