<?php 
use yii\helpers\Html;

$this->registerJsFile('@web/js/public/calculator.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

\app\assets\PublicAsset::register($this);
?>

<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Главная</a>
		<a href="/languages/<?= Yii::$app->program->getAlias($program) ?>">Языки</a>
		<a href="/countries/<?= $lang->col_alias ?>">Страны</a>
		<a href="/cities/<?= $school->city->country->col_alias ?>">Города</a>
		<a href="/schools/<?= $school->city->col_alias ?>">Школы</a>
		<span><?= $school->name ?></span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<section id="product">
	<div class="wrap">
		
		<img src="/img/schools/big/<?= $school->col_img ?>" alt="<?= $school->name ?>" class="photo">
		<div class="content row" id="js-row">
			
			<div class="column-left">
				<h1><?= $school->name ?></h1>

				<?php if ($school->col_pdf): ?>
					<div class="wrp-btn-pdf">
						<?= Html::a('Загрузить файл PDF', ['/pdf/' . $school->col_pdf], ['class' => 'btn btn-pdf', 'target' => '_blank']) ?>
					</div>
				<?php endif; ?>
				
				<div class="switch">
					<a href="#" class="active js-switch-tab" data-tab="1">О школе</a>
					<a href="#" class="js-switch-tab" data-tab="2">Программы</a>
					<a href="#" class="js-switch-tab" data-tab="3">Проживание</a>
				</div> <!-- /.switch -->


				<div class="switch-mob js-open-form-select" data-id="#js-form-tabs">
					<span id="js-selected">O школе</span>
					<?= Yii::$app->svg->get('arrow-bottom') ?>
					<ul id="js-form-tabs" class="form-select js-form-select">
						<li class="active js-switch-mob-tab" data-tab="1">O школе</li>
						<li class="js-switch-mob-tab" data-tab="2">Программы</li>
						<li class="js-switch-mob-tab" data-tab="3">Проживание</li>
					</ul>
				</div> <!-- /.switch-mob -->
				
				<div class="wrap-tabs">
					<div class="tab tab1" id="js-tab1"><?= $school->col_about_us_ru ?></div>	
					<div class="tab hidden tab2" id="js-tab2">
						<ul>
							<?php if ($courses): ?>
								<?php foreach ($courses as $cours): ?>
									
									<li class="item">
										<a href="#" class="question js-question" data-answer-id="#question-<?= $cours->col_id ?>">
											<?= $cours->name ?>			
											<span class="icon">
												<?= Yii::$app->svg->get('plus') ?>
											</span>
										</a>
									<div class="answer js-answer" id="question-<?= $cours->col_id ?>">
										<?= $cours->col_description_ru ?>
									</div>
									</li>

								<?php endforeach ?>
							<?php endif ?>
						</ul>
					</div>
					<div class="tab hidden tab1" id="js-tab3"><?= $school->col_residence_ru ?></div>
				</div> <!-- /.wrap-tabs -->

			</div> <!-- /.column-left -->
			
			<?= $this->render('calculator.php', compact('school', 'courses', 'accommodation', 'order')) ?>



		</div> <!-- /.content -->
	</div> <!-- /.wrap -->
</section> <!-- /#product -->