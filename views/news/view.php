<?php
/* @var $this yii\web\View */

$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css');

?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<a href="/news">Новости</a>
		<span><?= $article->col_title_ru ?></span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<div id="other-pages">
	<div class="wrap">

		<div class="subscribe-wrp">
			<button class="animate__animated animate__bounce js-open-modal btn" data-modal-id="#js-modal-subscribe">Подписаться на новости!</button>
		</div>

		<h1 class="page-title"><?= $article->col_title_ru ?></h1>
		<div class="content">
			<div class="article-img">
				<img src="/img/articles/<?= $article->col_img ?>" alt="<?= $article->col_title_ru ?>" title="<?= $article->col_title_ru ?>">
			</div>
			<div class="article-text">
				<?= $article->col_text_ru ?>
			</div>
		</div>
	</div> <!-- /.wrap -->
</div> <!-- /#other-pages -->

<?= $this->render('@app/views/templates/modal/news') ?>
