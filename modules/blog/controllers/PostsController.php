<?php
/**
 * Created by PhpStorm.
 * User: rummykhan
 * Date: 11/5/17
 * Time: 2:04 PM
 */

namespace app\modules\blog\controllers;

use yii\web\Controller;

class PostsController extends Controller
{
    public function beforeAction($action)
    {
        dd($action);
    }


    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMine()
    {

    }
}