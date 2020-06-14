<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\school\models\School;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccommodationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Жилье';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accommodation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новое жилье', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'col_id',

            ['attribute' => 'col_school_id', 'value' => function($model) { return $model->school->name; }, 'filter' => false],

            'col_title_ru',

            'col_price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
