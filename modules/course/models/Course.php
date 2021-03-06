<?php

namespace app\modules\course\models;

use Yii;
use app\modules\school\models\School;
use app\models\Program;

class Course extends \app\modules\course\models\CourseBase
{


   public function getSchool()
   {
        return $this->hasOne(School::className(), ['col_id' => 'col_school_id']);
   }

   public function getName()
   {
   		return $this->col_title_ru;
   }

   public function getWeeksWithPrices()
   {
   		$weeks = [];
		if ($this->col_price) {
			$cost = array_reverse(explode(',', $this->col_price));
			foreach ($cost as $item) {
				$arr = explode(':', $item);
				$weeks[$arr[0]] = $arr[1];
			}
		}
		return $weeks;
   }

   public function getPrices()
   {
      if (!$this->col_price) return;
      $arr = explode(',', $this->col_price);
      foreach ($arr as $item) {
         $price = explode(':', $item);
         $prices[$price[0]] = $price[1];
      }
      return $prices;
   }

   public function getProgram()
   {
      return $this->hasOne(Program::className(), ['col_id' => 'col_prog_id']);
   }



}
