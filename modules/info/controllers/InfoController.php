<?php

namespace app\modules\info\controllers;

use app\modules\info\models\Info;
use app\modules\country\models\Country;


class InfoController extends \app\controllers\BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCountry($country_alias)
    {
    	$county = Country::findOne(['col_alias' => $country_alias]);
    	return $this->render('country', compact('country'));
    }

    public function actionView($alias)
    {
    	$article = Info::findOne(['col_alias' => $alias]);
    	$country = $article->country;
    	// debug($article);
        return $this->render('view', compact('article', 'country'));
    }

}
