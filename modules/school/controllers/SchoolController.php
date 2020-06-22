<?php

namespace app\modules\school\controllers;

use Yii;
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
        $program = Yii::$app->session->get('program');
        $schools = $city->sortSchoolsByProgram($program);
        return $this->render('index', compact('schools', 'city', 'program', 'lang'));
    }

    public function actionView($alias)
    {
    	$school = School::findOne(['col_alias' => $alias]);
    	$courses = $school->courses;
        $lang = Language::findOne(Yii::$app->session->get('lang_id'));
        return $this->render('view', compact('school', 'courses', 'lang'));
    }

}
