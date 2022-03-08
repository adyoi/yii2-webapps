<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\dialog\Dialog;

/* @var $this yii\web\View */

$this->title = 'System Information';
$this->params['page_title'] = 'Info';
$this->params['page_desc'] = $this->title;
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/dist/css/dataTables.bootstrap4.min.css', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/dist/js/jquery.dataTables.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/dist/js/dataTables.bootstrap4.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>
<div class="card table-card">
    <div class="card-header">
        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
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
		                                <td><?= Yii::$app->db2->createCommand("SELECT @@version")->queryScalar() ?></td>
		                            </tr>
		                            <tr>
		                                <td>Time</td>
		                                <td><?= Yii::$app->db2->createCommand("SELECT CURRENT_TIMESTAMP()")->queryScalar() ?> (<?= Yii::$app->db2->createCommand("SELECT @@system_time_zone")->queryScalar() ?>)</td>
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
	                                WHERE `table_schema` = '".Yii::$app->db2->createCommand("SELECT DATABASE()")->queryScalar()."';";
	                                $rows = Yii::$app->db2->createCommand($sql)->queryAll();
	                                $tr = '';
	                                foreach ($rows as $key => $val )
	                                {
	                                    $tr .= '<tr>';
	                                    $tr .= '<td class="no-sort"></td>';
	                                    $tr .= '<td>' . $val['Table'] . '</td>';
	                                    $tr .= '<td>' . $val['Engine'] . '</td>';
	                                    $tr .= '<td>' . Yii::$app->db2->createCommand("SELECT COUNT(*) AS asu FROM `".$val['Table']."`")->queryScalar() . '</td>';
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
    <!-- /.card-body -->
    <div class="card-footer">
        <div class="text-center"><i><?= Html::encode($this->title) ?></i></div>
    </div>
    <!-- /.card-footer-->
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