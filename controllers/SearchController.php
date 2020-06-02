<?php

namespace app\controllers;

use app\modules\country\models\Country;
use app\modules\city\models\City;

class SearchController extends \app\controllers\BaseController
{
	public function actionCountries($lang_id)
    {
    	$countries = Country::find()->select('col_id, col_title_ru')->where(['col_language_id' => $lang_id])->asArray()->all();
    	return $countries ? json_encode($countries) : '';
    }

    public function actionCities($country_id)
    {
    	$cities = City::find()->select('col_id, col_title_ru')->where(['col_country_id' => $country_id])->asArray()->all();
    	return $cities ? json_encode($cities) : '';
    }

    public function actionSchools()
    {
        return $this->render('schools');
    }

}
