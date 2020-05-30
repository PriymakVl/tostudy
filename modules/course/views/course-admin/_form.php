<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\course\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'col_school_id')->textInput() ?>

    <?= $form->field($model, 'col_title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_es')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_cn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_description_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_description_es')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_description_ua')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_description_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_description_cn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_price')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
