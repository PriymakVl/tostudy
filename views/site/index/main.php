<?php 
use app\widgets\modal\Modal;
 
	$this->registerJsFile('@web/js/public/search-home.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
 ?>

<section class="section section-reasons" id="js-why-us">
	<div class="wrap">
		<h2>Почему мы?</h2>
		<ul class="wrap-items">
			<li class="item">
				<span class="icon">
					<?= Yii::$app->svg->get('lang-courses') ?>
				</span> <!-- /.icon -->
				<span>Более 3800 языковых курсов<br>со всего мира в 340 образовательных<br>центрах</span>
			</li> <!-- /.item -->
			<li class="item">
				<span class="icon">
					<?= Yii::$app->svg->get('free-booking') ?>
				</span> <!-- /.icon -->
				<span>Бесплатное онлайн бронирование.<br>Цены ниже, чем напрямую<br>в школах</span>
			</li> <!-- /.item -->
			<li class="item">
				<span class="icon">
					<?= Yii::$app->svg->get('smile') ?>
				</span> <!-- /.icon -->
				<span>10 лет в сфере образования<br>за рубежом. Более 4500 студентов<br>со всего мира</span>
			</li> <!-- /.item -->
			<li class="item">
				<span class="icon">
					<?= Yii::$app->svg->get('consultation') ?>
				</span> <!-- /.icon -->
				<span>Консультации менеджеров<br>24/7</span>
			</li> <!-- /.item -->
			<li class="item">
				<span class="icon">
					<?= Yii::$app->svg->get('magistracy') ?>
				</span> <!-- /.icon -->
				<span>Магистратура и первое высшее<br>образование в лучших университетах<br>и бизнес школах мира.<br>Зачисление без экзаменов</span>
			</li> <!-- /.item -->
			<li class="item">
				<span class="icon">
					<?= Yii::$app->svg->get('key') ?>
				</span> <!-- /.icon -->
				<span>Организация обучения<br>под ключ</span>
			</li> <!-- /.item -->
		</ul> <!-- /.wrap-items -->
	</div> <!-- /.wrap -->
</section> <!-- /#reasons -->

<?php if ($schools): ?>
	<section class="section">
		<div class="wrap">
			<h2>Рекомендуем языковые школы</h2>
			<div class="schools-recommend">
			<?php foreach ($schools as $school): ?>
				'<div class="item">
					<a href="/school?id=<?= $school->col_id ?>" class="wrap-img">
						<img src="/img/schools/<?= $school->col_img_mini ?>" alt="<?= $school->name ?>">
					</a>
					<div class="container">
						<div>
							<h4>
								<a href="/school?id=<?= $school->col_id ?>"><?= $school->name ?></a>
							</h4>
							<p class="description"><?= $school->col_description_ru ?></p>
						</div>
						<a href="/school?id=<?= $school->col_id ?>" class="btn3">Смотреть курсы</a>
					</div>
				</div>
			<?php endforeach ?>
			</div>
		</div> <!-- /.wrap -->
	</section> <!-- /.section -->
<?php endif ?>


<section class="section how-it-works">
	<div class="wrap">
		<h2>Как это работает</h2>
		
		<div class="item item1">
			<span class="num">1</span>
			<div class="content">
				<h4>Поиск</h4>
				<p class="description">
					С помощью умного поиска быстро и легко найти подходящий курс в удобном месте по самой выгодной цене
				</p>
			</div> <!-- /.content -->
			<?= Yii::$app->svg->get('circle-1') ?>
		</div> <!-- /.item -->

		<div class="item item2">
			<span class="num">2</span>
			<div class="content">
				<h4>Бронирование</h4>
				<p class="description">
					В течение суток вам придет подтверждение, как гарантия того, что место в программе закреплено за вами
				</p>
			</div> <!-- /.content -->
			<?= Yii::$app->svg->get('circle-2') ?>
		</div> <!-- /.item -->

		<div class="item">
			<span class="num">3</span>
			<div class="content">
				<h4>Оплата</h4>
				<p class="description">
					Заказать образование у нас выгоднее и проще, чем через агентство или на сайте учебного заведения 
				</p>
			</div> <!-- /.content -->
			<?= Yii::$app->svg->get('circle-3') ?>
		</div> <!-- /.item -->
		
		<div class="item">
			<span class="num">4</span>
			<div class="content">
				<h4>Консультации</h4>
				<p class="description">
					Мы знаем об образовании за рубежом все, сами прошли все этапы, и имеем международные аккредитации 
				</p>
			</div> <!-- /.content -->
			<?= Yii::$app->svg->get('circle-4') ?>
		</div> <!-- /.item -->
		
	</div> <!-- /.wrap -->
</section> <!-- /.section -->

<?php if ($reviews): ?>
	<section class="section section-reviews">
		<div class="wrap">
			<h2>Отзывы наших клиентов</h2>
			<div class="content">
				<div class="slick-slider slider-reviews" id="js-slider-reviews">
					<?php foreach ($reviews as $review): ?>
						<div class="item">
							<div class="container">
								<div class="avatar"><?= $review->avatar ?></div>
								<div class="name"><?= $review->username ?></div>
								<time class="date js-date" data-locale="ru"><?= $review->date ?></time>
								<div class="description"><?= $review->comment ?></div>
							</div>
						</div>
					<?php endforeach ?>	
				</div>
				<div class="arrows">
					<a href="#" class="slider-arrow left" id="js-slide-prev">
						<?//= Yii::$app->svg->get('slider-arrow-left') ?>
					</a>
					<a href="#" class="slider-arrow right" id="js-slide-next">
						<?//= Yii::$app->svg->get('slider-arrow-right') ?>
					</a>
				</div> <!-- /.arrows -->
			</div> <!-- /.content -->
		</div> <!-- /.wrap -->
	</section> <!-- /.section -->
<?php endif ?>

<?php if ($questions): ?>
	<section class="section section-faq">
		<div class="wrap">
			<h2>Часто задаваемые вопросы</h2>
			<ul class="faq">
				<?php foreach ($questions as $item): ?>
					<li class="item">
						<a href="#" class="question js-question" data-answer-id="#question-<?= $item->col_id ?>">
							<?= $item->col_question_ru ?>				
							<span class="icon">
								<?= Yii::$app->svg->get('plus') ?>
							</span>
						</a>
						<div class="answer js-answer" id="question-<?= $item->col_id ?>">
							<?= $item->col_answer_ru ?>
						</div>
					</li>
				<?php endforeach ?>
			</ul>
		</div> <!-- /.wrap -->
	</section> <!-- /.section -->
<?php endif ?>

<?= $this->render('form_question', ['model' => $model]) ?>

<?php if ($partners): ?>
	<section class="section section-partners">
	<div class="wrap">
		<h2>С нами работают</h2>
		<div class="partners" id="js-slider-partners">
			<?php foreach ($partners as $partner): ?>
				<a href="<?= $partner->col_link ?>" class="item" target="_blank">
					<img src="img/partners/<?= $partner->col_img ?>" alt="">
				</a>
			<?php endforeach ?>
		</div>
	</div> <!-- /.wrap -->
</section> <!-- /.section-partners -->
<?php endif ?>

<?= Modal::widget() ?>


