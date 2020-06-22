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
    const PROGRAM_INTERNSHIPS = 5;

    public $programs = [];
	
	public function init()
	{ 
		parent::init();
		$this->programs['language'] = self::PROGRAM_LANGUAGE;
		$this->programs['camp'] = self::PROGRAM_CAMP;
		$this->programs['higher'] = self::PROGRAM_HIGHER_EDUCATION;
		$this->programs['secondary'] = self::PROGRAM_SECONDARY_EDUCATION;
		$this->programs['online-course'] = self::PROGRAM_ONLINE_COURSE;
		$this->programs['internships'] = self::PROGRAM_INTERNSHIPS;
	}

    public function get($key){ 
		if (isset($this->programs[$key])) return $this->programs[$key];
		throw new Exception("нет данных для компонента program c таким ключом");
	}

	public function getAll()
	{
		$array[self::PROGRAM_LANGUAGE] = 'Языковые курсы и школы за рубежом';
		$array[self::PROGRAM_CAMP] = 'Языковые лагеря за границей для детей и подростков';
		$array[self::PROGRAM_HIGHER_EDUCATION] = 'Высшее образование, MBA за рубежом';
		$array[self::PROGRAM_SECONDARY_EDUCATION] = 'Среднее образование, школы, колледжи за границей';
		$array[self::PROGRAM_ONLINE_COURSE] = 'Онлайн курсы языков';
		$array[self::PROGRAM_INTERNSHIPS] = 'Стажировки и программы обмена за границей';
		return $array;

	}

	public function getName($key)
	{
		switch (intval($key)) {
			case self::PROGRAM_LANGUAGE: return 'Языковые курсы и школы за рубежом';
			case self::PROGRAM_CAMP: return 'Языковые лагеря за границей для детей и подростков';
			case self::PROGRAM_HIGHER_EDUCATION: return 'Высшее образование, MBA за рубежом';
			case self::PROGRAM_SECONDARY_EDUCATION: return 'Среднее образование, школы, колледжи за границей';
			case self::PROGRAM_ONLINE_COURSE: return 'Онлайн курсы языков';
			case self::PROGRAM_INTERNSHIPS: return 'Стажировки и программы обмена за границей';
			default: return 'Не возможно определить программу';
		}
	}

	public function getAlias($key)
	{
		switch ($key) {
			case 'language': return 'yazykovyye_kursy_i_shkoly_za_rubezhom';
			case 'camp': return 'yazykovyye_lagerya_za_granitsey_dlya_detey_i_podrostkov';
			case 'higher': return 'vyssheye_obrazovaniye_mba_za_rubezhom';
			case 'secondary': return 'sredneye_obrazovaniye_shkoly_kolledzhi_za_granitsey';
			case 'online-course': return 'onlayn_kursy_yazykov';
			case 'internships': return 'stazhirovki_i_programmy_obmena_za_granitsey';
		}
	}

	public function getByAlias($alias)
	{
		$programs['yazykovyye_kursy_i_shkoly_za_rubezhom'] = self::PROGRAM_LANGUAGE;
		$programs['yazykovyye_lagerya_za_granitsey_dlya_detey_i_podrostkov'] = self::PROGRAM_CAMP;
		$programs['vyssheye_obrazovaniye_mba_za_rubezhom'] = self::PROGRAM_HIGHER_EDUCATION;
		$programs['sredneye_obrazovaniye_shkoly_kolledzhi_za_granitsey'] = self::PROGRAM_SECONDARY_EDUCATION;
		$programs['onlayn_kursy_yazykov'] = self::PROGRAM_ONLINE_COURSE;
		$programs['stazhirovki_i_programmy_obmena_za_granitsey'] = self::PROGRAM_INTERNSHIPS;
		if(isset($programs[$alias])) return $programs[$alias];
	}
	
}