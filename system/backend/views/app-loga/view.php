<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AppLoga */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'App Logas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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
            <div class="app-loga-view">
                <p>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'id_user',
                        'name',
                        [
                        'format' => 'raw',
                        'attribute' => 'update',
                        'value' => function ($data) {

                                 return '<div id="json">' . $data['update'] . '</div>';
                            },
                        ],
                        'ip_address',
                        'user_agent:ntext',
                        'timestamp',
                    ],
                ]) ?>

            </div>

        </div>

    </div>

</div>

<?php

$js = <<< JS

$(document).ready(function(e) {
    json = $("#json").html();
    json_pretty = syntaxHighlight(json);
    $("#json").html('<pre>'+json_pretty+'</pre>');
});

function syntaxHighlight(json) {
    if (typeof json != 'string') {
         json = JSON.stringify(json, undefined, 2);
    }
    json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
        var cls = 'number';
        if (/^"/.test(match)) {
            if (/:$/.test(match)) {
                cls = 'key';
            } else {
                cls = 'string';
            }
        } else if (/true|false/.test(match)) {
            cls = 'boolean';
        } else if (/null/.test(match)) {
            cls = 'null';
        }
        return '<span class="' + cls + '">' + match + '</span>';
    });
}

JS;

$css = <<< CSS

pre {
  outline: 1px solid #ccc;
  padding: 5px;
  margin: 5px;
}
.string {
  color: green;
  display: inline;
}
.number {
  color: darkorange;
  display: inline;
}
.boolean {
  color: blue;
  display: inline;
}
.null {
  color: magenta;
  display: inline;
}
.key {
  color: red;
}
.string::after {
  content: "\a";
  white-space: pre;
}
.number::after {
  content: "\a";
  white-space: pre;
}
.null::after {
  content: "\a";
  white-space: pre;
}
.boolean::after {
  content: "\a";
  white-space: pre;
}

CSS;

$this->registerCss($css);
$this->registerJs($js);

?>


