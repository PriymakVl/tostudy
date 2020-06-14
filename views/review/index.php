<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы постоянных клиентов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новый отзыв', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'col_username',
    
            'col_comment:html',
   
            'col_date',

            ['attribute' => 'col_status', 'value' => function($model) { return $model->status; }],

            ['attribute' => 'col_home_page', 'value' => function($model) { return $model->home; }],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
