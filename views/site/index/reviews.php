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
							<time class="date js-date" data-locale="ru"><?= $review->col_date ?></time>
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