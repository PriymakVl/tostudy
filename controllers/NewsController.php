<?php

namespace app\controllers;

use app\models\Article;

class NewsController extends \app\controllers\BaseController
{
    public function actionIndex()
    {
        $articles = Article::find()->where(['col_status' => 3])->orderBy(['col_id' => SORT_DESC])->all();
        return $this->render('index', ['articles' => $articles]);
    }


    public function actionView($alias)
    {
    	$article = Article::findOne(['col_alias' => $alias]);
        return $this->render('view', ['article' => $article]);
    }

}
