<?php

namespace app\modules\language\controllers;

use app\modules\course\models\Course;
use app\modules\school\models\School;
use app\modules\language\models\Language;

class LanguageController extends \app\controllers\BaseController
{
    public function actionIndex()
    {
    	$languages = Language::find()->all();
        return $this->render('index', compact('languages'));
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
