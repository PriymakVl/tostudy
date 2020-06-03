<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<span>Поиск</span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<section class="section search-page">
	<div class="wrap">
		<h1>Результат поиска</h1>
		
		<?php if (empty($schools)): ?>
			<p class="empty">По вашему запросу ничего не найдено.</p>
		<? else: ?>
			<div class="schools" id="js-products">
				<?php foreach ($schools as $school): ?>
					
					<div class="item">
						<a href="/school?id=<?= $school->col_id ?>" class="wrap-img">
							<img src="/img/schools/<?= $school->col_img_mini ?>" alt="<?= $shool->col_title_ru ?>">
						</a>
						<h4>
							<a href="/school?id=<?= $school->col_id ?>"><?= $shool->col_title_ru ?></a>
						</h4>
						<div class="location">
							<?= Yii::$app->svg->get('locale') ?>
							<?= $school->city->name ?>,
							<?= $school->city->country->name ?>
						</div>
						<div class="wrap-price">
							<div class="price">
								<span>от</span> 
								<? echo $school->courses[0]->getLowestPrice() .' '. $school->currency;  ?>
								<span>/ нед</span>
							</div>
							<a href="/school?id=<?= $school->col_id ?>" class="view">Смотреть курсы</a>
						</div>
					</div>'

				<?php endforeach ?>
			</div>
		<? endif; ?>
	</div> <!-- /.wrap -->
</section>