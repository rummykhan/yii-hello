<?php
/**
 * Created by PhpStorm.
 * User: rummykhan
 * Date: 11/5/17
 * Time: 2:04 PM
 */

namespace app\modules\blog\controllers;

use app\modules\blog\models\Post;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PostsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => 'true',
                        'actions' => ['index'],
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMine()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find()->where(['user_id' => \Yii::$app->user->getId()]),
            'pagination' => [
                'pageSize' => 20
            ]
        ]);

        return $this->render('mine', compact('dataProvider', 'html'));

    }

    public function actionDetail($slug)
    {
        $model = Post::find()->with(['user'])->where(['slug' => $slug])->one();
        if (!$model) {
            throw  new NotFoundHttpException();
        }

        return $this->render('detail', compact('model'));
    }

    public function actionEdit($id)
    {
        $query = Post::find()->where(['id' => $id]);

        $post = $query->one();
    }

    public function actionDelete($id)
    {

    }
}