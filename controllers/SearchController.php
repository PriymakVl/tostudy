<?php

namespace app\controllers;

use Yii;
use app\modules\country\models\Country;
use app\modules\city\models\City;
use app\modules\school\models\School;

class SearchController extends \app\controllers\BaseController
{
    public function actionResult()
    {
        $get = Yii::$app->request->get();
        $schools = false;
        if(!empty($get['school'])) $schools = School::find()->where(['like', 'col_title', $get['school']])->all();
        else if (!empty($get['city'])) $schools = School::findAll(['col_city_id' => $get['city']]);
        else if (!empty($get['country'])) $schools = Country::findSchools($get['country']);
        else if (!empty($get['language'])) $schools = language::findSchools($get['language']);
        return $this->render('result', compact('schools'));
    }

    //ajax serach home page
	public function actionCountries($lang_id)
    {
    	$countries = Country::find()->select('col_id, col_title_en')->where(['col_language_id' => $lang_id])->asArray()->all();
    	return $countries ? json_encode($countries) : '';
    }

    //ajax serach home page
    public function actionCities($country_id)
    {
    	$cities = City::find()->select('col_id, col_title_en')->where(['col_country_id' => $country_id])->asArray()->all();
    	return $cities ? json_encode($cities) : '';
    }

    //ajax serach home page
    public function actionSchools()
    {
        return $this->render('schools');
    }

}
