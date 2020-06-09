<?php

namespace app\components;

use yii\base\Component;
use yii\base\Exception;

class ProgramComponent extends Component
{

	const PROGRAM_LANGUAGE = 0;
    const PROGRAM_CAMP = 1;
    const PROGRAM_HIGHER_EDUCATION = 2;
    const PROGRAM_SECONDARY_EDUCATION = 3;
    const PROGRAM_ONLINE_COURSE = 4;
    const PROGRAM_PRIVATE_ONLINE_LESSONS = 5;

    public $programs = [];
	
	public function init()
	{ 
		parent::init();
		$this->programs['language'] = self::PROGRAM_LANGUAGE;
		$this->programs['camp'] = self::PROGRAM_CAMP;
		$this->programs['higher'] = self::PROGRAM_HIGHER_EDUCATION;
		$this->programs['secondary'] = self::PROGRAM_SECONDARY_EDUCATION;
		$this->programs['online-course'] = self::PROGRAM_ONLINE_COURSE;
		$this->programs['private-lessons'] = self::PROGRAM_PRIVATE_ONLINE_LESSONS;
	}

    public function get($key){ 
		if (isset($this->programs[$key])) return $this->programs[$key];
		throw new Exception("нет данных для компонента program c таким ключом");
	}

	public function getAll()
	{
		$array[self::PROGRAM_LANGUAGE] = 'Языковые курсы';
		$array[self::PROGRAM_CAMP] = 'Каникулярные программы и детские языковые лагеря';
		$array[self::PROGRAM_HIGHER_EDUCATION] = 'Высшее и последипломное образование';
		$array[self::PROGRAM_SECONDARY_EDUCATION] = 'Среднее образование';
		$array[self::PROGRAM_ONLINE_COURSE] = 'Языковые онлайн курсы';
		$array[self::PROGRAM_PRIVATE_ONLINE_LESSONS] = 'Частные уроки онлайн';
		return $array;

	}

	public function getName($key)
	{
		switch (intval($key)) {
			case self::PROGRAM_LANGUAGE: return 'Языковые курсы';
			case self::PROGRAM_CAMP: return 'Каникулярные программы и детские языковые лагеря';
			case self::PROGRAM_HIGHER_EDUCATION: return 'Высшее и последипломное образование';
			case self::PROGRAM_SECONDARY_EDUCATION: return 'Среднее образование';
			case self::PROGRAM_ONLINE_COURSE: return 'Языковые онлайн курсы';
			case self::PROGRAM_PRIVATE_ONLINE_LESSONS: return 'Частные уроки онлайн';
			default: return 'Не возможно определить программу';
		}
	}
	
}