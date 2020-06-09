<?php

namespace app\modules\language\controllers;

use Yii;
use app\modules\course\models\Course;
use app\modules\school\models\School;
use app\modules\language\models\Language;

class LanguageController extends \app\controllers\BaseController
{
    public function actionIndex($program = false)
    {
        $this->setProgram($program);
    	$languages = Language::find()->all();
        return $this->render('index', compact('languages', 'program'));
    }

    private function setProgram($program)
    {
        $session = Yii::$app->session->get('program');
        if ($program && $program == $session) return;
        if ($program && $program != $session) return Yii::$app->session->set('program', $program);
        if (!$program) return Yii::$app->session->set('program', null);
    }

    // public function actionView()
    // {
    //     return $this->render('view');
    // }

}
