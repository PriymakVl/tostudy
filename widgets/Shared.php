<?php
namespace app\widgets;

use Yii;
use yii\base\Widget;

class Shared extends Widget
{

	public function run()
	{
		$icons = '<div class="uSocial-Share" data-pid="befe754ecf170b3d3399e1d6f5811c9b" data-type="share" data-options="rect,style1,default,absolute,horizontal,size24,eachCounter1,counter0" data-social="fb,ok,vk,pinterest,twi,telegram" data-mobile="sms"></div>';
		
		return $icons;
	}

}
