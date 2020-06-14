<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use app\models\Article;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'col_title_ru')->textInput(['maxlength' => true]) ?>

    <?php 
        echo $form->field($model, 'col_text_ru')->widget(CKEditor::className(),[
            'editorOptions' => [
                'preset' => 'full',
                'inline' => false,
            ],
        ]);
    ?>

    <?= $form->field($model, 'file_img')->fileInput()->label('Изображение') ?>

    <?= $form->field($model, 'file_img_big')->fileInput()->label('Большое изображение') ?>
    
    <?php 
        $items = [Article::STATUS_PUBLISHED => 'Опубликована', Article::STATUS_DRAFT => 'Черновик'];
        echo $form->field($model, 'col_status')->dropDownList($items);
    ?>
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
