<header id="header" class="home">
	<?= $this->render('topline') ?>

	<div class="content">
		<h1 class="title">Подберем программу обучения</h1>
		<div class="subtitle">ВЫГОДНЕЕ, ЧЕМ НАПРЯМУЮ В ШКОЛЕ. СКИДКИ ДО 50%</div>
		
		<form action="/search.php" method="get" class="form">
			<div>
				<div class="input__field input__select js-open-form-select" data-id="#js-form-language">
					<span class="js-selected">Язык</span>
					<?= Yii::$app->svg->get('arrow-bottom') ?>
					<ul id="js-form-language" class="form-select js-form-select">
						<li class="js-language-option" data-value="0">Все</li>
						<?php foreach (Yii::$app->params['languages'] as $lang): ?>
							<li class="js-language-option" data-value="<?= $lang->col_id ?>"><?= $lang->col_title_ru ?></li>
						<?php endforeach ?>
					</ul> <!-- /.form-select -->
				</div> <!-- /.input__field -->

				<div class="input__field input__select js-open-form-select" data-id="#js-form-country">
					<span class="js-selected">Страна</span>
					<?= Yii::$app->svg->get('arrow-bottom') ?>
					<ul id="js-form-country" class="form-select js-form-select">
						<li class="js-country-option" data-value="0">Все</li>
					</ul> <!-- /.form-select -->
				</div> <!-- /.input__field -->
				
				<div class="input__field input__select js-open-form-select" data-id="#js-form-city">
					<span class="js-selected">Город</span>
					<?= Yii::$app->svg->get('arrow-bottom') ?>
					<ul id="js-form-city" class="form-select js-form-select">
						<li class="js-city-option" data-value="0"><?=$ini_file['search']['option_all']?></li>
						<?//=$cities?>
					</ul> <!-- /.form-select -->
				</div> <!-- /.input__field -->
			</div>
			
			<div>
				<input type="hidden" name="language" value="" id="js-search-language">
				<input type="hidden" name="country" value="" id="js-search-country">
				<input type="hidden" name="city" value="" id="js-search-city">
				<div class="input__field">
					<input type="text" placeholder="Школа" name="school">
				</div>
				<button type="submit" class="btn">Искать</button>
			</div>
		</form> <!-- /.form -->
	</div> <!-- /.content -->

	<div class="scroll-down js-get-section" data-section="#js-why-us"><span>Далее</span><i></i></div>

	<div class="social-network2">
		<a href="https://www.facebook.com/<?= Yii::$app->setting->get('col_facebook') ?>/" target="_blank">
			<?= Yii::$app->svg->get('facebook') ?>
		</a>
		<a href="https://www.instagram.com/<?= Yii::$app->setting->get('col_instagram') ?>/" target="_blank">
			<?= Yii::$app->svg->get('instagram') ?>
		</a>
		<a href="https://vk.com/<?= Yii::$app->setting->get('col_vk') ?>/" target="_blank"> 
			<?= Yii::$app->svg->get('in-contact') ?>
		</a>
		<a href="https://ok.com/<?= Yii::$app->setting->get('col_ok') ?>/" target="_blank"> 
			<?= Yii::$app->svg->get('classmates') ?>
		</a>
	</div> <!-- /.social-network -->
</header>
