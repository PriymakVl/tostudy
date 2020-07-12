<?php

namespace app\modules\school\controllers;

use Yii;
use yii\helpers\Url;
use app\models\Order;
use app\modules\language\models\Language;
use app\modules\school\models\School;
use app\modules\city\models\City;

class SchoolController extends \app\controllers\BaseController
{
    public function actionIndex($city_alias)
    {
    	$city = City::findOne(['col_alias' => $city_alias]);
        $lang = Language::findOne(Yii::$app->session->get('lang_id'));
        Yii::$app->session->set('city_id', $city->col_id);
        $prog_id = Yii::$app->session->get('prog_id');
        $schools = $prog_id ? $city->sortSchoolsByProgram($prog_id) : $city->schools;
        $this->registerMetaTags($city);
        return $this->render('index', compact('schools', 'city', 'prog_id', 'lang'));
    }

    public function actionView($alias)
    {
        Url::remember();
    	$school = School::findOne(['col_alias' => $alias]);
        $prog_id = Yii::$app->session->get('prog_id');
    	$courses = $school->getCourses($prog_id);
        $accommodation = $school->accommodation;
        $lang = Language::findOne(Yii::$app->session->get('lang_id'));
        $order = new Order();
        $this->registerMetaTags($school);
        return $this->render('view', compact('school', 'courses', 'accommodation', 'lang', 'order'));
    }

}
