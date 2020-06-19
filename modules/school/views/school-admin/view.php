<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\school\models\School */

$this->title = $model->col_title;
$this->params['breadcrumbs'][] = ['label' => 'Schools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="school-view">

    <h3><?= 'Школа: ', '<b>', $model->col_title, '</b>' ?></h3>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->col_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->col_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить эту школу?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Смотреть на сайте', ['/school/' . $model->alias], ['class' => 'btn btn-primary', 'target' => '_blank']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'col_id',

            [
            'attribute' => 'col_city_id',
            'value' => function($model) {return $model->city->name;},
            ],

            'col_meta_title',
            'col_meta_description',
            'col_meta_keywords',
            'col_title',

            'img:image',

            'col_description_ru:ntext',

            [
            'attribute' => 'col_about_us_ru', 'format' => 'raw',
            'value' => function($model) {return $model->col_about_us_ru;},
            ],

            [
            'attribute' => 'col_residence_ru', 'format' => 'raw',
            'value' => function($model) {return $model->col_residence_ru;},
            ],

            'col_registration_fee',

            [
            'attribute' => 'col_home_page', 
            'value' => function($model) {return $model->col_home_page ? 'есть' : 'нет';},
            ],

            [
            'attribute' => 'col_currency', 
            'value' => function($model) {return Yii::$app->params['currencies'][$model->col_currency];},
            ],

            [ 'attribute' => 'col_subcategory', 'value' => function($model) {return $model->program;} ],
        ],
    ]) ?>

</div>
