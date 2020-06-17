<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\offer\models\OfferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Акции';

$this->params['breadcrumbs'][] = $this->title;

app\assets\AdminAsset::register($this);

?>
<div class="offer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новая акция', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'col_id',

            'col_title_ru',

            'img:image',

            'col_date',

            ['attribute' => 'col_status', 'value' => function($model) { return $model->status; }],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
