<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\school\models\School;

/* @var $this yii\web\View */
/* @var $model app\modules\course\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        $items = School::find()->select('col_title')->asArray()->indexBy('col_id')->orderBy('col_title')->column();
        $params = ['prompt' => 'Выберите школу'];
        echo $form->field($model, 'col_school_id')->dropDownList($items, $params);
     ?>

    <?= $form->field($model, 'col_title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_description_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_price')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
