<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\info\models\InfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи на странице "Полезная информация"';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новая статья', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'col_id',

            'col_country_id',

            ['attribute' => 'country', 'filter' => false, 'value' => function($model) { return $model->country->name; }],

            'col_title_ru',

            ['attribute' => 'col_status', 'filter' => false, 'value' => function($model) { return $model->status; }],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
