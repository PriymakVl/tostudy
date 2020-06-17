<?php
/* @var $this yii\web\View */
?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<a href="/offers">Акции</a>
		<span><?= $offer->col_title_ru ?></span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<div id="other-pages">
	<div class="wrap">
		<h1 class="page-title"><?= $offer->col_title_ru ?></h1>
		<div class="content">
			<div class="article-img">
				<img src="/img/offers/<?= $offer->col_img ?>" alt="<?= $offer->col_title_ru ?>" title="<?= $offer->col_title_ru ?>">
			</div>
			<div class="article-text">
				<?= $offer->col_text_ru ?>
			</div>
		</div>
	</div> <!-- /.wrap -->
</div> <!-- /#other-pages -->
