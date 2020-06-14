<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use app\models\Review;

/* @var $this yii\web\View */
/* @var $model app\models\Review */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'col_username')->textInput(['maxlength' => true]) ?>

    <?php 
        echo $form->field($model, 'col_comment')->widget(CKEditor::className(),[
            'editorOptions' => [
                'preset' => 'basic',
                'inline' => false,
            ],
        ]);
    ?>

    <?php 
        $items = [Review::STATUS_PUBLISHED => 'Да', Review::STATUS_DRAFT => 'Нет'];
        echo $form->field($model, 'col_status')->dropDownList($items);
    ?>

    <?php 
        $items = [Review::SHOW_HOME => 'Да', Review::SHOW_HOME_NOT => 'Нет'];
        echo $form->field($model, 'col_home_page')->dropDownList($items);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
