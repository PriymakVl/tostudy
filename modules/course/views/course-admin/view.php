<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\course\models\Course */

$this->title = $model->col_id;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->col_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->col_id], [
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
            'col_id',
            'col_school_id',
            'col_title_en',
            'col_title_es',
            'col_title_ua',
            'col_title_ru',
            'col_title_cn',
            'col_description_en:ntext',
            'col_description_es:ntext',
            'col_description_ua:ntext',
            'col_description_ru:ntext',
            'col_description_cn:ntext',
            'col_price:ntext',
        ],
    ]) ?>

</div>
