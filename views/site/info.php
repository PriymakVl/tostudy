<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<span>Полезная информация</span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->


<div class="countries-info">
	<div class="wrap">
		<h1 class="page-title">Полезная информация</h1>
		<div class="content">
			<?php if ($countries): ?>
				<?php foreach ($countries as $country): ?>

					<a href="/info_countries.php?id='. $arr['col_id'] .'" class="country-item row2">
						<img src="<?=$country->flag?>" alt="<?= $country->name ?>" class="country-item-img">
						<h3 class="country-item-title">
							<?= $country->name ?>
						</h3>
					</a>

				<?php endforeach ?>
			<?php endif ?>
		</div>
	</div> <!-- /.wrap -->
</div> <!-- /.countries-info -->