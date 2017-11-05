<?php

namespace app\modules\blog\controllers;

use yii\web\Controller;

class HomeController extends Controller
{
    public function __construct($id, \yii\base\Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->layout = '';
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}