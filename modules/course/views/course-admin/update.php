<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\course\models\Course */

$this->title = 'Update Course: ' . $model->col_id;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->col_id, 'url' => ['view', 'id' => $model->col_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="course-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
