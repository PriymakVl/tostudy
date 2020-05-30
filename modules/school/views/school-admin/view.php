<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\school\models\School */

$this->title = $model->col_id;
$this->params['breadcrumbs'][] = ['label' => 'Schools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="school-view">

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
            'col_city_id',
            'col_meta_title',
            'col_meta_description',
            'col_meta_keywords',
            'col_title',
            'col_url:url',
            'col_img_mini',
            'col_img',
            'col_description_en:ntext',
            'col_description_es:ntext',
            'col_description_ua:ntext',
            'col_description_ru:ntext',
            'col_description_cn:ntext',
            'col_about_us_en:ntext',
            'col_about_us_es:ntext',
            'col_about_us_ua:ntext',
            'col_about_us_ru:ntext',
            'col_about_us_cn:ntext',
            'col_residence_en:ntext',
            'col_residence_es:ntext',
            'col_residence_ua:ntext',
            'col_residence_ru:ntext',
            'col_residence_cn:ntext',
            'col_registration_fee',
            'col_home_page',
            'col_currency',
            'col_subcategory',
        ],
    ]) ?>

</div>
