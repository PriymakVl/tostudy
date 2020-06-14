<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SettingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'col_id') ?>

    <?= $form->field($model, 'col_meta_title') ?>

    <?= $form->field($model, 'col_meta_description') ?>

    <?= $form->field($model, 'col_meta_keywords') ?>

    <?= $form->field($model, 'col_tel') ?>

    <?php // echo $form->field($model, 'col_email') ?>

    <?php // echo $form->field($model, 'col_facebook') ?>

    <?php // echo $form->field($model, 'col_instagram') ?>

    <?php // echo $form->field($model, 'col_vk') ?>

    <?php // echo $form->field($model, 'col_ok') ?>

    <?php // echo $form->field($model, 'col_telegram') ?>

    <?php // echo $form->field($model, 'col_address_en') ?>

    <?php // echo $form->field($model, 'col_address_es') ?>

    <?php // echo $form->field($model, 'col_address_ua') ?>

    <?php // echo $form->field($model, 'col_address_ru') ?>

    <?php // echo $form->field($model, 'col_address_cn') ?>

    <?php // echo $form->field($model, 'col_schedule_en') ?>

    <?php // echo $form->field($model, 'col_schedule_es') ?>

    <?php // echo $form->field($model, 'col_schedule_ua') ?>

    <?php // echo $form->field($model, 'col_schedule_ru') ?>

    <?php // echo $form->field($model, 'col_schedule_cn') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
