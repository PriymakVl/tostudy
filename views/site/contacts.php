<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<span>Контакты</span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<div id="contacts">
	<div class="wrap">
		<h1 class="page-title">Контакты</h1>
		<div class="content row">
			<div class="column-left">
				<p><?= $contact->col_address_ru ?></p>
				<p>тел: <?= $contact->col_tel ?></p>
				<p><?= $contact->col_email ?></p>
				<div class="social-network">
					<a href="<?= Yii::$app->setting->get('col_facebook') ?>/" target="_blank">
						<?= Yii::$app->svg->get('facebook-contacts') ?>
					</a>
					<a href="<?= Yii::$app->setting->get('col_instagram') ?>/" target="_blank">
						<?= Yii::$app->svg->get('instagram-contacts') ?>
					</a>
					<a href="<?= Yii::$app->setting->get('col_vk') ?>/" target="_blank">
						<?= Yii::$app->svg->get('vk-contacts') ?>
					</a>
					<a href="<?= Yii::$app->setting->get('col_ok') ?>/" target="_blank">
						<?= Yii::$app->svg->get('ok-contacts') ?>
					</a>
				</div> <!-- /.social-network -->
				<p class="label">Гравфик работы:</p>
				<p class="last">Ежедневно с 10:00 до 21:00 (без перерыва и выходных)</p>
			</div> <!-- /.column-left -->
			
			<div class="form">
				<h2>Напишите нам:</h2>
				<? $form = ActiveForm::begin(); ?>

					<?= $form->field($model, 'col_username', ['template' => "{error}\n{label}\n{input}"])->label('Имя',['class'=>'input__label']) ?>

					<?= $form->field($model, 'col_email', ['template' => "{error}\n{label}\n{input}"])->label('Email',['class'=>'input__label']) ?>

					<?= $form->field($model, 'col_comment', ['template' => "{error}\n{label}\n{input}"])->textarea(['class' => ''])->label('Текст',['class'=>'input__label']) ?>

					<?= Html::submitButton('Отправить', ['class' => 'btn btn2']) ?>

				<?php ActiveForm::end() ?>
			</div> <!-- /.form -->

		</div>	<!-- /.row -->
	</div>	<!-- /.wrap -->
</div>	<!-- /#contacts -->

