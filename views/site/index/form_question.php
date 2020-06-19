<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

	$template = '<div class="column"> {label} <div class="input__field"> {input} </div> {error} </div>'; 
	$label_options = ['class' => 'input__label'];
	$style_input = ['template' => $template, 'labelOptions' => $label_options];
 ?>

<section class="section-discuss">
	<div class="wrap">
		<h2>Есть вопросы?<br>Оставьте свой Email — и мы с Вами свяжемся!</h2>
		<?php $form = ActiveForm::begin(['action' =>['feedback/home']]); ?>
		<div class="form">

			<?= $form->field($model, 'col_username', $style_input)->textInput(['maxlength' => true]) ?>
					
			<?= $form->field($model, 'col_email', $style_input)->textInput(['maxlength' => true]) ?>
					
			<?= Html::submitButton('Оставить заявку', ['class' => 'btn btn2']) ?>

		</div>
		<?php ActiveForm::end(); ?>
	</div> <!-- /.wrap -->
</section> <!-- /.section-discuss -->





