<?php
/* @var $this yii\web\View */
use app\modules\school\models\School;

\app\assets\PublicAsset::register($this);
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
		
		<div class="program-text">
			<?= $program->col_text_top ?>
		</div>

		<h1>Каталог</h1>
		<div class="languages">
			<? foreach($languages as $language): ?>
				<?php $count_schools = $language->countSchoolsByProgram($program->col_id); ?>
					<?php if ($count_schools): ?>
						<a href="/countries/<?= $language->col_alias ?>/<?= $program->col_alias ?>" class="item">
							<img src="/img/languages/<?= $language->col_img ?>" alt="<?= $language->col_title_ru ?>">
							<h3><?= $language->col_title_ru ?></h3>
							<span class="school"><?= School::suffixWords($count_schools, 'ru', true) ?></span>
						</a>
					<? endif; ?>
			<? endforeach; ?>
		</div>

		<div class="program-text">
			<?= $program->col_text_bottom ?>
		</div>

	</div> <!-- /.wrap -->
</section> <!-- /.section-languages -->


