<?php
/* @var $this yii\web\View */
?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<a href="/languages/<?= Yii::$app->program->getAlias($program) ?>">Языки</a>
		<a href="/countries/<?= $lang->col_alias ?>">Страны</a>
		<a href="/cities/<?= $city->country->col_alias ?>">Города</a>
		<span><?= $city->col_title_ru ?></span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

	
<section class="section section-schools">
	<div class="wrap">
		
		<?= app\widgets\Info::widget() ?>

		<?= app\widgets\text\Text::widget(['position' => 'top', 'texts' => $city->texts]); ?>

		<h2>Школы</h2>
		<div class="schools">
			<?php if ($schools): ?>
				<?php foreach ($schools as $school): ?>

					<div class="item">
						<a href="/school/<?= $school->alias ?>" class="wrap-img">
							<img src="/img/schools/<?= $school->col_img_mini ?>" alt="<?= $shool->col_title_ru ?>">
						</a>
						<h4><a href="/school/<?= $school->alias ?>"><?= $school->col_title ?></a></h4>
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
							<a href="/school/<?= $school->alias ?>" class="view">Смотреть курсы</a>
						</div>
					</div>

				<?php endforeach ?>
			<?php endif ?>
		</div>

		<?= app\widgets\text\Text::widget(['position' => 'bottom', 'texts' => $city->texts]); ?>

	</div> <!-- /.wrap -->
</section> <!-- /.section-schools -->