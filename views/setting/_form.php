<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'col_meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_facebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_instagram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_vk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_ok')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_telegram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_address_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_schedule_ru')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
