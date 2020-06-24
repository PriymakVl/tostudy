<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = 'Статья: ' . $model->col_title_ru;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

app\assets\AdminAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->col_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->col_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить эту статью?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Посмотреть на сайте', ['article/' . $model->col_alias], ['target' => '_blank','class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'col_id',

            'col_title_ru',

            ['attribute' => 'col_status', 'value' => function($model) { return $model->status; }],

            'col_meta_title',

            'col_meta_description',

            'col_meta_keywords',

            'col_text_ru:raw',

            'image:image',

            'imageBig:image',
            
        ],
    ]) ?>

</div>
