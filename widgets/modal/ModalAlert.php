<?php 

namespace app\widgets\modal;

use Yii;

class ModalAlert extends \yii\bootstrap\Widget
{


	public function run()
    {
    	if ( Yii::$app->session->hasFlash('success') ) {
    		return $this->render('info', ['message' => Yii::$app->session->getFlash('success')]);
    	}
    	else if (Yii::$app->session->hasFlash('error')) {
    		return $this->render('error', ['message' => Yii::$app->session->getFlash('error')]);
    	}
    }
}