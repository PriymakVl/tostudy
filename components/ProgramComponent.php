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
		$array[self::PROGRAM_LANGUAGE] = 'Language courses and schools abroad';
		$array[self::PROGRAM_CAMP] = 'Language camps abroad for children and adolescents';
		$array[self::PROGRAM_HIGHER_EDUCATION] = 'Higher education, MBA abroad';
		$array[self::PROGRAM_SECONDARY_EDUCATION] = 'Secondary education, schools, colleges abroad';
		$array[self::PROGRAM_ONLINE_COURSE] = 'Online language courses';
		$array[self::PROGRAM_INTERNSHIPS] = 'Internships and exchange programs abroad';
		return $array;

	}

	public function getName($key)
	{
		switch (intval($key)) {
			case self::PROGRAM_LANGUAGE: return 'Language courses and schools abroad';
			case self::PROGRAM_CAMP: return 'Language camps abroad for children and adolescents';
			case self::PROGRAM_HIGHER_EDUCATION: return 'Higher education, MBA abroad';
			case self::PROGRAM_SECONDARY_EDUCATION: return 'Secondary education, schools, colleges abroad';
			case self::PROGRAM_ONLINE_COURSE: return 'Online language courses';
			case self::PROGRAM_INTERNSHIPS: return 'Internships and exchange programs abroad';
			default: return 'Не возможно определить программу';
		}
	}

	public function getAlias($key)
	{
		switch (intval($key)) {
			case self::PROGRAM_LANGUAGE: return 'yazykovyye_kursy_i_shkoly_za_rubezhom';
			case self::PROGRAM_CAMP: return 'yazykovyye_lagerya_za_granitsey_dlya_detey_i_podrostkov';
			case self::PROGRAM_HIGHER_EDUCATION: return 'vyssheye_obrazovaniye_mba_za_rubezhom';
			case self::PROGRAM_SECONDARY_EDUCATION: return 'sredneye_obrazovaniye_shkoly_kolledzhi_za_granitsey';
			case self::PROGRAM_ONLINE_COURSE: return 'onlayn_kursy_yazykov';
			case self::PROGRAM_INTERNSHIPS: return 'stazhirovki_i_programmy_obmena_za_granitsey';
		}
		throw new Exception("нет пвсевдонима для компонента program c таким ключом");
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