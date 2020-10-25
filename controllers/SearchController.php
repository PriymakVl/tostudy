<?php

namespace app\controllers;

use Yii;
use app\modules\language\models\Language;
use app\modules\country\models\Country;
use app\modules\city\models\City;
use app\modules\school\models\School;
use app\models\Program;

class SearchController extends \app\controllers\BaseController
{
    public function actionResult($prog_id, $lang_id, $country_id, $city_id, $school)
    {
        $program = Program::findOne($prog_id);
        $lang = Language::findOne($lang_id);
        $schools = $this->getSchools($lang_id, $country_id, $city_id);

        if ($school) $schools = $this->filterSchoolName($schools, $school);

        return $this->render('result', compact('schools', 'lang', 'program'));
    }

    //ajax serach home page
	public function actionCountries($lang_id, $prog_id)
    {
        $countries = Country::find()->where(['col_language_id' => $lang_id])->all();
    	$countries = $this->selectCountries($countries, $prog_id);
    	return $countries ? json_encode($countries) : '';
    }

    //ajax serach home page
    public function actionCities($prog_id, $country_id)
    {
    	$cities = City::find()->where(['col_country_id' => $country_id])->all();
        $cities = $this->selectCities($cities, $prog_id);
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

    private function selectCities($cities, $prog_id) {
        
        if (!$cities) return false;
        $selected = [];
        foreach ($cities as $city) {
            $schools = $city->countSchoolsByProgram($prog_id);
            if ($schools) $selected[] = ['id' => $city->col_id, 'name' => $city->name];
        }
        return $selected;
    }

    private function selectCountries($countries, $prog_id) {
        
        if (!$countries) return false;
        $selected = [];
        foreach ($countries as $country) {
            $schools = $country->countSchoolsByProgram($prog_id);
            if ($schools) $selected[] = ['id' => $country->col_id, 'name' => $country->name];
        }
        return $selected;
    }

}
