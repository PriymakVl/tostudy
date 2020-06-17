<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\offer\models\Offer;

/* @var $this yii\web\View */
/* @var $model app\modules\offer\models\Offer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offer-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'col_title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_text_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file_img')->fileInput() ?>

    <?//= $form->field($model, 'file_img_big')->fileInput() ?>

    <?php 
        $items = [Offer::STATUS_ACTIVE => 'Активна', Offer::STATUS_INACTIVE => 'Не активна'];
        echo $form->field($model, 'col_status')->dropDownList($items);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
