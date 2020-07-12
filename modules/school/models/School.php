<?php

namespace app\modules\school\models;

use Yii;
use app\modules\city\models\City;
use app\modules\course\models\Course;
use app\models\{Accommodation, Program};

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

    public function getCourses($prog_id)
    {
        return Course::findAll(['col_school_id' => $this->col_id, 'col_prog_id' => $prog_id]);
    }

    public function getPrograms()
    {
        $prog_ids = $this->getIdsPrograms();
        return Program::findAll($prog_ids);
    }

    public function getIdsPrograms()
    {
        return Course::find()->select(['col_prog_id'])->where(['col_school_id' => $this->col_id])->asArray()->groupBy('col_prog_id')->column();
    }

    public function getLowestPriceCourses($prog_id = false)
    {
        if (!$prog_id) $prog_id = 1;
        $courses = $this->getCourses($prog_id);
        if (!$courses) return 0;
        $prices = [];
        foreach ($courses as $course) {
            if (!$course->col_price) continue;
            $prices_course = explode(',', $course->col_price);
            $lowest_price = explode(':', $prices_course[0])[1];
            if ((int)$lowest_price !== 0) $prices[] = $lowest_price;
        }
        return $prices ? min($prices) : 0;
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

    public function getAlias()
    {
        return $this->col_alias;
    }

    public function getAccommodation()
    {
        return $this->hasMany(Accommodation::className(), ['col_school_id' => 'col_id']);
    }

}
