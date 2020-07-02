<?php 
use yii\bootstrap\Modal; 
?>

<div class="calc">

	<h2>Calculator</h2>
	<label class="input__label">
		<span>Type of course</span>
		<span class="price" id="js-course-price"></span>
	</label>
	
	<div class="input__field input__select" id="js-course">
		<span class="js-selected">Choose a course</span>
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
		<span>Number of weeks</span>
	</label>
	
	<div class="input__field input__select" id="js-weeks">
		<span class="js-selected" data-price="0">Choose the number of weeks</span>
		<?= Yii::$app->svg->get('arrow-bottom') ?>
		<ul id="js-form-weeks" class="form-select">
		</ul> <!-- /.form-select -->
	</div> <!-- /.input__field -->
	
	<label class="input__label">
		<span>Type of accommodation</span>
		<span class="price" id="js-accommodation-price"></span>
	</label>
	
	<div class="input__field input__select"  id="js-accommodation">
		<span class="js-selected" data-price="0">Choose type of accommodation</span>
		<?= Yii::$app->svg->get('arrow-bottom') ?>
		<ul id="js-form-accommodation" class="form-select js-form-select">
			<?php if ($accommodation): ?>
				<?php foreach ($accommodation as $item): ?>
					<li class="js-accommodation-option" data-price="<?= $item->price ?>">
						<?= $item->title ?>
					</li>
				<?php endforeach ?>
				?<?php else: ?>
					<li class="js-accommodation-option" data-price="0">Without accommodation</li>
			<?php endif ?>
		</ul> <!-- /.form-select -->
	</div> <!-- /.input__field -->
	
	<div class="registration-fee row">
		<span>School registration fee:</span>
		<span class="price" id="js-registration-fee" data-price="<?= $school->col_registration_fee ?>">
			<?= $school->col_registration_fee ?> <?= Yii::$app->params['currencies'][$school->col_currency] ?>
		</span>
	</div>
	
	<div class="to-pay">
		<span>Total:</span>
		<span id="js-to-pay" data-currency="<?= Yii::$app->params['currencies'][$school->col_currency] ?>"></span>
	</div>

	<div class="action">
		
		<?= $this->render('order_form', ['order' => $order]) ?>
		
	</div>
</div> <!-- /.calc -->



