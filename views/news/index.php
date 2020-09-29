<?php
/* @var $this yii\web\View */

$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css');

?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<span>Новости</span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<div class="articles">
	<div class="wrap">

		<div class="subscribe-wrp">
			<button class="animate__animated animate__bounce js-open-modal btn btn-news-subscribe" data-modal-id="#js-modal-subscribe">Подписывайтесь и будьте в курсе последних новостей в мире образования за рубежом и скидок на обучение за границей!</button>
		</div>

		<h1 class="page-title">Новости</h1>
		<div class="content">
			<?php if ($articles): ?>
				<?php foreach ($articles as $article): ?>
					<a href="/article/<?= $article->col_alias ?>" class="articles-item">
						<img src="img/articles/<?= $article->col_img ?>" alt="<?= $article->col_title_ru ?>" title="<?= $article->col_title_ru ?>">
						<h2><?= $article->col_title_ru ?></h2>
					</a>
				<?php endforeach ?>
			<?php endif ?>
		</div>
	</div> <!-- /.wrap -->
</div> <!-- /.articles -->

<?= $this->render('@app/views/templates/modal/news') ?>
