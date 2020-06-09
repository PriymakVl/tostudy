<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\school\models\School */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="school-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'col_meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_img_mini')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_description_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_about_us_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_residence_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_registration_fee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_home_page')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>

    <?= $form->field($model, 'col_currency')->dropDownList(Yii::$app->params['currencies']); ?>

    <?= $form->field($model, 'col_subcategory')->dropDownList(Yii::$app->program->all); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
