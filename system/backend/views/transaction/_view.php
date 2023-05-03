<?php

use yii\widgets\DetailView;

?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'number',
        'code_customer',
        'datetime',
        'name',
        'type',
        'value',
        'id_user',
        'timestamp',
    ],
]) ?>