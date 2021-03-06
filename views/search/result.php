<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<span>Поиск</span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<section class="section search-page">
	<div class="wrap">

		<?= app\widgets\Info::widget() ?>
		
		<h1>Результат поиска</h1>
		
		<?php if (empty($schools)): ?>
			<p class="empty">По вашему запросу ничего не найдено.</p>
		<? else: ?>
			<div class="schools" id="js-products">
				<?php foreach ($schools as $school): ?>

					<? if (!in_array($program->id, $school->getIdsPrograms())) continue; ?>

					<div class="item">
						<a href="/school/<?= $school->alias ?>/<?= $program->col_alias ?>" class="wrap-img">
							<img src="/img/schools/<?= $school->col_img_mini ?>" alt="<?= $shool->col_title_ru ?>">
						</a>
						<h4>
							<a href="/school/<?= $school->alias ?>"><?= $school->col_title ?></a>
						</h4>
						<div class="location">
							<?= Yii::$app->svg->get('locale') ?>
							<?= $school->city->name ?>,
							<?= $school->city->country->name ?>
						</div>
						<div class="wrap-price">
							<div class="price">
								<span>от</span> 
								<? echo $school->getLowestPriceCourses($program->id) .' '. $school->currency;  ?>
								<span>/ нед</span>
							</div>
							<a href="/school/<?= $school->alias ?>/<?= $program->col_alias ?>" class="view">Смотреть курсы</a>
						</div>
					</div>

				<?php endforeach ?>
			</div>
		<? endif; ?>
	</div> <!-- /.wrap -->
</section>