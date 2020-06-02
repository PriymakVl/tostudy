<?php
/* @var $this yii\web\View */
?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<a href="/languages">Языки</a>
		<a href="/countries">Страны</a>
		<a href="/cities">Города</a>
		<span><?= $city->col_title_ru ?></span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

	
<section class="section section-schools">
	<div class="wrap">
		<h2>Школы</h2>
		<div class="schools">
			<?php if ($schools): ?>
				<?php foreach ($schools as $school): ?>

					<div class="item">
						<a href="school?school_id=<?= $school->col_id ?>" class="wrap-img">
							<img src="img/schools/<?= $school->col_img_mini ?>" alt="<?= $shool->col_title_ru ?>">
						</a>
						<h4><a href="<?= $school->col_url ?>"><?= $shool->col_title_ru ?></a></h4>
						<div class="location">
							<?= Yii::$app->svg->get('locale') ?>
							<?= $school->city->name ?>,
							<?= $school->city->country->name ?>
						</div>
						<div class="wrap-price">
							<div class="price">
								<span>от</span> 
								<?= $school->courses[0]->getLowestPrice() .' '. $school->currency ?>
								<span>/ нед</span>
							</div>
							<a href="school?school_id=<?= $school->col_id ?>" class="view">Смотреть курсы</a>
						</div>
					</div>';

				<?php endforeach ?>
			<?php endif ?>
		</div>
	</div> <!-- /.wrap -->
</section> <!-- /.section-schools -->