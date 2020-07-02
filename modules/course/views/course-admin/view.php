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
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'col_id',
            
            ['attribute' => 'school', 'format' => 'html', 'filter' => false, 'value' => function($model) { 
                return Html::a($model->school->name, ['/admin/school/view', 'id' => $model->school->col_id]); 
            }],

            'col_title_ru',

            'col_title_en',

            'col_description_en:html',

            'col_price:ntext',
        ],
    ]) ?>

</div>
