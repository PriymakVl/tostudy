<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Accommodation */

$this->title = 'Редактирование жилья: ' . $model->col_title_ru;
$this->params['breadcrumbs'][] = ['label' => 'Accommodations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->col_id, 'url' => ['view', 'id' => $model->col_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="accommodation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
