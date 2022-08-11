<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\dialog\Dialog;
use kartik\select2\Select2;
use backend\models\UserLevel;
use backend\models\UserAccess;

/* @var $this yii\web\View */
/* @var $model backend\models\UserAccess */
/* @var $form yii\widgets\ActiveForm */

$this->registerCssFile('@web/dist/css/dataTables.bootstrap4.min.css', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/dist/js/jquery.dataTables.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/dist/js/dataTables.bootstrap4.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$id_level  = Yii::$app->request->get('level') ?: Yii::$app->user->identity->level;
$id_module = Yii::$app->request->get('module') ?: 'app-backend-webapps';

$select_level = ArrayHelper::map(UserLevel::find()->asArray()->all(), function($model, $defaultValue) {

    return md5($model['code']);

}, function($model, $defaultValue) {

        return sprintf('%s - %s', $model['type'], $model['name']);
    }
);

?>

<div class="user-access-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

    	<div class="col-lg-3">

		    <?= $form->field($model, 'level')->textInput()->widget(Select2::classname(), [ 
		        'data' => $select_level,
		        'disabled' => $model->isNewRecord ? false : true,
		        'options' => [
		            'placeholder' => 'Pilih Level',
		            'value' => $id_level,
		        ],
		        'pluginOptions' => [
		            'allowClear' => false
		        ],
		    ]); ?>

		</div>

		<div class="col-lg-3">

		    <?= $form->field($model, 'module')->textInput()->widget(Select2::classname(), [ 
		        'data' => ['app-backend-webapps' => 'app-backend-webapps', 
		        			'app-frontend-webapps' => 'app-frontend-webapps'],
		        'options' => [
		            'placeholder' => 'Pilih Module',
		            'value' => $id_module,
		        ],
		        'pluginOptions' => [
		            'allowClear' => false
		        ],
		    ]); ?>

		</div>

		<div class="col-lg-6">

		    <div class="form-group">
				<label class="control-label" for="check-button">&nbsp;</label>
				<div class="btn-group-justified" role="group" aria-label="...">
					<div class="btn-group" role="group">
						<button id="load-button" class="btn btn-success">Load</button>
					</div>
					<div class="btn-group">
						<div class="dropdown">
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							CHECK
							</button>
							<ul class="dropdown-menu">
								<li class="dropdown-item">
									<input type="checkbox" class="styled" id="check-all">
									<label>
										All
									</label>
								</li>
								<li class="dropdown-divider"></li>
								<li class="dropdown-item">
									<input type="checkbox" class="styled" id="check-index">
									<label>
										Index
									</label>
								</li>
								<li class="dropdown-item">
									<input type="checkbox" class="styled" id="check-create">
									<label>
										Create
									</label>
								</li>
								<li class="dropdown-item">
									<input type="checkbox" class="styled" id="check-update">
									<label>
										Update
									</label>
								</li>
								<li class="dropdown-item">
									<input type="checkbox" class="styled" id="check-view">
									<label>
										View
									</label>
								</li>
								<li class="dropdown-item">
									<input type="checkbox" class="styled" id="check-delete">
									<label>
										Delete
									</label>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

	<div class="row">

		<div class="col-lg-12">

			<table class="table table-bordered table-nowrap table-account">

				<thead>
					<tr>
						<th>No</th>
						<th>Controller</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				    <?php

				    $no = 1;
				    
				    foreach ($controller as $key => $val)
				    {
				    	echo '<tr><td>' . $no++ . '</td>';
				    	echo '<td>' . $key . '</td><td>';

				    	foreach($val as $value)
					    {
							if ($key == 'user-access') 
							{
								if (in_array($value, ['cekidot', 'control']))
								{
									echo  '<input type="checkbox" class="locked styled" checked value="1" name="checkbox['. $key .'][' . $value.']">&nbsp;&nbsp;<label>' . $value . '</label><br>';
								}
							} 
							else 
							{
								echo '<input type="checkbox" class="styled" data-controller="'. $key .'" data-action="'. $value .'" name="checkbox['. $key .'][' . $value.']" ';

								$access = UserAccess::findOne([
									'level' => Yii::$app->request->get('level'), 
									'module' => Yii::$app->request->get('module'), 
									'controller' => $key
								]);

								if (isset($access['action']) && is_null($access['action']) == false)
								{
									$auth = \yii\helpers\BaseJson::decode($access['action'], true);

									if (isset($auth[$value]))
									{
										echo 'value="1" checked';
									}
									else
									{
										echo '';
									}
								}
								else
								{

									echo 'value="0"';

								}

								echo '>&nbsp;&nbsp;<label>' . $value . '</label><br>';
							
							}

			    		}

				    	echo  '</td></tr>';
				    }

				    ?>
				</tbody>

			</table>

		    <?= $form->field($model, 'action')->hiddenInput(['rows' => 6])->label(false) ?>

		    <div class="form-group">
		    	<?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['id' =>'action-save', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		    </div>

		</div>

	</div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$_csrf = Yii::$app->request->csrfToken;
$_module = Yii::$app->request->get('module');
$url_user_access = Url::to(['user-access/control']);
$url_user_access_save = Url::to(['user-access/cekidot']);

$js = <<< JS

var t = $('.table-account').DataTable({
    "columnDefs": [
        { "orderable": false, "targets": 0 }
    ],
    "initComplete": function(settings, json) {
    	if ('$_module') {
	        swal.fire({
	            title: 'User Access',
	            text: 'Load Data',
	            icon: 'success',
	            timer: 5000,
	            showCancelButton: false,
	            showConfirmButton: true
	        });
	    }
	},
	'fnPreDrawCallback': function( oSettings ) {
		$('.styled').on('change', function(){
	    	if($(this).is(":checked")) {
				$(this).attr('checked', true);
	    		$(this).val(1);
	    	} else {
				$(this).attr('checked', false);
	    		$(this).val(0);
	    	}
	    });
	},
});

t.on( 'order.dt search.dt', function () {
    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
}).draw();

$('#load-button').on('click', function(e){
	e.preventDefault();
    window.location = '$url_user_access' + 
      '?level=' + $('#useraccess-level').val() +
      '&module=' + $('#useraccess-module').val();
});

$('#action-save').on('click', function(e) {

	e.preventDefault();

    var input = t.$('input').serialize();

    console.log(input);

    $.post({
        url: '$url_user_access_save',
        data: {
            checkbox: input,
            level: $('#useraccess-level').val(),
            module: $('#useraccess-module').val(),
            _csrf: yii.getCsrfToken()
        },
        statusCode: {
		    403: function() {
	            swal.fire({
	                title: 'User Access',
	                text: 'User Not Authorized',
	                icon: 'error',
	                timer: 5000,
	                showCancelButton: false,
	                showConfirmButton: true
	            });
		    }
		},
        success: function(data) {

			what = JSON.parse(data);

            if (what.status == 'success') {
	            swal.fire({
	                title: 'User Access',
	                text: what.message,
	                icon: 'success',
	                timer: 5000,
	                showCancelButton: false,
	                showConfirmButton: true
	            });

            } else if (what.status == 'error') {
                swal.fire({
	                title: 'User Access',
	                text: what.message,
	                icon: 'error',
	                timer: 5000,
	                showCancelButton: false,
	                showConfirmButton: true
	            });
            }
        },
        error: function(err) {
        	console.log(err);
        }
    });
});

$('#check-all').on('change', function(e){
	e.preventDefault();
	if ($(this).is(":checked")) {
		$('.styled').each(function() {
			if (!$(this).hasClass('locked')) {
				$(this).parent('span').addClass('checked');
				$(this).prop('checked', true);
				$(this).attr('checked', true);
				$(this).val(1);
			} else {
				$(this).parent('span').addClass('checked');
				$(this).prop('checked', true);
				$(this).attr('checked', true);
				$(this).val(1);
			}
		});
	}
	else {
		$('.styled').each(function() {
			if (!$(this).hasClass('locked')) {
				$(this).parent('span').removeClass('checked');
				$(this).prop('checked', false);
				$(this).attr('checked', false);
				$(this).val(0);
			} else {
				$(this).parent('span').addClass('checked');
				$(this).prop('checked', true);
				$(this).attr('checked', true);
				$(this).val(1);
			}
		});
	}
});

$('#check-index').on('change', function(e){
	e.preventDefault();
	if ($(this).is(":checked")) {
		$('input[data-action=index]').each(function() {
			$(this).parent('span').addClass('checked');
			$(this).prop('checked', true);
			$(this).attr('checked', true);
			$(this).val(1);
		});
	}
	else {
		$('input[data-action=index]').each(function() {
			$(this).parent('span').removeClass('checked');
			$(this).prop('checked', false);
			$(this).attr('checked', false);
			$(this).val(0);
		});
	}
});

$('#check-create').on('change', function(e){
	e.preventDefault();
	if ($(this).is(":checked")) {
		$('input[data-action=create]').each(function() {
			$(this).parent('span').addClass('checked');
			$(this).prop('checked', true);
			$(this).attr('checked', true);
			$(this).val(1);
		});
	}
	else {
		$('input[data-action=create]').each(function() {
			$(this).parent('span').removeClass('checked');
			$(this).prop('checked', false);
			$(this).attr('checked', false);
			$(this).val(0);
		});
	}
});

$('#check-update').on('change', function(e){
	e.preventDefault();
	if ($(this).is(":checked")) {
		$('input[data-action=update]').each(function() {
			$(this).parent('span').addClass('checked');
			$(this).prop('checked', true);
			$(this).attr('checked', true);
			$(this).val(1);
		});
	}
	else {
		$('input[data-action=update]').each(function() {
			$(this).parent('span').removeClass('checked');
			$(this).prop('checked', false);
			$(this).attr('checked', false);
			$(this).val(0);
		});
	}
});

$('#check-view').on('change', function(e){
	e.preventDefault();
	if ($(this).is(":checked")) {
		$('input[data-action=view]').each(function() {
			$(this).parent('span').addClass('checked');
			$(this).prop('checked', true);
			$(this).attr('checked', true);
			$(this).val(1);
		});
	}
	else {
		$('input[data-action=view]').each(function() {
			$(this).parent('span').removeClass('checked');
			$(this).prop('checked', false);
			$(this).attr('checked', false);
			$(this).val(0);
		});
	}
});

$('#check-delete').on('change', function(e){
	e.preventDefault();
	if ($(this).is(":checked")) {
		$('input[data-action=delete]').each(function() {
			$(this).parent('span').addClass('checked');
			$(this).prop('checked', true);
			$(this).attr('checked', true);
			$(this).val(1);
		});
	}
	else {
		$('input[data-action=delete]').each(function() {
			$(this).parent('span').removeClass('checked');
			$(this).prop('checked', false);
			$(this).attr('checked', false);
			$(this).val(0);
		});
	}
});

JS;

$css = <<< CSS

.locked {
	opacity: 0.5;
	pointer-events: none;
}

CSS;

$this->registerJs($js);
$this->registerCss($css);

?>
