<?php

namespace app\modules\language\controllers;

use Yii;
use app\modules\course\models\Course;
use app\modules\school\models\School;
use app\modules\language\models\Language;
use app\models\Program;
use yii\web\NotFoundHttpException;

class LanguageController extends \app\controllers\BaseController
{
    public function actionIndex($program_alias)
    {
        if ($program_alias != 'all') $program = Program::findOne(['col_alias' => $program_alias]);
        if ($program) {
        	Yii::$app->session->set('prog_id', $program->col_id);
        	$this->registerMetaTags($program);
        }
    	$languages = Language::find()->all();
        return $this->render('index', compact('languages', 'program'));
    }

}
