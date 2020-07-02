<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\school\models\School;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\course\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Курсы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новый курс', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'col_id',

            'col_school_id',

            ['attribute' => 'school', 'filter' => false, 'value' => function($model) { return $model->school->name; }],

            'col_title_ru',

            'col_title_en',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
