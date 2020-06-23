<?php

namespace app\modules\info\controllers;

use app\modules\info\models\Info;
use app\modules\country\models\Country;


class InfoController extends \app\controllers\BaseController
{
    public function actionIndex()
    {
    	$countries = Country::find()->orderBy('col_id')->all();
        return $this->render('index', compact('countries'));
    }

    public function actionCountry($country_alias)
    {
    	$country = Country::findOne(['col_alias' => $country_alias]);
    	return $this->render('country', compact('country'));
    }

    public function actionView($article_alias)
    {
    	$article = Info::findOne(['col_alias' => $article_alias]);
    	$country = $article->country;
        return $this->render('view', compact('article', 'country'));
    }

}
