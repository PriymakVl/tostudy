<?php

namespace app\modules\city\controllers;

use Yii;
use app\modules\city\models\City;
use app\modules\city\models\CitySearch;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CityAdminController implements the CRUD actions for City model.
 */
class CityAdminController extends BaseController
{

    public $layout = '@app/views/layouts/admin';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all City models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single City model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new City model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new City();
        if (Yii::$app->request->isGet)  return $this->render('create', ['model' => $model,]);

        $model->load(Yii::$app->request->post());
        $model->file_image  = UploadedFile::getInstance($model, 'file_image');
        
        if ($model->save()) $this->setMessage('Город успешно добавлен');
        else throw new NotFoundHttpException('Ошибка при добавлении города');
        
        return $this->redirect(['view', 'id' => $model->col_id]);
    }

    /**
     * Updates an existing City model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isGet)  return $this->render('update', ['model' => $model,]);

        $model->load(Yii::$app->request->post());
        $model->file_image  = UploadedFile::getInstance($model, 'file_image');

        if ($model->save()) $this->setMessage('Город успешно отредактирован');
        else $this->messageError();
        
        return $this->redirect(['view', 'id' => $model->col_id]);
    }

    /**
     * Deletes an existing City model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the City model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return City the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = City::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
