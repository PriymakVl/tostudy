<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */

$this->title = "Настройки";
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="setting-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->col_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
