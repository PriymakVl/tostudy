<?php

namespace app\modules\language\controllers;

use Yii;
use app\modules\language\models\Language;
use app\modules\language\models\LanguageSearch;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * LanguageAdminController implements the CRUD actions for Language model.
 */
class LanguageAdminController extends BaseController
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
     * Lists all Language models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LanguageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Language model.
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
     * Creates a new Language model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Language();
        if (Yii::$app->request->isGet)  return $this->render('create', ['model' => $model,]);

        $model->load(Yii::$app->request->post());
        $model->file_image  = UploadedFile::getInstance($model, 'file_image');

        if ($model->save()) return $this->setMessage('Язык успешно добавлен')->redirect(['view', 'id' => $model->col_id]);
        else $this->setMessage('Ошибка при добавлении', 'error')->redirect(['view', 'id' => $model->col_id]);
    }

    /**
     * Updates an existing Language model.
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

        if ($model->save()) return $this->setMessage('Язык отредактирован')->redirect(['view', 'id' => $model->col_id]);
        else $this->setMessage('Ошибка при редактировании', 'error')->redirect(['view', 'id' => $model->col_id]);
    }

    /**
     * Deletes an existing Language model.
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
     * Finds the Language model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Language the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Language::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
