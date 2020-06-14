<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'col_id') ?>

    <?= $form->field($model, 'col_username') ?>

    <?= $form->field($model, 'col_email') ?>

    <?= $form->field($model, 'col_tel') ?>

    <?= $form->field($model, 'col_comment') ?>

    <?php // echo $form->field($model, 'col_school_id') ?>

    <?php // echo $form->field($model, 'col_course_id') ?>

    <?php // echo $form->field($model, 'col_weeks') ?>

    <?php // echo $form->field($model, 'col_accommodation') ?>

    <?php // echo $form->field($model, 'col_date') ?>

    <?php // echo $form->field($model, 'col_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
