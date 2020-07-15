<?php

namespace app\controllers;

use Yii;
use app\modules\language\models\Language;
use app\modules\country\models\Country;
use app\modules\city\models\City;
use app\modules\school\models\School;

class SearchController extends \app\controllers\BaseController
{
    public function actionResult($lang_id, $country_id, $city_id, $school)
    {
        $schools = $this->getSchools($lang_id, $country_id, $city_id);

        if ($schools && $school) $schools = $this->filterSchoolName($schools, $school);
        else if ($school) $schools = School::find()->where(['like', 'col_title', $school])->all();

        return $this->render('result', compact('schools'));
    }

    //ajax serach home page
	public function actionCountries($lang_id)
    {
    	$countries = Country::find()->select('col_id, col_title_ru')->where(['col_language_id' => $lang_id])->asArray()->all();
    	return $countries ? json_encode($countries) : '';
    }

    //ajax serach home page
    public function actionCities($country_id)
    {
    	$cities = City::find()->select('col_id, col_title_ru')->where(['col_country_id' => $country_id])->asArray()->all();
    	return $cities ? json_encode($cities) : '';
    }

    //ajax serach home page
    public function actionSchools()
    {
        return $this->render('schools');
    }

    public function getSchools($lang_id, $country_id, $city_id)
    {
        if ($city_id) return City::findOne($city_id)->schools;
        if ($country_id) return Country::findSchools($country_id);
        if ($lang_id) return Language::findSchools($lang_id);
        return School::find()->all();
    }

    public function filterSchoolName($schools, $search)
    {
        if (!$search) return $schools;
        $result = [];
        foreach ($schools as $school) {
            if (stripos($school->col_title, $search) !== false) $result[] = $school;
        }
        return $result;
    }

}
