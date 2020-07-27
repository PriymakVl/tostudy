<?php
/* @var $this yii\web\View */
?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<span>Акции</span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<div class="articles">
	<div class="wrap">

		<div class="subscribe-wrp">
			<button class="js-open-modal btn" data-modal-id="#js-modal-subscribe">Не упусти свою скидку!</button>
		</div>

		<h1 class="page-title">Акции</h1>
		<div class="content">
			<?php if ($offers): ?>
				<?php foreach ($offers as $offer): ?>
					<!-- <a href="/offer?id=<?= $offer->col_id ?>" class="articles-item"> -->
					<a href="/offer/<?= $offer->col_alias ?>" class="articles-item">
						<img src="img/offers/<?= $offer->col_img ?>" alt="<?= $offer->col_title_ru ?>" title="<?= $offer->col_title_ru ?>">
						<h2><?= $offer->col_title_ru ?></h2>
					</a>
				<?php endforeach ?>
			<?php endif ?>
		</div>
	</div> <!-- /.wrap -->
</div> <!-- /.articles -->

<?= $this->render('@app/views/templates/modal/subscribe') ?>

