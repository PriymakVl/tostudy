<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\school\models\SchoolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Каталог школ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новая школа', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Добавить PDF', ['pdf'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'col_id',
            [
            'attribute' => 'lang', 'label' => 'Язык', 'format' => 'raw',
            'value' => function($model) {return $model->city->country->language->name;},
            ],

            [
            'attribute' => 'country', 'label' => 'Страна', 'format' => 'raw',
            'value' => function($model) {return $model->city->country->name;},
            ],

            'col_title',

            [
            'attribute' => 'col_img_mini', 'label' => 'Изображение', 'format' => 'raw', 'filter' => false,
            'value' => function($model) {return Html::img('@web/img/schools/'. $model->col_img_mini, ['style' => 'max-width:100px;']);},
            ],


            ['attribute' => 'col_home_page', 'filter' => false, 'value' => function($model) {return $model->col_home_page ? 'есть' : 'нет';}],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
