<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Забронировали курс';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'col_id',
            'col_username',
            'col_email:email',
            'col_tel',
            'col_comment:ntext',
            'col_date',

            ['attribute' => 'col_status', 'value' => function($model) { return $model->status; }],

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]); ?>


</div>
