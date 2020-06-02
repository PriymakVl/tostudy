<div class="calc" id="js-calc">
	<h2>Калькулятор</h2>
	<label class="input__label">
		<span>Тип курса</span>
		<span class="price" id="js-course-price"></span>
	</label>
	
	<div class="input__field input__select js-open-form-select"
		 data-value="0"
		 data-school="<?=$_GET['id']?>"
		 id="js-course" data-id="#js-form-course">
		<span class="js-selected">Выберите курс</span>
		<?= Yii::$app->svg->get('arrow-bottom') ?>
		<ul id="js-form-course" class="form-select js-form-select">
			<?php if ($courses): ?>
				<?php foreach ($courses as $cours): ?>
					<li class="js-course-option" data-cours_id="<?= $cours->col_id ?>">
						<?= $cours->name ?>
					</li>
				<?php endforeach ?>
			<?php endif ?>
		</ul> <!-- /.form-select -->
	</div> <!-- /.input__field -->
	
	<label class="input__label">
		<span>Количество недель</span>
	</label>
	
	<div class="input__field input__select js-open-form-select" data-weeks="0" id="js-weeks" data-id="#js-form-weeks">
		<span class="js-selected">Выберите количество недель</span>
		<?= Yii::$app->svg->get('arrow-bottom') ?>
		<ul id="js-form-weeks" class="form-select js-form-select">
			<?//=$weeks_op?>
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