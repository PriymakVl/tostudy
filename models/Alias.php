<?php

namespace app\models;

use Yii;
use app\helpers\Inflector;
use app\models\Article;
use app\modules\school\models\School;

 
class Alias
{

	public static function add()
	{
		// self::articles();
		self::schools();
	}

	public static function articles()
	{
	    $articles = Article::find()->all();
	    if (!$articles) return;
	    foreach ($articles as $article) {
	        $article->col_alias = Inflector::slug($article->col_title_ru, '_');
	        $article->save(false);
	    }
	}

	public static function schools()
	{
	    $schools = School::find()->all();
        if (!$schools) return;
        foreach ($schools as $school) {
            $school->col_alias = Inflector::slug($school->col_title, '_');
            $school->save(false);
        }
	}


}