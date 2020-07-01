<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = 'Город: ' . $model->city->name;


app\assets\AdminAsset::register($this);
?>
<div>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->col_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Тексты', ['index', 'city_id' => $model->col_city_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [ 'attribute' => 'col_prog', 'value' => function($model) {return $model->program;}, ],

            'col_text_top:html',

            'col_text_bottom:html',
        ],
    ]) ?>

</div>
