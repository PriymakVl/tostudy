<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Feedback;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feedback-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php   
        $items = [Feedback::STATUS_WAITING => 'Ожидание', Feedback::STATUS_PROCESSING => 'В обработке', Feedback::STATUS_COMPLETED => 'Завершен'];
        echo $form->field($model, 'col_status')->dropDownList($items);
     ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
