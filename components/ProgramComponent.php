<?php

namespace app\components;

use yii\base\Component;
use yii\base\Exception;

class ProgramComponent extends Component
{

	const PROGRAM_LANGUAGE = 0;
    const PROGRAM_CAMP = 1;
    const PROGRAM_HIGHER_EDUCATION = 2;

    public $programs = [];
	
	public function init()
	{ 
		parent::init();
		$this->programs['language'] = self::PROGRAM_LANGUAGE;
		$this->programs['camp'] = self::PROGRAM_CAMP;
		$this->programs['higher'] = self::PROGRAM_HIGHER_EDUCATION;
	}

    public function get($key){ 
		if (isset($this->programs[$key])) return $this->programs[$key];
		throw new Exception("нет данных для компонента program c таким ключом");
	}

	public function getAll()
	{
		echo '<pre>';
		var_dump($this->programs);
		echo '</pre>';
		exit();
	}

	public function getName($key)
	{
		switch (intval($key)) {
			case self::PROGRAM_LANGUAGE: return 'Языковые курсы';
			case self::PROGRAM_CAMP: return 'Летние программы и лагеря для детей';
			case self::PROGRAM_HIGHER_EDUCATION: return 'Высшее и последипломное образование';
			default: return 'Не возможно определить программу';
		}
	}
	
}