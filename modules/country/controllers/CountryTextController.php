<?php

namespace app\modules\country\controllers;

use Yii;
use app\modules\country\models\{Country, CountryText};

class CountryTextController extends \app\controllers\BaseController
{
    public $layout = '@app/views/layouts/admin';

    public function actionIndex($country_id)
    {
        $country = Country::findOne($country_id);
        return $this->render('index', ['country' => $country]);
    }

    public function actionView($country_id, $prog)
    {
        $model = CountryText::findOne(['col_country_id' => $country_id, 'col_prog' => $prog]);
        if (!$model) $model = $this->add($country_id, $prog);
        return $this->render('view', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = CountryText::findOne($id);
        if (Yii::$app->request->isGet) return $this->render('update', ['model' => $model,]);

        $model->load(Yii::$app->request->post());
        if ($model->save()) $this->setMessage('Тексты успешно отредактированы');
        else $htis->messageError();
        
        return $this->redirect(['view', 'prog' => $model->col_prog, 'country_id' => $model->col_country_id]);
    }

    public function add($country_id, $prog)
    {
        $item = new CountryText();
        $item->col_country_id = $country_id;
        $item->col_prog = $prog;
        $item->save(false);
        return $item;
    }



}
