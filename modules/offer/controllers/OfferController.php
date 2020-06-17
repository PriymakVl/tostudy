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
        return $this->render('view', ['offer' => $offer]);
    }

}
