<div class="calc" id="js-calc">
	<h2>Калькулятор</h2>
	<label class="input__label">
		<span>Тип курса</span>
	</label>
	
	<div class="input__field input__select" id="js-course">
		<span class="js-selected" data-course_id="">Выберите курс</span>
		<?= Yii::$app->svg->get('arrow-bottom') ?>
		<ul id="js-form-course" class="form-select js-form-select">
			<?php if ($courses): ?>
				<?php foreach ($courses as $course): ?>
					<li class="js-course-option" data-course_id="<?= $course->col_id ?>">
						<?= $course->name ?>
					</li>
				<?php endforeach ?>
			<?php endif ?>
		</ul> <!-- /.form-select -->
	</div> <!-- /.input__field -->
	
	<label class="input__label">
		<span>Количество недель</span>
	</label>
	
	<div class="input__field input__select" id="js-weeks">
		<span class="js-selected" data-price="0">Выберите количество недель</span>
		<?= Yii::$app->svg->get('arrow-bottom') ?>
		<ul id="js-form-weeks" class="form-select">
		</ul> <!-- /.form-select -->
	</div> <!-- /.input__field -->
	
	<label class="input__label">
		<span>Тип проживания></span>
		<span class="price" id="js-accommodation-price"></span>
	</label>
	
	<div class="input__field input__select js-open-form-select" data-value="0" data-price="0" id="js-accommodation" data-id="#js-form-accommodation">
		<span class="js-selected">Выберите тип проживания</span>
		<?= Yii::$app->svg->get('arrow-bottom') ?>
		<ul id="js-form-accommodation" class="form-select js-form-select">
			<?//=$accommodation_op?>
		</ul> <!-- /.form-select -->
	</div> <!-- /.input__field -->
	
	<div class="registration-fee row">
		<span>Регистрационный сбор школы:</span>
		<span class="price" id="js-registration-fee" data-price="<?=$row['col_registration_fee']?>">
			<?//= $courses[0]->col_currency ?> <?= Yii::$app->params['currencies'][$school->col_currency] ?>
		</span>
	</div>
	
	<div class="to-pay">
		<span>Итого:</span>
		<span id="js-to-pay" data-currency="<?= Yii::$app->params['currencies'][$school->col_currency] ?>"></span>
	</div>

	<div class="action">
		<a href="#" class="btn btn2 js-open-modal" data-modal-id="#js-modal-order">Забронировать</a>
	</div>

</div> <!-- /.calc -->