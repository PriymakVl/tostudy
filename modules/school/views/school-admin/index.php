<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\school\models\SchoolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Каталог школ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новая школа', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'col_id',
            // 'col_city_id',
            // 'col_meta_title',
            // 'col_meta_description',
            // 'col_meta_keywords',
            'col_title',
            //'col_url:url',
            [
            'attribute' => 'col_img_mini', 'label' => 'Изображение', 'format' => 'raw',
            'value' => function($model) {return Html::img('@web/img/'. $model->col_img_mini, ['alt' => '', 'style' => 'max-width:100px;']);},
            ],
            //'col_img',
            //'col_description_en:ntext',
            //'col_description_es:ntext',
            //'col_description_ua:ntext',
            // 'col_description_ru:ntext',
            //'col_description_cn:ntext',
            //'col_about_us_en:ntext',
            //'col_about_us_es:ntext',
            //'col_about_us_ua:ntext',
            // 'col_about_us_ru:ntext',
            //'col_about_us_cn:ntext',
            //'col_residence_en:ntext',
            //'col_residence_es:ntext',
            //'col_residence_ua:ntext',
            //'col_residence_ru:ntext',
            //'col_residence_cn:ntext',
            //'col_registration_fee',
            ['attribute' => 'col_home_page', 'value' => function($model) {return $model->col_home_page ? 'есть' : 'нет';}],
            //'col_currency',
            //'col_subcategory',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
