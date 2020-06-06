<?php

namespace app\modules\city\controllers;

use Yii;
use app\modules\city\models\City;
use app\modules\country\models\Country;

class CityController extends \app\controllers\BaseController
{
    public function actionIndex($country_id)
    {
    	Yii::$app->session->set('country_id', $country_id);
    	$program = Yii::$app->session->get('program');
    	$lang = Yii::$app->session->get('lang_id');
    	$country = Country::findOne($country_id);
    	$cities = City::findAll(['col_country_id' => $country_id]);
        return $this->render('index' , compact('cities', 'country', 'program'));
    }

}
