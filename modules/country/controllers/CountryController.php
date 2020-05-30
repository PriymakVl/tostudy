<?php

namespace app\modules\country\controllers;

use app\modules\country\models\Country;
use app\modules\language\models\Language;

class CountryController extends \app\controllers\BaseController
{
    public function actionIndex($lang_id)
    {
    	$lang = Language::findOne($lang_id);
    	$countries = Country::findAll(['col_language_id' => $lang_id]);
        return $this->render('index', compact('countries', 'lang'));
    }

}
