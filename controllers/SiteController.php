<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\controllers\BaseController;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\{LoginForm, ContactForm, Review, Faq, Partner, Page, Setting, Feedback, Article};
use app\modules\school\models\School;
use app\modules\course\models\Course;

class SiteController extends BaseController
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
        $reviews = Review::findAll(['col_home_page' => 1]);
        $schools = School::findAll(['col_home_page' => 1]);
        $questions = Faq::find()->all();
        $partners = Partner::find()->all();
        return $this->render('index', compact('schools', 'reviews', 'settings', 'questions', 'partners'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'admin';
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/admin/schools');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin/schools');
        }

        $model->password = '';
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

    public function actionAdmin()
    {
        if (Yii::$app->user->isGuest) return $this->redirect('login');
        return $this->redirect('/admin/schools');
    }

    public function actionContacts()
    {
        $contact = Setting::find()->one();
        $model = new Feedback;
        if (Yii::$app->request->isGet) return $this->render('contacts', compact('contact', 'model'));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->setMessage('Спасибо, заявка принята. Мы свяжемся с Вами в ближайшее время.')->back();
        }
        return $this->setMessage('Возникла ошибка', 'error')->back();
    }


    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $page = Page::about();
        return $this->render('about', ['page' => $page]);
    }

    public function actionInsurance()
    {
        $page = Page::insurance();
        return $this->render('insurance', ['page' => $page]);
    }

    public function actionOrder()
    {
        $page = Page::order();
        return $this->render('order', ['page' => $page]);
    }

    public function actionReviews()
    {
        $reviews = Review::find()->all();
        return $this->render('reviews', ['reviews' => $reviews]);
    }

    public function actionCalculator($course_id)
    {
        $course = Course::findOne($course_id);
        $weeks = $course->getWeeksWithPrices();
        return json_encode($weeks);
    }
}
