<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\city\models\City;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\modules\school\models\School */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="school-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'col_meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title')->textInput(['maxlength' => true]) ?>

    <?php 

        $items = City::find()->select('col_title_ru')->asArray()->indexBy('col_id')->column();
 
        $params = ['prompt' => 'Не выбран'];
 
        echo $form->field($model, 'col_city_id')->dropDownList($items, $params)->label('Город');

     ?>

    <?
        echo $form->field($model, 'col_about_us_ru')->widget(CKEditor::className(),[
            'editorOptions' => [
                'preset' => 'full',
                'inline' => false, 
            ],
        ]);
    ?>

    <?
        echo $form->field($model, 'col_residence_ru')->widget(CKEditor::className(),[
            'editorOptions' => [
                'preset' => 'full',
                'inline' => false, 
            ],
        ]);
    ?>

    <?= $form->field($model, 'col_registration_fee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_home_page')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>

    <?= $form->field($model, 'col_currency')->dropDownList(Yii::$app->params['currencies']); ?>

    <?= $form->field($model, 'col_subcategory')->dropDownList(Yii::$app->program->all); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
