<?php

namespace app\modules\country\controllers;

use Yii;
use app\modules\country\models\Country;
use app\modules\language\models\Language;

class CountryController extends \app\controllers\BaseController
{
    public function actionIndex($lang_alias)
    {
    	$prog_id = Yii::$app->session->get('prog_id');

    	if ($lang_alias == 'all') $countries = Country::find()->all();
    	else {
    		$lang = Language::findOne(['col_alias' => $lang_alias]);
    		Yii::$app->session->set('lang_id', $lang->col_id);

    		$countries = Country::findAll(['col_language_id' => $lang->col_id]);
    	}

    	
        return $this->render('index', compact('countries', 'lang', 'prog_id'));
    }

}
