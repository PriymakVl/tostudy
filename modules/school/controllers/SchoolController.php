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
    public function actionIndex($city_alias, $prog_alias)
    {
        $lang = Language::findOne(Yii::$app->session->get('lang_id'));
    	$city = $this->getCity($lang->col_id, $city_alias);
        $program = Program::findOne(['col_alias' => $prog_alias]);
        $schools = $city->sortSchoolsByProgram($program->id);

        Yii::$app->session->set('city_id', $city->col_id);
        $this->registerMetaTags($city);

        return $this->render('index', compact('schools', 'city', 'program', 'lang'));
    }

    public function actionView($alias, $prog_alias)
    {
        Url::remember();
    	$school = School::findOne(['col_alias' => $alias]);
        $program = Program::findOne(['col_alias' => $prog_alias]);
    	$courses = $school->getCourses($program->id);
        $accommodation = $school->accommodation;
        $lang = Language::findOne(Yii::$app->session->get('lang_id'));
        $order = new Order();

        $this->registerMetaTags($school);

        return $this->render('view', compact('program', 'school', 'courses', 'accommodation', 'lang', 'order'));
    }

    private function getCity($lang_id, $city_alias)
    {
        $cities = City::findAll(['col_alias' => $city_alias]);
        foreach ($cities as $city) {
            if ($city->country->col_language_id == $lang_id) return $city;
        }   
    }

}
