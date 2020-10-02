<?php
/* @var $this yii\web\View */
use app\modules\school\models\School;
?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<a href="/languages/<?= $program->col_alias ?? 'all' ?>">Языки</a>
		<a href="/countries/<?= $lang->col_alias ?? 'all' ?>/<?= $program->col_alias ?>">Страны</a>
		<span><?= $country->col_title_ru ?></span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->


<section class="section section-countries">
	<div class="wrap">

		<?= app\widgets\Info::widget() ?>
		
		<h1>Города</h1>
		<div class="countries">
			<?php if ($cities): ?>
				<?php foreach ($cities as $city): ?>
					<?php $count_schools = $city->countSchoolsByProgram($program->id); ?>
					<?php if ($count_schools): ?>
						<a href="/schools/<?= $city->col_alias ?>/<?= $program->col_alias ?>" class="item">
							<img src="/img/cities/<?= $city->col_img ?>" alt="<?= $city->col_title_ru ?>" class="country">
							<div class="container">
								<h3><?= $city->col_title_ru ?></h3>
								<span class="school"><?= School::suffixWords($count_schools, 'ru', true) ?></span>
							</div>
							<span href="#" class="btn">Смотреть все школы</span>
						</a>
					<?php endif ?>
				<?php endforeach ?>
			<?php endif ?>
		</div>

	</div> <!-- /.wrap -->
</section> <!-- /.section-countries -->



<section class="section section-schools">
	<div class="wrap">
		<h2><?//=$ini_file['schools']['title']?></h2>
		<div class="schools"><?//=$schools?></div>
	</div> <!-- /.wrap -->
</section> <!-- /.section-schools -->
