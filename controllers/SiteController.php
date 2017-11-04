<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\Country;
use app\models\InquiryForm;
use app\models\LoginForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (! Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAamir()
    {
        return $this->render("aamir");
    }

    public function actionInquiry()
    {
        $model = new InquiryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            return $this->render('inquiry-submitted', compact('model'));
        }

        return $this->render('inquiry', compact('model'));
    }

    public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['message' => $message]);
    }

    public function actionCountry()
    {
        $countries = Country::find()->all();

        return $this->render('countries', compact('countries'));
    }

    public function actionEditCountry($code)
    {
        $model = Country::findOne(['code' => $code]);
        $message = null;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $message = 'Country updated successfully!';

            $model->save();

            return $this->redirect("/site/country/{$model->code}/edit");
        }

        return $this->render('edit-country', compact('model'));
    }

    public function actionDeleteCountry($code)
    {
        $model = Country::findOne(['code', $code]);
        if (! $model) {
            return $this->redirect('/site/404');
        }

        $model->delete();

        return $this->redirect('/site/country');
    }

    public function actionCountryCreate()
    {
        $model = new Country();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();

            return $this->redirect('/site/country');
        }

        return $this->render('create-country', compact('model'));
    }
}
