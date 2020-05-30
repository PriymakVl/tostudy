<?php
/* @var $this yii\web\View */
?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<span>Каталог школ</span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->


<section class="section section-languages">
	<div class="wrap">
		<h1>Каталог школ</h1>
		<div class="languages">
			<? foreach($languages as $language): ?>
				<a href="/countries?lang_id=<?= $language->col_id ?>" class="item">
					<img src="/img/languages/<?= $language->col_img ?>" alt="<?= $language->col_title_ru ?>">
					<h3><?= $language->col_title_ru ?></h3>
					<span class="school">24 школы</span>
					<!-- количество школ и суфиксы -->
					<!-- suffixWords($arr['col_count_schools'], $ini_file['header']['locale'], true)  -->
				</a>
			<? endforeach; ?>
		</div>
	</div> <!-- /.wrap -->
</section> <!-- /.section-languages -->


