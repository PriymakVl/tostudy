<?php

namespace app\modules\school\controllers;

use Yii;
use yii\helpers\Url;
use app\models\Order;
use app\modules\language\models\Language;
use app\modules\school\models\School;
use app\modules\city\models\City;
USE app\models\Program;

class SchoolController extends \app\controllers\BaseController
{
    public function actionIndex($city_alias)
    {
        $lang = Language::findOne(Yii::$app->session->get('lang_id'));
    	$city = $this->getCity($lang->col_id, $city_alias);
        Yii::$app->session->set('city_id', $city->col_id);
        $prog_id = Yii::$app->session->get('prog_id');
        $schools = $city->sortSchoolsByProgram($prog_id);
        $this->registerMetaTags($city);
        return $this->render('index', compact('schools', 'city', 'prog_id', 'lang'));
    }

    public function actionView($alias)
    {
        Url::remember();
    	$school = School::findOne(['col_alias' => $alias]);
        $prog_id = Yii::$app->session->get('prog_id') ?? Program::DEFAULT_ID;
    	$courses = $school->getCourses($prog_id);
        $accommodation = $school->accommodation;
        $lang = Language::findOne(Yii::$app->session->get('lang_id'));
        $order = new Order();
        $this->registerMetaTags($school);
        return $this->render('view', compact('school', 'courses', 'accommodation', 'lang', 'order'));
    }

    private function getCity($lang_id, $city_alias)
    {
        $cities = City::findAll(['col_alias' => $city_alias]);
        foreach ($cities as $city) {
            if ($city->country->col_language_id == $lang_id) return $city;
        }   
    }

}
