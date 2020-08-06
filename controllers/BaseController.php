<?php

namespace app\controllers;

use Yii;
use app\modules\language\models\Language;

class BaseController extends \yii\web\Controller
{

	public function init()
	{
        Yii::$app->session->open();
        $this->setParams();
        return parent::init();
	} 

	public function setMessage($text, $type = 'success')
	{
		Yii::$app->session->setFlash($type, $text);
		return $this;
	} 

	public function messageError($text = false)
	{
		if (!$text) $text = 'Произошла ошибка';
		Yii::$app->session->setFlash('error', $text);
		return $this;
	}

	public function back()
	{
		return $this->redirect(Yii::$app->request->referrer);
	}

	public function registerMetaTags($object) 
	{
		$this->view->title = $object->col_meta_title ? $object->col_meta_title : $object->col_title_ru;
		$this->view->registerMetaTag(['name' => 'description', 'content' => $object->col_meta_description]);
		$this->view->registerMetaTag(['name' => 'keywords', 'content' => $object->col_meta_keywords]);
	}

	protected function setParams()
	{
		Yii::$app->params['languages'] = language::find()->orderBy('col_id')->all();
	}
}
