<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\city\models\City;

/* @var $this yii\web\View */
/* @var $model app\modules\school\models\School */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-img">

    <h3>Загрузка изображений для школы: <?= Html::a($school->name, ['view', 'id' => $school->col_id], ['class' => 'profile-link']) ?></h3>
    
    <br><br>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?
            $model->size = 1;
            echo $form->field($model, 'size')->radioList([0 => 'Мини', 1 => 'Большой'])->label('Размер') 
        ?>

        <?= $form->field($model, 'image')->fileInput()->label('Изображение'); ?>

        <?= $form->field($model, 'school_id')->hiddenInput(['value'=> $school->col_id])->label(false); ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
