<?php
/* @var $this yii\web\View */
/* @var $model app\modules\offer\models\Offer */


use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\offer\models\Offer;

$this->title = 'Описание акции';

$this->params['breadcrumbs'][] = ['label' => 'Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="offer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->col_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->col_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить акцию?',
                'method' => 'post',
            ],
        ]) ?>
         <?php if ($model->col_status == Offer::STATUS_ACTIVE): ?>
            <?= Html::a('Посмотреть на сайте', ['/offer/' . $model->col_alias], ['target' => '_blank', 'class' => 'btn btn-primary']) ?>
        <?php endif ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'col_id',
            'col_title_ru',
            'col_meta_title',
            'col_meta_description',
            'col_meta_keywords',
            'col_text_ru:html',
            'col_alias',
            'img:image',
            'col_date',
            ['attribute' => 'col_status', 'value' => function($model) { return $model->status; }],
        ],
    ]) ?>

</div>
