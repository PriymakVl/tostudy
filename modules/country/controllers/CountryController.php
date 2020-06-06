<?php

namespace app\modules\country\controllers;

use Yii;
use app\modules\country\models\Country;
use app\modules\language\models\Language;

class CountryController extends \app\controllers\BaseController
{
    public function actionIndex($lang_id)
    {
    	$program = Yii::$app->session->get('program');
    	$lang = Language::findOne($lang_id);
    	Yii::$app->session->set('language', $lang->col_title_ru);
    	Yii::$app->session->set('lang_id', $lang_id);
    	$countries = Country::findAll(['col_language_id' => $lang_id]);
        return $this->render('index', compact('countries', 'lang', 'program'));
    }

}
