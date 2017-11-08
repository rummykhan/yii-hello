<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->context->layout = 'master';
$this->title = 'Blog Index';

?>

<?php foreach ($models as $model) : ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="<?= Url::to('/blog/posts/' . $model->slug) ?>"><?= $model->title ?></a>
        </div>
        <div class="panel-body">
            <?= $model->content ?>
        </div>
    </div>
<?php endforeach; ?>

<div class="row">
    <div class="col-md-12 text-center">
        <?= LinkPager::widget(['pagination' => $pages]) ?>
    </div>
</div>
