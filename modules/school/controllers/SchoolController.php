<?php

namespace app\modules\school\controllers;

use Yii;
use app\modules\course\models\Course;
use app\modules\school\models\School;
use app\modules\language\models\Language;
use app\modules\city\models\City;
use app\components\Svg;

class SchoolController extends \app\controllers\BaseController
{
    public function actionIndex($city_id)
    {
    	$city = City::findOne($city_id);
    	$schools = School::findAll(['col_city_id' => $city_id]);
        return $this->render('index', compact('schools', 'city'));
    }

    public function actionView($school_id)
    {
    	$school = School::findOne($school_id);
    	$courses = $school->courses;
    	// debug($courses[0]->templateWeeksOption());
        return $this->render('view', compact('school', 'courses'));
    }

}
