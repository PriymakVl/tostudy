<?php

namespace app\modules\school\controllers;

use Yii;
use app\modules\school\models\School;
use app\modules\city\models\City;

class SchoolController extends \app\controllers\BaseController
{
    public function actionIndex($city_id)
    {
    	$city = City::findOne($city_id);
    	$schools = School::findAll(['col_city_id' => $city_id]);
        return $this->render('index', compact('schools', 'city'));
    }

    public function actionView($id)
    {
    	$school = School::findOne(['col_id' => $id]);
    	$courses = $school->courses;
        return $this->render('view', compact('school', 'courses'));
    }

}
