<?php 
	$this->registerJsFile('@web/js/public/search-home.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
 ?>

<section class="section section-reasons" id="js-why-us">
	<div class="wrap">
		<h2>Why us?</h2>
		<ul class="wrap-items">
			<li class="item">
				<span class="icon">
					<?= Yii::$app->svg->get('lang-courses') ?>
				</span> <!-- /.icon -->
				<span>Over 3,800 language courses<br>from around the world in 340<br>educational centers</span>
			</li> <!-- /.item -->
			<li class="item">
				<span class="icon">
					<?= Yii::$app->svg->get('free-booking') ?>
				</span> <!-- /.icon -->
				<span>Free online booking. Prices.<br>are lower than directly<br>in schools</span>
			</li> <!-- /.item -->
			<li class="item">
				<span class="icon">
					<?= Yii::$app->svg->get('smile') ?>
				</span> <!-- /.icon -->
				<span>10 years in the field of<br>education abroad. Over 4500 students<br>from around the world</span>
			</li> <!-- /.item -->
			<li class="item">
				<span class="icon">
					<?= Yii::$app->svg->get('consultation') ?>
				</span> <!-- /.icon -->
				<span>24/7 managers<br>consultation</span>
			</li> <!-- /.item -->
			<li class="item">
				<span class="icon">
					<?= Yii::$app->svg->get('magistracy') ?>
				</span> <!-- /.icon -->
				<span>Master and first higher<br>education in the best universities and<br>business schools in the world.<br>Enrollment without exams</span>
			</li> <!-- /.item -->
			<li class="item">
				<span class="icon">
					<?= Yii::$app->svg->get('key') ?>
				</span> <!-- /.icon -->
				<span>Organization of training<br>under the key</span>
			</li> <!-- /.item -->
		</ul> <!-- /.wrap-items -->
	</div> <!-- /.wrap -->
</section> <!-- /#reasons -->

<?php if ($schools): ?>
	<section class="section">
		<div class="wrap">
			<h2>We recommend language schools</h2>
			<div class="schools-recommend">
			<?php foreach ($schools as $school): ?>
				'<div class="item">
					<a href="/school/<?= $school->alias ?>" class="wrap-img">
						<img src="/img/schools/<?= $school->col_img_mini ?>" alt="<?= $school->name ?>">
					</a>
					<div class="container">
						<div>
							<h4>
								<a href="/school/<?= $school->alias ?>"><?= $school->name ?></a>
							</h4>
							<p class="description"><?= $school->col_description_ru ?></p>
						</div>
						<a href="/school/<?= $school->alias?>" class="btn3">Watch courses</a>
					</div>
				</div>
			<?php endforeach ?>
			</div>
		</div> <!-- /.wrap -->
	</section> <!-- /.section -->
<?php endif ?>


<section class="section how-it-works">
	<div class="wrap">
		<h2>How it works</h2>
		
		<div class="item item1">
			<span class="num">1</span>
			<div class="content">
				<h4>Search</h4>
				<p class="description">
					With smart search, you can quickly and easily find the right course in a convenient location at the best price. 
				</p>
			</div> <!-- /.content -->
			<?= Yii::$app->svg->get('circle-1') ?>
		</div> <!-- /.item -->

		<div class="item item2">
			<span class="num">2</span>
			<div class="content">
				<h4>Booking</h4>
				<p class="description">
					During the day you will receive a confirmation, as a guarantee that the place in the program is assigned to you 
				</p>
			</div> <!-- /.content -->
			<?= Yii::$app->svg->get('circle-2') ?>
		</div> <!-- /.item -->

		<div class="item">
			<span class="num">3</span>
			<div class="content">
				<h4>Payment</h4>
				<p class="description">
					It is more profitable and easier to order education from us than through an agency or on the website of an educational institution 
				</p>
			</div> <!-- /.content -->
			<?= Yii::$app->svg->get('circle-3') ?>
		</div> <!-- /.item -->
		
		<div class="item">
			<span class="num">4</span>
			<div class="content">
				<h4>Consultation</h4>
				<p class="description">
					We know everything about education abroad, we ourselves have passed all stages, and we have international accreditations 
				</p>
			</div> <!-- /.content -->
			<?= Yii::$app->svg->get('circle-4') ?>
		</div> <!-- /.item -->
		
	</div> <!-- /.wrap -->
</section> <!-- /.section -->

<?php if ($reviews): ?>
	<section class="section section-reviews">
		<div class="wrap">
			<h2>Feedback from our customers</h2>
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
						<?= Yii::$app->svg->get('slider-arrow-left') ?>
					</a>
					<a href="#" class="slider-arrow right" id="js-slide-next">
						<?= Yii::$app->svg->get('slider-arrow-right') ?>
					</a>
				</div> <!-- /.arrows -->
			</div> <!-- /.content -->
		</div> <!-- /.wrap -->
	</section> <!-- /.section -->
<?php endif ?>

<?php if ($questions): ?>
	<section class="section section-faq">
		<div class="wrap">
			<h2>Frequently asked Questions</h2>
			<ul class="faq">
				<?php foreach ($questions as $item): ?>
					<? if ($item->col_question_en && $item->col_answer_en): ?>
						<li class="item">
							<a href="#" class="question js-question" data-answer-id="#question-<?= $item->col_id ?>">
								<?= $item->col_question_en ?>				
								<span class="icon">
									<?= Yii::$app->svg->get('plus') ?>
								</span>
							</a>
							<div class="answer js-answer" id="question-<?= $item->col_id ?>">
								<?= $item->col_answer_en ?>
							</div>
						</li>
					<? endif; ?>
				<?php endforeach ?>
			</ul>
		</div> <!-- /.wrap -->
	</section> <!-- /.section -->
<?php endif ?>

<?= $this->render('form_question', ['model' => $model]) ?>

<?php if ($partners): ?>
	<section class="section section-partners">
	<div class="wrap">
		<h2>Work with us</h2>
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



