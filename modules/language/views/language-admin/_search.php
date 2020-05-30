<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\language\models\LanguageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="language-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'col_id') ?>

    <?= $form->field($model, 'col_title_en') ?>

    <?= $form->field($model, 'col_title_es') ?>

    <?= $form->field($model, 'col_title_ua') ?>

    <?= $form->field($model, 'col_title_ru') ?>

    <?php // echo $form->field($model, 'col_title_cn') ?>

    <?php // echo $form->field($model, 'col_img') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
