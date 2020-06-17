<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\offer\models\OfferSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'col_id') ?>

    <?= $form->field($model, 'col_title_ru') ?>

    <?= $form->field($model, 'col_text_ru') ?>

    <?= $form->field($model, 'col_alias') ?>

    <?= $form->field($model, 'col_img') ?>

    <?php // echo $form->field($model, 'col_img_big') ?>

    <?php // echo $form->field($model, 'col_date') ?>

    <?php // echo $form->field($model, 'col_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
