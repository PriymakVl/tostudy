<?php
/* @var $this yii\web\View */
?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<a href="/info">Полезная информация</a>
		<a href="/info/country/<?= $country->col_alias ?>"><?= $country->name ?></a>
		<span><?= $article->col_title_ru ?></span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<div id="other-pages">
	<div class="wrap">
		<h1 class="page-title"><?= $article->col_title_ru ?></h1>
		<div class="content">
			<div class="article-text">
				<?= $article->col_text_ru ?>
			</div>
		</div>
	</div> <!-- /.wrap -->
</div> <!-- /#other-pages -->