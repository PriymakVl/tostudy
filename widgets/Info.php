<?php
namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\modules\language\models\Language;
use app\models\Program;

class Info extends Widget
{
	public $language = true;

	public function run()
	{
		$lang_id = Yii::$app->session->get('lang_id');
		$lang = language::findOne($lang_id);
		$prog_id = Yii::$app->session->get('prog_id');
		$program = Program::findOne($prog_id);

		$info = '';
		if ($lang) $info = sprintf('<h3 class="active-lang">Язык: <span>"%s"</span></h3>', $lang->name);
		if ($program) $info .= sprintf('<h3 class="active-program">Программа: <span>"%s"</span></h3>', $program->col_name);
		
		return $info;
	}

}