<?php

namespace app\controllers;

use app\models\{Setting, Feedback};

class ContactController extends \app\controllers\BaseController
{
    public function actionView()
    {
		$contact = Setting::find()->one();
		$model = new Feedback;
        return $this->render('contacts', compact('contact', 'model'));
    }

}
