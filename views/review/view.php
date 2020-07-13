<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Review */

$this->title = 'Отзыв от: ' . $model->col_username;

\yii\web\YiiAsset::register($this);
?>
<div class="review-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->col_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->col_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'col_username',

            'col_comment:html',

            ['attribute' => 'col_date', 'value' => function($model) { return date('Y-m-d', strtotime($model->col_date)); }],

            ['attribute' => 'col_status', 'value' => function($model) { return $model->status; }],

            ['attribute' => 'col_home_page', 'value' => function($model) { return $model->home; }],
        ],
    ]) ?>

</div>
