<?php

use yii\helpers\Html;

$this->title = "Редактирование текстов";
?>

<div>

    <h3>Редактирование текстов </h3>
    <p><b>Страна:</b> <?= $model->country->col_title_ru ?></p>
    <p><b>Программа:</b> <?= Yii::$app->program->getName($model->col_prog) ?></p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
