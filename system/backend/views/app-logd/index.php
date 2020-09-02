<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
    <div class="card-block">
        <div class="card-body">
            <div class="card-text">
                <div class="app-logd-index">

                    <p>
                        <?= Html::a('<i class="feather icon-trash"></i> Clear', ['index', 'action' => 'clear'], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to clear log ?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <div class="table-responsive">

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
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

                                // ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
