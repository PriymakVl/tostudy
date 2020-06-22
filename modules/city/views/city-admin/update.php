<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\city\models\City */

$this->title = 'Редактировать город: ' . $model->col_id;
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->col_id, 'url' => ['view', 'id' => $model->col_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="city-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
