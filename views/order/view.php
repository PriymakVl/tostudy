<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'ID заявки: ' . $model->col_id;

app\assets\AdminAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->col_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'col_id',
            'col_username',
            'col_email:email',
            'col_tel',
            'col_comment:ntext',
            ['attribute' => 'col_school_id', 'value' => function($model) { return $model->school->name; }],
            ['attribute' => 'col_course_id', 'value' => function($model) { return $model->course->name; }],
            'col_weeks',
            'col_accommodation',
            'col_date',
            ['attribute' => 'col_status', 'value' => function($model) { return $model->status; }],
        ],
    ]) ?>

</div>
