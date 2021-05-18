<header id="header" class="home">

	<?= $this->render('topline', ['home' => true]) ?>

	<div class="content">
		<h1 class="title">Подберем программу обучения</h1>
		<div class="subtitle">ВЫГОДНЕЕ, ЧЕМ НАПРЯМУЮ В ШКОЛЕ. СКИДКИ ДО 50%</div>
		
		<form class="form">
			<div>
				<div class="input__field input__select" id="js-program">
					<span class="js-selected" prog_id="">Программа</span>
					<?= Yii::$app->svg->get('arrow-bottom') ?>
					<ul id="js-form-program" class="form-select js-form-select">
						<?php foreach (Yii::$app->params['programs'] as $program): ?>
							<li class="js-program-option" data-prog_id="<?= $program->col_id ?>"><?= $program->col_name ?></li>
						<?php endforeach ?>
					</ul> <!-- /.form-select -->
				</div> <!-- /.input__field -->

				<div class="input__field input__select" id="js-lang">
					<span class="js-selected" lang_id="">Язык</span>
					<?= Yii::$app->svg->get('arrow-bottom') ?>
					<ul id="js-form-language" class="form-select js-form-select">
						<?php foreach (Yii::$app->params['languages'] as $lang): ?>
							<li class="js-language-option" data-lang_id="<?= $lang->col_id ?>"><?= $lang->col_title_ru ?></li>
						<?php endforeach ?>
					</ul> <!-- /.form-select -->
				</div> <!-- /.input__field -->

				<div class="input__field input__select" id="js-country">
					<span class="js-selected" country_id="">Страна</span>
					<?= Yii::$app->svg->get('arrow-bottom') ?>
					<ul id="js-form-country" class="form-select js-form-select">
					</ul> <!-- /.form-select -->
				</div> <!-- /.input__field -->
				
				<div class="input__field input__select" id="js-city">
					<span class="js-selected" city_id="">Город</span>
					<?= Yii::$app->svg->get('arrow-bottom') ?>
					<ul id="js-form-city" class="form-select js-form-select">
					</ul> <!-- /.form-select -->
				</div> <!-- /.input__field -->
			</div>
			
			<div>
				<div class="input__field">
					<input type="text" placeholder="Школа" name="school">
				</div>
				<button id="js-submit-search" class="btn">Искать</button>
			</div>
		</form> <!-- /.form -->
	</div> <!-- /.content -->

	<div class="scroll-down js-get-section" data-section="#js-why-us"><span>Далее</span><i></i></div>

	<div class="social-network2">
		<a href="<?= Yii::$app->setting->get('col_facebook') ?>/" target="_blank">
			<?= Yii::$app->svg->get('facebook') ?>
		</a>
		<a href="<?= Yii::$app->setting->get('col_instagram') ?>/" target="_blank">
			<?= Yii::$app->svg->get('instagram') ?>
		</a>
		<a href="<?= Yii::$app->setting->get('col_vk') ?>/" target="_blank"> 
			<?= Yii::$app->svg->get('in-contact') ?>
		</a>
		<a href="<?= Yii::$app->setting->get('col_ok') ?>/" target="_blank"> 
			<?= Yii::$app->svg->get('classmates') ?>
		</a>
	</div> <!-- /.social-network -->
</header>
