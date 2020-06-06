<?php

namespace app\modules\language\controllers;

use Yii;
use app\modules\course\models\Course;
use app\modules\school\models\School;
use app\modules\language\models\Language;

class LanguageController extends \app\controllers\BaseController
{
    public function actionIndex($program)
    {
        if (Yii::$app->session->get('program' != $program)) {
            Yii::$app->session->set('program', $program);
            return $this->redirect(['index', 'program' => $program]);
        }
    	$languages = Language::find()->all();
        return $this->render('index', compact('languages', 'program'));
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
