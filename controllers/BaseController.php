<?php

namespace app\controllers;

use Yii;
use app\modules\language\models\Language;
use app\models\Program;

class BaseController extends \yii\web\Controller
{

	public function init()
	{
		parent::init();
        Yii::$app->session->open();
        $this->setParams();
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

	public function registerMetaTags($object, $title = null, $description = null, $keywords = null) 
	{
		$this->view->title = $this->setMetaTitle($object, $title);
		$this->view->registerMetaTag(['name' => 'description', 'content' => $description ? $description : $object->col_meta_description]);
		$this->view->registerMetaTag(['name' => 'keywords', 'content' => $keywords ? $keywords : $object->col_meta_keywords]);
	}

	private function setMetaTitle($object, $title) 
	{
		if ($title) return $title; 
		if (isset($object->col_title_ru)) return $object->col_title_ru;
		if (isset($object->col_meta_title)) return $object->col_meta_title;
		return '';
	}

	protected function setParams()
	{
		Yii::$app->params['languages'] = language::find()->orderBy('col_id')->all();

		Yii::$app->params['programs'] = Program::find()->where(['col_status' => Program::STATUS_ACTIVE])->orderBy(['col_rating' => SORT_DESC])->all();
	}
}
