<?php

namespace app\modules\offer\controllers;

use app\modules\offer\models\Offer;

class OfferController extends \app\controllers\BaseController
{
    public function actionIndex()
    {
    	$offers = Offer::findAll(['col_status' => Offer::STATUS_ACTIVE]);
        return $this->render('index', ['offers' => $offers]);
    }

    public function actionView($alias)
    {
    	$offer = Offer::findOne(['col_alias' => $alias]);
        $this->registerMetaTags($offer);
        return $this->render('view', ['offer' => $offer]);
    }

    public function registerMetaTags($offer)
    {
        $this->view->title = $offer->col_title_en;
        $this->view->registerMetaTag(['name' => 'description', 'content' => $offer->col_meta_description_en]);
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $offer->col_meta_keywords_en]);
    }

}
