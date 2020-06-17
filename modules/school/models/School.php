<?php

namespace app\modules\school\models;

use Yii;
use app\modules\city\models\City;
use app\modules\course\models\Course;

class School extends \app\modules\school\models\SchoolBase
{

    public static function suffixWords($n, $key, $output_n = true) 
    {
    	$words = [
			'en' => ['school', 'schools', 'schools'],
			'es' => ['escuela', 'escuelas', 'escuelas'],
			'ua' => ['школа', 'школи', 'шкіл'],
			'ru' => ['школа', 'школы', 'школ']
		];
		$cases = [2, 0, 1, 1, 1, 2];
		return (($output_n) ? $n .' ' : '') .$words[$key][($n % 100 > 4 && $n % 100 < 20) ? 2 : $cases[min($n % 10, 5)]];
    }

    public function getCity()
    {
    	return $this->hasOne(City::className(), ['col_id' => 'col_city_id']);
    }

    public function getCourses()
    {
    	return $this->hasMany(Course::className(), ['col_school_id' => 'col_id']);
    }

    public function getName()
    {
    	return $this->col_title;
    }

    public function getCurrency()
    {
    	return Yii::$app->params['currencies'][$this->col_currency];
    }

    public function getProgram()
    {
        return Yii::$app->program->getName($this->col_subcategory);
    }

    public function getImg()
    {
        return Yii::getAlias('@web') . '/img/schools/' . $this->col_img_mini;
    }
}
