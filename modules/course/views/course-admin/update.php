<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\course\models\Course */

$this->title = 'Редактирование курса: ' . $model->col_title_ru;

?>
<div class="course-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'country_id' => $country_id, 'city_id' => $city_id, 'school_id' => $school_id
    ]) ?>

</div>
