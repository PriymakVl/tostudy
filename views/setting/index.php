<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Настройки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'col_id',
            'col_meta_title',
            'col_meta_description',
            'col_meta_keywords',
            'col_tel',
            'col_email:email',
            'col_facebook',
            'col_instagram',
            'col_vk',
            'col_ok',
            'col_telegram',
            'col_address_ru:ntext',
            'col_schedule_ru',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
