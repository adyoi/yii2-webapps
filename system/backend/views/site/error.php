<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $name;
$this->params['page_title'] = 'Errors';
$this->params['page_desc'] = $this->title;
?>
<div class="site-error">
    
    <div class="card">

        <div class="card-body login-card-body">

            <div class="alert alert-danger">
                <?= nl2br(Html::encode($message)) ?>
            </div>

            <p>
                The above error occurred while the Web server was processing your request.
            </p>
            <p>
                Please contact us if you think this is a server error. Thank you.
            </p>
            <p>
                <a href="<?=Url::base()?>"><b>Back</b></a>
            </p>

        </div>

    </div>

</div>
