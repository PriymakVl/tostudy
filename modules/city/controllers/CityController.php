<?php

namespace app\modules\city\controllers;

use Yii;
use app\modules\city\models\City;
use app\modules\country\models\Country;
use app\modules\language\models\Language;
use app\models\Program;
use yii\helpers\ArrayHelper;

class CityController extends \app\controllers\BaseController
{
    public function actionIndex($country_alias, $prog_alias)
    {
        $program = Program::findOne(['col_alias' => $prog_alias]);

    	$lang = Language::findOne(Yii::$app->session->get('lang_id'));

    	$country = Country::findOne(['col_alias' => $country_alias, 'col_language_id' => $lang->col_id]);

    	$cities = City::findAll(['col_country_id' => $country->col_id]);
    	
    	$this->registerMetaTags($country);

        return $this->render('index' , compact('cities', 'country', 'program', 'lang'));
    }

}
