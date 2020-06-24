<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
USE app\modules\info\models\Info;

/* @var $this yii\web\View */
/* @var $model app\modules\info\models\Info */

$this->title = $model->col_title_ru;

$this->params['breadcrumbs'][] = ['label' => 'Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="info-view">

    <h3><b>Статья:</b> <?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->col_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->col_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить статью?',
                'method' => 'post',
            ],
        ]) ?>

        <?php if ($model->col_status == Info::STATUS_PUBLISHED): ?>
            <?= Html::a('Посмотреть на сайте', ['/info/article/' . $model->col_alias], ['class' => 'btn btn-primary']) ?>
        <?php endif ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'col_id',


            ['attribute' => 'col_country_id', 'value' => function($model) { return $model->country->name; }],

            'col_title_ru',

            ['attribute' => 'col_status', 'value' => function($model) { return $model->status; }],

            'col_meta_title',

            'col_meta_description',

            'col_meta_keywords',
            
            'col_text_ru:html',

            
        ],
    ]) ?>

</div>
