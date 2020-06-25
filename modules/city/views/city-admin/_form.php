<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\country\models\Country;

/* @var $this yii\web\View */
/* @var $model app\modules\city\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php 
        $items = Country::find()->select('col_title_ru')->asArray()->indexBy('col_id')->orderBy('col_title_ru')->column();
        $params = ['prompt' => 'Выберите страну'];
        echo $form->field($model, 'col_country_id')->dropDownList($items, $params);
     ?>

    <?= $form->field($model, 'col_title_ru')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'col_meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_alias')->textInput() ?>

    <?= $form->field($model, 'file_image')->fileInput()->label('Изображение') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
