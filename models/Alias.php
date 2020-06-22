<?php

namespace app\models;

use Yii;
use app\helpers\Inflector;
use app\models\Article;
use app\modules\school\models\School;
use app\modules\country\models\Country;
use app\modules\language\models\Language;
use app\modules\city\models\City;

 
class Alias
{

	public static function add()
	{
		self::articles();
		self::schools();
		self::countries();
		self::languages();
		self::cities();
	}

	public static function articles()
	{
	    $articles = Article::find()->all();
	    if (!$articles) return;
	    foreach ($articles as $article) {
	        $article->col_alias = Inflector::slug($article->col_title_ru, '_');
	        $article->save(false);
	    }
	}

	public static function schools()
	{
	    $schools = School::find()->all();
        if (!$schools) return;
        foreach ($schools as $school) {
            $school->col_alias = Inflector::slug($school->col_title, '_');
            $school->save(false);
        }
	}

	public static function countries()
	{
	    $countries = Country::find()->all();
        if (!$countries) return;
        foreach ($countries as $country) {
            $country->col_alias = Inflector::slug($country->col_title_en, '_');
            $country->save(false);
        }
	}

	public static function languages()
	{
	    $languages = Language::find()->all();
        if (!$languages) return;
        foreach ($languages as $lang) {
            $lang->col_alias = Inflector::slug($lang->col_title_en, '_');
            $lang->save(false);
        }
	}

	public static function cities()
	{
	    $cities = City::find()->all();
        if (!$cities) return;
        foreach ($cities as $city) {
            $city->col_alias = Inflector::slug($city->col_title_ru, '_');
            $city->save(false);
        }
	}


}