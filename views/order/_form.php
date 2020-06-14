<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Order;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php   
        $items = [Order::STATUS_WAITING => 'Ожидание', Order::STATUS_PROCESSING => 'В обработке', Order::STATUS_COMPLETED => 'Завершен'];
        echo $form->field($model, 'col_status')->dropDownList($items);
     ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
