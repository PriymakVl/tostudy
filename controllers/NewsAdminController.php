<?php

namespace app\controllers;

use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NewsAdminController implements the CRUD actions for Article model.
 */
class NewsAdminController extends BaseController
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
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
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
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();
        if (Yii::$app->request->isGet)  return $this->render('create', ['model' => $model,]);

        $model->load(Yii::$app->request->post());
        $model->file_img  = UploadedFile::getInstance($model, 'file_img');
        $model->file_img_big  = UploadedFile::getInstance($model, 'file_img_big');

        if ($model->save()) return $this->setMessage('Статья успешно добавлена')->redirect(['view', 'id' => $model->col_id]);
        else throw new NotFoundHttpException('Ошибки при добавлении статьи.');
    }

    /**
     * Updates an existing Article model.
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
        $model->file_img  = UploadedFile::getInstance($model, 'file_img');
        $model->file_img_big  = UploadedFile::getInstance($model, 'file_img_big');

        if ($model->save()) return $this->setMessage('Статья успешно отредактирована')->redirect(['view', 'id' => $model->col_id]);
        else throw new NotFoundHttpException('Ошибки при редактировании статьи.');

    }

    /**
     * Deletes an existing Article model.
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
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
