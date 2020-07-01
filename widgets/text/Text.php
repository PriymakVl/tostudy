<?php 

namespace app\widgets\text;

use Yii;

class Text extends \yii\bootstrap\Widget
{

	public $position;
	public $texts;

	public function run()
    {
    	$text_str = '';
    	$program = Yii::$app->session->get('program');
    	if ($this->texts) {
    		foreach ($this->texts as $item) {
    			if ($program == $item->col_prog) $text = $item;
    		}
    		if ($this->position == 'top') $text_str = $text->col_text_top;
    		else  $text_str = $text->col_text_bottom;
    	}
        
    	return $this->render('text', ['text' => $text_str]);
    }
}