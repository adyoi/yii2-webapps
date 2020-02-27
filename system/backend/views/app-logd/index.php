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
                <div class="app-logd-index">

                    <p>
                        <?= Html::a('<i class="feather icon-trash"></i> Clear', ['index', 'action' => 'clear'], [
                            'class' => 'btn btn-xs btn-danger',
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
                                        return '<center><button class="btn btn-xs btn-success" title="Click to show/hide content" type="button" onclick="
                                        if (document.getElementById(\'spoiler' . $keys . '\').style.display==\'none\') {
                                            document.getElementById(\'spoiler' . $keys . '\').style.display=\'block\'} else {
                                            document.getElementById(\'spoiler' . $keys . '\').style.display=\'none\'}">
                                            <i class="feather icon-eye"></i></button>
                                            <button class="btn btn-xs btn-primary" title="Click to show/hide content" type="button" onclick="
                                        if (document.getElementById(\'spoiler2' . $keys . '\').style.display==\'none\') {
                                            document.getElementById(\'spoiler2' . $keys . '\').style.display=\'block\'} else {
                                            document.getElementById(\'spoiler2' . $keys . '\').style.display=\'none\'}">
                                            <i class="feather icon-list"></i></button>
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
