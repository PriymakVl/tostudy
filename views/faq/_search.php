<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FaqSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'col_id') ?>

    <?= $form->field($model, 'col_question_en') ?>

    <?= $form->field($model, 'col_question_es') ?>

    <?= $form->field($model, 'col_question_ua') ?>

    <?= $form->field($model, 'col_question_ru') ?>

    <?php // echo $form->field($model, 'col_question_cn') ?>

    <?php // echo $form->field($model, 'col_answer_en') ?>

    <?php // echo $form->field($model, 'col_answer_es') ?>

    <?php // echo $form->field($model, 'col_answer_ua') ?>

    <?php // echo $form->field($model, 'col_answer_ru') ?>

    <?php // echo $form->field($model, 'col_answer_cn') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
