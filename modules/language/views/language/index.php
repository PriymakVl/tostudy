<?php
/* @var $this yii\web\View */
use app\modules\school\models\School;
?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<span>Языки</span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->


<section class="section section-languages">
	<div class="wrap">

		<?= app\widgets\Info::widget(['language' => false]) ?>

		<h1>Каталог школ</h1>
		<div class="languages">
			<? foreach($languages as $language): ?>
				<?php $count_schools = $language->countSchoolsByProgram($program); ?>
					<?php if ($count_schools): ?>
						<a href="/countries/<?= $language->col_alias ?>" class="item">
							<img src="/img/languages/<?= $language->col_img ?>" alt="<?= $language->col_title_ru ?>">
							<h3><?= $language->col_title_ru ?></h3>
							<span class="school"><?= School::suffixWords($count_schools, 'ru', true) ?></span>
						</a>
					<? endif; ?>
			<? endforeach; ?>
		</div>
	</div> <!-- /.wrap -->
</section> <!-- /.section-languages -->


