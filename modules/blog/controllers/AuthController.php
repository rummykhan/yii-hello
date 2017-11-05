<?php
/**
 * Created by PhpStorm.
 * User: rummykhan
 * Date: 11/5/17
 * Time: 11:11 AM
 */

namespace app\modules\blog\controllers;

use app\modules\blog\models\User;
use yii\db\IntegrityException;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (! \Yii::$app->user->isGuest) {
            return $this->redirect('/blog/home/index');
        }

        $user = new User();
        $error = null;

        if ($user->load(\Yii::$app->request->post())) {
            if ($user->login()) {
                return $this->redirect('/blog/home/index');
            } else {
                $error = 'Invalid username or password';
            }
        }

        $message = \Yii::$app->request->get('message');

        return $this->render('login', compact('message', 'error', 'user'));
    }

    public function actionRegister()
    {
        if (! \Yii::$app->user->isGuest) {
            return $this->redirect('/blog/home/index');
        }

        $user = new User();
        $error = null;

        if ($user->load(\Yii::$app->request->post())) {

            try {
                $user->save(true);

                return $this->redirect(['/blog/auth/login', 'message' => 'Now you can login!']);
            } catch (IntegrityException $e) {
                $error = $e->getMessage();
            }
        }

        return $this->render('register', compact('user', 'error'));
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->redirect('/blog/home');
    }
}