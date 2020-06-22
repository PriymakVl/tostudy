<?php

namespace app\modules\city\controllers;

use Yii;
use app\modules\city\models\City;
use app\modules\country\models\Country;
use app\modules\language\models\Language;

class CityController extends \app\controllers\BaseController
{
    public function actionIndex($country_alias)
    {
    	$program = Yii::$app->session->get('program');

    	$lang = Language::findOne(Yii::$app->session->get('lang_id'));

    	$country = Country::findOne(['col_alias' => $country_alias]);

    	$cities = City::findAll(['col_country_id' => $country->col_id]);

        return $this->render('index' , compact('cities', 'country', 'program', 'lang'));
    }

}
