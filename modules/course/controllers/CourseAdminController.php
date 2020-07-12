<?php

namespace app\modules\course\controllers;

use Yii;
use app\modules\course\models\Course;
use app\modules\course\models\CourseSearch;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * CourseAdminController implements the CRUD actions for Course model.
 */
class CourseAdminController extends BaseController
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
     * Lists all Course models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Course model.
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
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($country_id = false, $city_id = false, $school_id = false)
    {
        $model = new Course();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->setMessage('Курс добавлен');
            return $this->redirect(['view', 'id' => $model->col_id]);
        }

        return $this->render('create', compact('model', 'country_id', 'city_id', 'school_id'));
    }

    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $country_id = false, $city_id = false, $school_id = false)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->setMessage('Курс отредактирован');
            return $this->redirect(['view', 'id' => $model->col_id]);
        }

        return $this->render('update', compact('model', 'country_id', 'city_id', 'school_id'));
    }

    /**
     * Deletes an existing Course model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        
    }

    public function actionPrices($id, $prices = false)
    {
        $model = $this->findModel($id);
        if (!$prices) return $this->render('prices', ['model' => $model]);
        $model->col_price = $prices;
        if ($model->save(false)) $this->setMessage('Цены успешно отредактированы');
        else $this->errorMessage('При редактировании цен произошла ошибка');
        return $this->redirect(['view', 'id' => $id]);
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
