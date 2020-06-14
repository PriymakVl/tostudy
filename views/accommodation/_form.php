<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\school\models\School;

/* @var $this yii\web\View */
/* @var $model app\models\Accommodation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accommodation-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php 
        $items = School::find()->select('col_title')->asArray()->indexBy('col_id')->orderBy('col_title')->column();
        $params = ['prompt' => 'Выберите школу'];
        echo $form->field($model, 'col_school_id')->dropDownList($items, $params);
     ?>

    <?= $form->field($model, 'col_title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_price')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
