<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<span>Отзывы</span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<section class="reviews-page">
	<div class="wrap">
		<h1 class="page-title">Отзывы наших клиентов</h1>
		<?php if ($reviews): ?>
			<?php foreach ($reviews as $review): ?>
				<div class="review">
					<div class="avatar"><?= $review->avatar ?></div>
					<div class="name"><?= $review->username ?></div>
					<time class="date js-date" data-locale="ru"><?= $review->col_date ?></time>
					<div class="description"><?= $review->comment ?></div>
				</div>
			<?php endforeach ?>
		<?php endif ?>
	</div> <!-- /.wrap -->
</section> <!-- /.section-reviews -->