<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\course\models\Course */

$this->title = 'Курс: ' . $model->col_title_ru;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->col_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->col_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить курс?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Цены', ['prices', 'id' => $model->col_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Курсы', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'col_id',
            
            ['attribute' => 'col_school_id', 'format' => 'html', 'value' => function($model) { 
                return Html::a($model->school->name, ['/admin/school/view', 'id' => $model->school->col_id]); 
            }],

            'col_prog_id',

            ['attribute' => 'program', 'filter' => false, 'value' => function($model) { return $model->program->col_name; }],

            'col_title_ru',

            'col_description_ru:html',

        ],
    ]) ?>

</div>
