<?php
namespace app\widgets;

use Yii;
use yii\base\Widget;

class Shared extends Widget
{

	public function run()
	{
		$icons = '<div class="uSocial-Share" data-pid="60be2d312cd0ed983674dbcc610e9631" data-type="share" data-options="rect,style1,default,absolute,horizontal,size24,eachCounter1,counter0" data-social="fb,ok,vk,pinterest,twi" data-mobile="sms"></div>';
		
		return $icons;
	}

}