<?php 
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Feedback;

$model = new Feedback; 
?>

<?
	Modal::begin([
		'header' => '<h2>Задать вопрос</h2><p>Напишите нам и мы свяжемся с вами для консультации</p>',

		'toggleButton' => ['label' => 'Задать вопрос','tag' => 'a','class' => 'btn',],

	]);
?>

<?php $form = ActiveForm::begin(['action' =>'feedback/home']); ?>

    <?
    	$input_template = '{label} <div class="input__field"> {input} {error}</div>'; 
		$label_options = ['class' => 'input__label'];
		$input_options = [];
		$style_input['template'] = $input_template;
		$style_input['labelOptions'] = $label_options;
		$style_input['inputOptions'] = $input_options;
	?>

    <?= $form->field($model, 'col_username', $style_input)->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'col_email', $style_input) ?>
 
    <?= $form->field($model, 'col_comment', $style_input)->textarea() ?>
 
    <div class="form-group" style="text-align: center;">
        <?= Html::submitButton('Задать вопрос', ['class' => 'btn']) ?>
    </div>

<?php ActiveForm::end() ?>


<? Modal::end(); ?>
	