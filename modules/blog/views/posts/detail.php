<?php
use yii\helpers\Url;

$this->context->layout = 'master';
$this->title = $model->title;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4><?= $model->title ?></h4>
    </div>
    <div class="panel-body">

        <?= $model->content ?>

        <div class="row">
            <div class="col-md-12 text-right">
                <h5>Posted at <b><?= $model->created_at ?></b> by <b><?= $model->user->name ?></b></h5>
            </div>
        </div>

    </div>
</div>
