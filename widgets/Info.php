<?php
namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\modules\language\models\Language;

class Info extends Widget
{
	public $language = true;

	public function run()
	{
		$lang_id = Yii::$app->session->get('lang_id');
		$lang = language::findOne($lang_id);
		$program_key = Yii::$app->session->get('program');
		$program = Yii::$app->program->getName($program_key);

		if ($this->language) $info = sprintf('<h3 class="active-lang">Language: <span>"%s"</span></h3>', $lang->name);
		$info .= sprintf('<h3 class="active-program">Program: <span>"%s"</span></h3>', $program);
		
		return $info;
	}

}