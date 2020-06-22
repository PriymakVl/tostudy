<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\language\models\Language;

/* @var $this yii\web\View */
/* @var $model app\modules\country\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php 

        $items = Language::find()->select('col_title_ru')->asArray()->indexBy('col_id')->orderBy('col_title_ru')->column();
        $params = ['prompt' => 'Выберите язык'];
        echo $form->field($model, 'col_language_id')->dropDownList($items, $params);
     ?>

    <?= $form->field($model, 'col_title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_alias')->textInput(['maxlength' => true])->label('Пвсевдоним для ЧПУ') ?>

    <?= $form->field($model, 'file_image')->fileInput()->label('Изображение') ?>

    <?= $form->field($model, 'file_flag')->fileInput()->label('Флаг') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
