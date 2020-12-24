<?php
namespace app\widgets;

use Yii;
use yii\base\Widget;

class Shared extends Widget
{

	public function run()
	{
		$pluso = '<div class="pluso" data-background="none;" data-options="medium,square,line,horizontal,counter,sepcounter=1,theme=14" data-services="vkontakte,odnoklassniki,facebook,twitter,pinterest,moimir"></div>';
		
		return $pluso;
	}

}
