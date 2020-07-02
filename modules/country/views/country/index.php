<?php
/* @var $this yii\web\View */
use app\modules\school\models\School;
?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Home</a>
		<a href="/languages/<?= Yii::$app->program->getAlias($program) ?>">Languages</a>
		<span><?=$lang->col_title_en?></span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->


<section class="section section-countries">
	<div class="wrap">

		<?= app\widgets\Info::widget() ?>

		<h1>Countries</h1>
		<div class="countries">
			<?php if ($countries): ?>
				<?php foreach ($countries as $country): ?>
					<?php $count_schools = $country->countSchoolsByProgram($program); ?>
					<?php if ($count_schools): ?>
						<a href="/cities/<?=$country->alias?>" class="item">
							<img src="/img/countries/<?= $country->col_img ?>" alt="<?= $country->col_title_en ?>" class="country">
							<div class="container">
								<h3><?= $country->col_title_en ?></h3>
								<span class="school"><?= School::suffixWords($count_schools, 'en', true) ?></span>
							</div>
							<span href="#" class="btn">View all schools</span>
						</a>
					<? endif; ?>
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
