<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\assets\AdminAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\city\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Города';
$this->params['breadcrumbs'][] = $this->title;

AdminAsset::register($this);
?>
<div class="city-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новый город', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'col_id',

            [ 'attribute' => 'language', 'value' => function($model) {return $model->country->language->name;},
            'headerOptions' => ['class' => 'text-info'], ],

            [ 'attribute' => 'col_country_id', 'value' => function($model) {return $model->country->name;},
            'label' => 'Страна', 'headerOptions' => ['class' => 'text-info'], ],

            'col_title_ru',

            'image:image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
