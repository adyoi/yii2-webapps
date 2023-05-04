<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap4\Modal;
use yii\widgets\Pjax;
use backend\models\Transaction;

/** @var yii\web\View $this */
/** @var backend\models\TransactionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Transactions PJAX';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-index">
    <!-- Default box -->
    <div class="card">
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

            <?php Pjax::begin([
                'id' => 'pjax-index',
                'enablePushState' => false,
                'timeout' => false,
            ]) ?> 

            <p>
                <?= Html::a('Create Transaction', 'javascript:void(0)', ['class' => 'create_ btn btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <div class="table-responsive table-nowrap">

                <?= GridView::widget([
                    'id' => 'index-grid',
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'number',
                        'code_customer',
                        'datetime',
                        'name',
                        'type',
                        'value',
                        [
                            'label' => 'Username',
                            'attribute' => 'id_user',
                            'filter' => ArrayHelper::map(\backend\models\User::find()->asArray()->all(), 'id', 'username'),
                            'value' => function ($data) {
                                $user = \backend\models\User::findOne(['id' => $data['id_user']]);
                                return $user['username'];
                            },
                        ],
                        'timestamp',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Action',
                            'template' => '{view} {update} {delete}',
                            'buttons' => [
                            'view' => function($url, $model) {
                                return Html::a('<button class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>', 
                                    'javascript:void(0)', 
                                    [
                                        'title' => 'View', 
                                        'class' => 'view_',         // Add class button update
                                        'data-id' => $model['id'],  // Add identification query
                                    ]
                                );
                            },
                            'update' => function($url, $model) {
                                return Html::a('<button class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button>', 
                                    'javascript:void(0)', 
                                    [
                                        'title' => 'Update', 
                                        'class' => 'update_',       // Add class button update
                                        'data-id' => $model['id'],  // Add identification query
                                    ]
                                );
                            },
                            'delete' => function($url, $model) {
                                return Html::a('<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>', 
                                    'javascript:void(0)', 
                                    [
                                        'title' => 'Delete', 
                                        'class' => 'delete_',       // Add class button update
                                        'data-id' => $model['id'],  // Add identification query
                                    ]
                                    ); 
                                }
                            ]
                        ],
                    ],
                ]); ?>

            </div>

            <?php Pjax::end() ?>

        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <div class="text-center"><i><?= Html::encode($this->title) ?></i></div>
        </div>
        <!-- /.card-footer-->

    </div>

</div>
<?php

$url_create = Url::base().'/transaction/create';
$url_update = Url::base().'/transaction/update?id=';
$url_view   = Url::base().'/transaction/view?id=';
$url_delete = Url::base().'/transaction/delete?id=';

$js = <<< JS

/* If you don't know The Proccess you can not get it */
$(document).on('submit', '#input-form', function(e) {
    e.preventDefault();
    if ($.active == 1) {
        return false;
    }
})

$(document).on('pjax:start', '#pjax-form', function(e) {
    e.preventDefault();
    $('.save_').attr('disabled','disabled');
    $('.pjax-message').text('Progress ...');
});

$(document).on('pjax:end', '#pjax-form', function(e) {
    e.preventDefault();
    $('.save_').removeAttr('disabled');
    $.pjax.reload({timeout: false, container:'#pjax-index'});
});

$(".create_").on("click", function(e) {
    e.preventDefault();
    url = '$url_create';
    $('#modal-label').text('Form Create');
    $('#modal').modal('show')
               .find('.modal-body')
               .html('Loading ...')
               .load(url);
});

$(".update_").on("click", function(e) {
    e.preventDefault();
    id = $(this).data('id');
    url = '$url_update' + id;
    $('#modal-label').text('Form Update');
    $('#modal').modal('show')
               .find('.modal-body')
               .html('Loading ...')
               .load(url);
});

$(".view_").on("click", function(e) {
    e.preventDefault();
    id = $(this).data('id');
    url = '$url_view' + id;
    $('#modal-label').text('View');
    $('#modal').modal('show')
               .find('.modal-body')
               .html('Loading ...')
               .load(url);
});

$(".delete_").on("click", function(e) {
    e.preventDefault();
    id = $(this).data('id');
    url = '$url_delete' + id;
    Swal.fire({
        width: '360px',
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.value) {
            if ($.active == 0) {
                $.ajax({
                    url: url,
                    type: 'post',
                    success: function(data) {
                        swal.fire({
                            width: '360px',
                            title: 'Information',
                            html: data,
                            icon: 'success',
                            timer: 1000,
                            showCancelButton: false,
                            showConfirmButton: false
                        });
                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseText);
                    }
                }).done(function(data) {
                    $.pjax.reload({timeout: false, container:'#pjax-index'});
                });
            }
        }
    });
});

$(document).on('pjax:success', function() {

    /* Reiinit function Click after pjax */

    $(".create_").on("click", function(e) {
        e.preventDefault();
        url = '$url_create';
        $('#modal-label').text('Form Create');
        $('#modal').modal('show')
                   .find('.modal-body')
                   .html('Loading ...')
                   .load(url);
    });

    $(".update_").on("click", function(e) {
        e.preventDefault();
        id = $(this).data('id');
        url = '$url_update' + id;
        $('#modal-label').text('Form Update');
        $('#modal').modal('show')
                   .find('.modal-body')
                   .html('Loading ...')
                   .load(url);
    });

    $(".view_").on("click", function(e) {
        e.preventDefault();
        id = $(this).data('id');
        url = '$url_view' + id;
        $('#modal-label').text('View');
        $('#modal').modal('show')
                   .find('.modal-body')
                   .html('Loading ...')
                   .load(url);
    });

    $(".delete_").on("click", function(e) {
        e.preventDefault();
        id = $(this).data('id');
        url = '$url_delete' + id;
        Swal.fire({
            width: '360px',
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.value) {
                if ($.active == 0) {
                    $.ajax({
                        url: url,
                        type: 'post',
                        success: function(data) {
                            swal.fire({
                                width: '360px',
                                title: 'Information',
                                html: data,
                                icon: 'success',
                                timer: 1000,
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                        },
                        error: function(xhr, status, error) {
                            alert(xhr.responseText);
                        }
                    }).done(function(data) {
                        $.pjax.reload({timeout: false, container:'#pjax-index'});
                    });
                }
            }
        });
    });
});

JS;

$css = <<< CSS

CSS;

$this->registerJs($js);
$this->registerCss($css);

Modal::begin(['size' => Modal::SIZE_LARGE, 'id' => 'modal', 'title' => 'Form']); Modal::end();
