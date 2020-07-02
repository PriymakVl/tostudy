<?php 
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?
	Modal::begin([
		'header' => '<h2>Book now</h2><p>For reservation, enter student details</p>',

		'toggleButton' => ['label' => 'Book now','tag' => 'a','class' => 'btn btn-order',],

	]);
?>

	<?php $form = ActiveForm::begin(['action' => '/order/create']); ?>

	    <?
	    	$input_template = '{label} <div class="input__field"> {input} {error}</div>'; 
			$label_options = ['class' => 'input__label'];
			$input_options = [];
			$style_input['template' ] = $input_template;
			$style_input['labelOptions' ] = $label_options;
			$style_input['inputOptions' ] = $input_options;
		?>

	    <?= $form->field($order, 'col_username', $style_input)->textInput(['autofocus' => true]) ?>
	 
	    <?= $form->field($order, 'col_tel', $style_input) ?>

	    <?= $form->field($order, 'col_email', $style_input) ?>
	 
	    <?= $form->field($order, 'col_comment', $style_input)->textarea() ?>
	 
	    <div class="form-group" style="text-align: center;">
	        <?= Html::submitButton('Book now', ['class' => 'btn btn2']) ?>
	    </div>

	<?php ActiveForm::end() ?>


<? //Modal::end(); ?>
	