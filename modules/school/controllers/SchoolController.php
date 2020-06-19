<?php

namespace app\modules\school\controllers;

use Yii;
use app\modules\school\models\School;
use app\modules\city\models\City;

class SchoolController extends \app\controllers\BaseController
{
    public function actionIndex($city_id)
    {
        Yii::$app->session->set('city_id', $city_id);
        $program = Yii::$app->session->get('program');
    	$city = City::findOne($city_id);
        $schools = $city->sortSchoolsByProgram($program);
        return $this->render('index', compact('schools', 'city', 'program'));
    }

    public function actionView($alias)
    {
    	$school = School::findOne(['col_alias' => $alias]);
    	$courses = $school->courses;
        return $this->render('view', compact('school', 'courses'));
    }

}
