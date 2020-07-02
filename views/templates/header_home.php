<header id="header" class="home">

	<?= $this->render('topline', ['home' => true]) ?>

	<div class="content">
		<h1 class="title">We will select the training program</h1>
		<div class="subtitle">MORE PROFITABLE THAN DIRECTLY AT SCHOOL. DISCOUNTS UP TO 50%</div>
		
		<form action="/search/result" method="get" class="form">
			<div>
				<div class="input__field input__select" id="js-lang">
					<span class="js-selected">Language</span>
					<?= Yii::$app->svg->get('arrow-bottom') ?>
					<ul id="js-form-language" class="form-select js-form-select">
						<li class="js-language-option" data-value="0">All</li>
						<?php foreach (Yii::$app->params['languages'] as $lang): ?>
							<li class="js-language-option" data-lang_id="<?= $lang->col_id ?>"><?= $lang->col_title_en ?></li>
						<?php endforeach ?>
					</ul> <!-- /.form-select -->
				</div> <!-- /.input__field -->

				<div class="input__field input__select" id="js-country">
					<span class="js-selected">Country</span>
					<?= Yii::$app->svg->get('arrow-bottom') ?>
					<ul id="js-form-country" class="form-select js-form-select">
						<li class="js-city-option">All</li>
					</ul> <!-- /.form-select -->
				</div> <!-- /.input__field -->
				
				<div class="input__field input__select" id="js-city">
					<span class="js-selected">City</span>
					<?= Yii::$app->svg->get('arrow-bottom') ?>
					<ul id="js-form-city" class="form-select js-form-select">
						<li class="js-city-option">All</li>
					</ul> <!-- /.form-select -->
				</div> <!-- /.input__field -->
			</div>
			
			<div>
				<div class="input__field">
					<input type="text" placeholder="School" name="school">
				</div>
				<button type="submit" class="btn">Search</button>
			</div>
		</form> <!-- /.form -->
	</div> <!-- /.content -->

	<div class="scroll-down js-get-section" data-section="#js-why-us"><span>Next</span><i></i></div>

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
