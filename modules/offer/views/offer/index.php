<?php
/* @var $this yii\web\View */
?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Home</a>
		<span>Offers</span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<div class="articles">
	<div class="wrap">
		<h1 class="page-title">Offers</h1>
		<div class="content">
			<?php if ($offers): ?>
				<?php foreach ($offers as $offer): ?>
					<!-- <a href="/offer?id=<?= $offer->col_id ?>" class="articles-item"> -->
					<a href="/offer/<?= $offer->col_alias ?>" class="articles-item">
						<img src="img/offers/<?= $offer->col_img ?>" alt="<?= $offer->col_title_en ?>" title="<?= $offer->col_title_en ?>">
						<h2><?= $offer->col_title_en ?></h2>
					</a>
				<?php endforeach ?>
			<?php endif ?>
		</div>
	</div> <!-- /.wrap -->
</div> <!-- /.articles -->
