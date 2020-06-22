<?php

namespace app\modules\language\controllers;

use Yii;
use app\modules\course\models\Course;
use app\modules\school\models\School;
use app\modules\language\models\Language;

class LanguageController extends \app\controllers\BaseController
{
    public function actionIndex($program_alias)
    {
        $program = Yii::$app->program->getByAlias($program_alias);
        Yii::$app->session->set('program', $program);
    	$languages = Language::find()->all();
        return $this->render('index', compact('languages', 'program'));
    }

}
