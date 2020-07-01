<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\modules\city\models\City */

$this->title = 'Город: ' . $model->col_title_ru;

$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

app\assets\AdminAsset::register($this);
?>
<div class="city-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->col_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->col_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить этот город?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Тексты', ['/city/city-text/index', 'city_id' => $model->col_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'col_id',

            [ 'attribute' => 'col_country_id', 'value' => function($model) {return $model->country->name;},
            'label' => 'Страна', 'headerOptions' => ['class' => 'text-info'], ],

            'col_title_ru',

            'col_meta_title',

            'col_meta_description',
            
            'col_meta_keywords',

            'col_alias',

            'image:image',
        ],
    ]) ?>

</div>
