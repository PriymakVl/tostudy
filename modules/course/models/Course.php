<?php

namespace app\modules\course\models;

use Yii;

class Course extends \app\modules\cours\models\CoursBase
{


   public function getSchools()
   {
        return $this->hasOne(School::className(), ['col_id' => 'this']);
   }

   public function getLowestPrice()
   {
   		$price = explode(':', $this->col_price);
   		return end($price);
   }

   public function getName()
   {
   		return $this->col_title_ru;
   }

   public function getWeeksPrices()
   {
   		$weeks = [];
		if ($this->col_price) {
			$cost = array_reverse(explode(',', $this->col_price));
			foreach ($cost as $item) {
				$price = explode(':', $item);
				$weeks[$price[0]] = $price[1];
			}
		}
		return $weeks;
   }

   public function templateWeeksOption()
   {
   		$template = '';
   		$weeks = $this->getWeeksPrices();
   		if ($weeks) {
   			foreach ($weeks as $week => $price) {
   				$template .= '<li class="js-weeks-option filtered" data-course="'. $this->col_id .'" data-weeks="'. $week .'" data-price="'. $price .'">'. $week .'</li>';
   			}
   		}
   		return $template;
   }
}
