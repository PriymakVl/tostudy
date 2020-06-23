<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<a href="/info">Полезная информация</a>
		<span><?=$country->name?>></span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<div class="info-articles">
	<div class="wrap">
		<h1 class="page-title"><?=$country->name?></h1>
		<ul class="content">
			
			<?php if ($country->info): ?>
				
				<?php foreach ($country->info as $article): ?>
					
					<li class="info-articles-item">
						<a href="/info/article/<?= $article->col_alias ?>">
							<?= $article->col_title_ru ?>
						</a>
					</li>

				<?php endforeach ?>

			<?php endif ?>

		</ul>
	</div> <!-- /.wrap -->
</div> <!-- /.info-articles -->