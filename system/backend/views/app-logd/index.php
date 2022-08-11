<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppLogdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'App Logds';
$this->params['page_title'] = 'Index';
$this->params['page_desc'] = $this->title;
$this->params['breadcrumbs'][] = $this->title;
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
            <div class="app-logd-index">

                <p>

                    <div class="row">

                        <div class="col-lg-3">

                            <div class="form-group">
                                <?= Html::label('Datetime Log', 'timestamp', ['class' => 'control-label']) ?>
                                <?= DateTimePicker::widget(['id' => 'timestamp',
                                    'name' => 'timestamp',
                                    'value' => date('Y-m-d 23:59:59'),
                                    'options' => [
                                        'placeholder'  => 'Tanggal Log',
                                        'autocomplete' => 'off',
                                        'onchange' => ''
                                    ],
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd hh:ii:ss'
                                    ]
                                ]) ?>
                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="form-group">
                                <?= Html::label('&nbsp;', '', ['class' => 'control-label']) ?>
                                <div class="button-group">
                                    <?= Html::a('<i class="feather icon-trash"></i> Clear Under', ['index', 'action' => 'clear'], [
                                        'class' => 'btn btn-danger clear',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to clear log ?',
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                                </div>

                            </div>

                        </div>

                    </div>

                </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <div class="table-responsive table-nowrap">

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'pager' => [
                            'firstPageLabel' => 'First',
                            'lastPageLabel'  => 'Last'
                        ],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            //'id',
                            [
                                'label' => 'Username',
                                'attribute' => 'id_user',
                                'value' => function ($data) {
                                    $user = \backend\models\User::findOne(['id' => $data['id_user']]);
                                    return $user['username'];
                                },
                            ],
                            'table_name',
                            [
                                'format' => 'raw',
                                'attribute' => 'update',
                                'value' => function ($data, $keys, $index) {
                                    $html = "";
                                    $html2 = "<tr>";
                                    $html3 = "<tr>";
                                    $table = json_decode($data['update']);
                                    foreach ($table as $key => $value) {
                                        $html .= "<tr><td>" . $key . "</td><td>" . $value . "</td></tr>";
                                        $html2 .= "<td>" . $key . "</td>";
                                        $html3 .= "<td>" . $value . "</td>";
                                    }
                                    $html2 .= "</tr>";
                                    $html3 .= "</tr>";
                                    return '<center><button class="btn btn-success" title="Click to show/hide content" type="button" onclick="
                                    if (document.getElementById(\'spoiler' . $keys . '\').style.display==\'none\') {
                                        document.getElementById(\'spoiler' . $keys . '\').style.display=\'block\'} else {
                                        document.getElementById(\'spoiler' . $keys . '\').style.display=\'none\'}">
                                        <i class="fa fa-eye"></i></button>
                                        <button class="btn btn-primary" title="Click to show/hide content" type="button" onclick="
                                    if (document.getElementById(\'spoiler2' . $keys . '\').style.display==\'none\') {
                                        document.getElementById(\'spoiler2' . $keys . '\').style.display=\'block\'} else {
                                        document.getElementById(\'spoiler2' . $keys . '\').style.display=\'none\'}">
                                        <i class="fa fa-table"></i></button>
                                        <div id="spoiler' . $keys . '" style="display:block">
                                            <table class="table table-bordered table-kecil table-nowrap">' . $html . '</table>
                                        </div><br>
                                        <div id="spoiler2' . $keys . '" style="display:none">
                                            <table class="table table-bordered table-kecil table-nowrap">' . $html2 . $html3 . '</table>
                                        </div></center>';
                                },
                            ],
                            'timestamp',

                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Action',
                                'template' => '{view}',
                                'buttons' => [
                                'view' => function($url, $model) {
                                    return Html::a('<button class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>', 
                                        ['view', 'id' => $model['id']], 
                                        ['title' => 'View']);
                                    }
                                ]
                            ],
                        ],
                    ]); ?>

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

$url_clear = Url::to(['app-logd/index']);

$js = <<< JS

var url_clear = '$url_clear' + '?action=clear' ;

$('.clear').on('click', function(e){
    e.preventDefault();
    $(this).attr('href', function() {
        return url_clear + '&timestamp=' + $('#timestamp').val();
    });
});

$('#timestamp').on('change', function(e) {
    $('.clear').attr('href', function() {
        return url_clear + '&timestamp=' + $('#timestamp').val();
    });

});

JS;

$css = <<< CSS

CSS;

$this->registerJs($js);
$this->registerCss($css);

?>

