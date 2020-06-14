<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */

$this->title = 'заявка: ID ' . $model->col_id;

app\assets\AdminAsset::register($this);
?>
<div class="feedback-view">

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
            'col_comment:ntext',
            'col_date',
            ['attribute' => 'col_status', 'value' => function($model) { return $model->status; }],
        ],
    ]) ?>

</div>
