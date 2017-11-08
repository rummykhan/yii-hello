<?php

namespace app\modules\blog\controllers;

use app\modules\blog\models\Post;
use yii\data\Pagination;
use yii\web\Controller;

class HomeController extends Controller
{
    public function actionIndex()
    {
        $query = Post::find()->where([]);
        $pQuery = clone $query;
        $pages = new Pagination(['totalCount' => $pQuery->count()]);

        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index', compact('models', 'pages'));
    }
}