<?php
/* @var $this yii\web\View */
?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<span>Новости</span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<div class="articles">
	<div class="wrap">
		<h1 class="page-title">Новости</h1>
		<div class="content">
			<?php if ($articles): ?>
				<?php foreach ($articles as $article): ?>
					<a href="/article?id=<?= $article->col_id ?>" class="articles-item">
						<img src="img/articles/<?= $article->col_img ?>" alt="<?= $article->col_title_ru ?>" title="<?= $article->col_title_ru ?>">
						<h2><?= $article->col_title_ru ?></h2>
					</a>
				<?php endforeach ?>
			<?php endif ?>
		</div>
	</div> <!-- /.wrap -->
</div> <!-- /.articles -->
