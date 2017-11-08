<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\BaseStringHelper;

$this->context->layout = 'master';
$this->title = 'My Posts';
?>

<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => \yii\grid\SerialColumn::className()],
        [
            'class' => 'yii\grid\DataColumn',
            'attribute' => 'title',
            'content' => function ($data) {
                return BaseStringHelper::truncate($data->title, 25);
            }
        ],
        'created_at',
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function($action, $model, $key, $index, $actionColumn){
                switch($action){
                    case 'view':
                        return "{$model->slug}";
                    case 'update':
                        return "{$model->id}/edit";
                    case 'delete':
                        return "{$model->id}/delete";
                }

                return '';
            }
        ]
    ]
]); ?>
