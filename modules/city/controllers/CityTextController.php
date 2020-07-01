<?php

namespace app\modules\city\controllers;

use Yii;
use app\modules\city\models\{City, CityText};

class CityTextController extends \app\controllers\BaseController
{
    public $layout = '@app/views/layouts/admin';

    public function actionIndex($city_id)
    {
        $city = City::findOne($city_id);
        return $this->render('index', ['city' => $city]);
    }

    public function actionView($city_id, $prog)
    {
        $model = CityText::findOne(['col_city_id' => $city_id, 'col_prog' => $prog]);
        if (!$model) $model = $this->add($city_id, $prog);
        return $this->render('view', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = CityText::findOne($id);
        if (Yii::$app->request->isGet) return $this->render('update', ['model' => $model,]);

        $model->load(Yii::$app->request->post());
        if ($model->save()) $this->setMessage('Тексты успешно отредактированы');
        else $htis->messageError();
        
        return $this->redirect(['view', 'prog' => $model->col_prog, 'city_id' => $model->col_city_id]);
    }

    public function add($city_id, $prog)
    {
        $item = new CityText();
        $item->col_city_id = $city_id;
        $item->col_prog = $prog;
        $item->save(false);
        return $item;
    }



}
