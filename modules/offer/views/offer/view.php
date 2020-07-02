<?php
/* @var $this yii\web\View */
?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Home</a>
		<a href="/offers">Offers</a>
		<span><?= $offer->col_title_en ?></span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<div id="other-pages">
	<div class="wrap">
		<h1 class="page-title"><?= $offer->col_title_en ?></h1>
		<div class="content">
			<div class="article-img">
				<img src="/img/offers/<?= $offer->col_img ?>" alt="<?= $offer->col_title_en ?>" title="<?= $offer->col_title_en ?>">
			</div>
			<div class="article-text">
				<?= $offer->col_text_en ?>
			</div>
		</div>
	</div> <!-- /.wrap -->
</div> <!-- /#other-pages -->
