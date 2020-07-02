<?php
/* @var $this yii\web\View */
use app\modules\school\models\School;
?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Home</a>
		<a href="/languages/<?= Yii::$app->program->getAlias($program) ?>">Languages</a>
		<a href="/countries/<?= $lang->col_alias ?>">Countries</a>
		<span><?= $country->col_title_en ?></span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->


<section class="section section-countries">
	<div class="wrap">

		<?= app\widgets\Info::widget() ?>
		
		<h1>Cities</h1>
		<div class="countries">
			<?php if ($cities): ?>
				<?php foreach ($cities as $city): ?>
					<?php $count_schools = $city->countSchoolsByProgram($program); ?>
					<?php if ($count_schools): ?>
						<a href="/schools/<?= $city->col_alias ?>" class="item">
							<img src="/img/cities/<?= $city->col_img ?>" alt="<?= $city->col_title_ru ?>" class="country">
							<div class="container">
								<h3><?= $city->col_title_en ?></h3>
								<span class="school"><?= School::suffixWords($count_schools, 'en', true) ?></span>
							</div>
							<span href="#" class="btn">View all schools</span>
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
