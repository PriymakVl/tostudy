<?php

namespace app\modules\course\controllers;

use Yii;
use app\modules\cours\models\Cours;
use app\modules\school\models\School;


class CourseController extends \app\controllers\BaseController
{
    public function actionWeeks($id)
    {
    	// $cours = Cours::findOne($id);
    	// if(Yii::$app->request->isAjax){
     //        return 'Состояние слова изменено!';
     //    }
        // debug('test');
        return 'test';
    }

}
