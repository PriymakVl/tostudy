<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Home</a>
		<span>Contacts</span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<div id="contacts">
	<div class="wrap">
		<h1 class="page-title">Contacts</h1>
		<div class="content row">
			<div class="column-left">
				<p><?= $contact->col_address_en ?></p>
				<p>тел: <?= $contact->col_tel ?></p>
				<p><?= $contact->col_email ?></p>
				<div class="social-network">
					<a href="https://www.facebook.com/<?= $contact->col_facebook ?>/" target="_blank">
						<?= Yii::$app->svg->get('facebook-contacts') ?>
					</a>
					<a href="https://www.instagram.com/<?= $contact->col_instagram ?>/" target="_blank">
						<?= Yii::$app->svg->get('instagram-contacts') ?>
					</a>
					<a href="https://vk.com/<?= $contact->col_vk ?>/" target="_blank">
						<?= Yii::$app->svg->get('vk-contacts') ?>
					</a>
					<a href="https://ok.com/<?= $contact->col_ok ?>/" target="_blank">
						<?= Yii::$app->svg->get('ok-contacts') ?>
					</a>
				</div> <!-- /.social-network -->
				<p class="label">Schedule:</p>
				<p class="last">Daily from 10:00 to 21:00 (without a break and weekends)</p>
			</div> <!-- /.column-left -->
			
			<div class="form">
				<h2>Write to us:</h2>
				<? $form = ActiveForm::begin(); ?>

					<?= $form->field($model, 'col_username', ['template' => "{error}\n{label}\n{input}"])->label('Name',['class'=>'input__label']) ?>

					<?= $form->field($model, 'col_email', ['template' => "{error}\n{label}\n{input}"])->label('Email',['class'=>'input__label']) ?>

					<?= $form->field($model, 'col_comment', ['template' => "{error}\n{label}\n{input}"])->textarea(['class' => ''])->label('Text',['class'=>'input__label']) ?>

					<?= Html::submitButton('Submit', ['class' => 'btn btn2']) ?>

				<?php ActiveForm::end() ?>
			</div> <!-- /.form -->

		</div>	<!-- /.row -->
	</div>	<!-- /.wrap -->
</div>	<!-- /#contacts -->

