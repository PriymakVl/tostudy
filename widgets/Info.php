<?php
namespace app\widgets;

use Yii;
use yii\base\Widget;

class Info extends Widget
{
	public $language = true;

	public function run()
	{
		$lang = Yii::$app->session->get('language');
		$program_key = Yii::$app->session->get('program');
		$program = Yii::$app->program->getName($program_key);

		if ($this->language) $info = sprintf('<h3 class="active-lang">Язык: <span>"%s"</span></h3>', $lang);
		$info .= sprintf('<h3 class="active-program">Программа: <span>"%s"</span></h3>', $program);
		
		return $info;
	}

}