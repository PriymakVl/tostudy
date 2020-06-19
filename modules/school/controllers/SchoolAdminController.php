<?php

namespace app\modules\school\controllers;

use Yii;
use app\modules\school\models\{School, SchoolSearch};
use app\models\ImageUpload;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SchoolController implements the CRUD actions for School model.
 */
class SchoolAdminController extends \app\controllers\BaseController
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
     * Lists all School models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SchoolSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single School model.
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
     * Creates a new School model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new School();
        if (Yii::$app->request->isGet)  return $this->render('create', ['model' => $model,]);

        $model->load(Yii::$app->request->post());
        $model->file_img  = UploadedFile::getInstance($model, 'file_img');
        $model->file_img_mini  = UploadedFile::getInstance($model, 'file_img_mini');
        if ($model->save()) {
            return $this->setMessage('Школа добавлена')->redirect(['view', 'id' => $model->col_id]);
        }
        else throw new NotFoundHttpException('Ошибка при добавлении школы.'); 
    }

    /**
     * Updates an existing School model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';

        if (Yii::$app->request->isGet)  return $this->render('update', ['model' => $model,]);

        $model->load(Yii::$app->request->post());
        $model->file_img  = UploadedFile::getInstance($model, 'file_img');
        $model->file_img_mini  = UploadedFile::getInstance($model, 'file_img_mini');
        if ($model->save()) {
            return $this->setMessage('Школа отредактирована')->redirect(['view', 'id' => $model->col_id]);
        }
        else throw new NotFoundHttpException('Ошибка при редактировании школы.'); 
    }

    /**
     * Deletes an existing School model.
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
     * Finds the School model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return School the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = School::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
