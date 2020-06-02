<?php

namespace app\components;

use yii\base\Component;
use yii\base\Exception;
use app\models\Setting;

class SettingComponent extends Component
{

	public $settings;
	
	public function init()
	{ 
		parent::init();
		$this->settings = Setting::find()->asArray()->one();
	}

    public function get($key){ 
		if (isset($this->settings[$key])) return $this->settings[$key];
		throw new Exception("нет данных для компонента setting c таким ключом");
	}

	public function getAll()
	{
		echo '<pre>';
		var_dump($this->settings);
		echo '</pre>';
		exit();
	}
	
}