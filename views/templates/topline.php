<?php 
use app\components\ProgramComponent;

 ?>

<?php if ($home): ?>
	<div class="topline row2">
<?php else: ?>
	<div class="wrap topline row2">
<?php endif ?>
		<div class="column-left row2">
			<a href="/" class="logo">to<span>study</span></a>
			<ul class="nav row2">
				<li class="link">
					<a href="/about">About Us</a>
				</li>
				<li class="link">
					<a href="/order">Order</a>
				</li>
				<li class="link sel">
					<a href="#">Information</a>
					<ul class="form-select">
						<li><a href="/info">Useful information</a></li>
						<li><a href="/news">News</a></li>
					</ul> <!-- /.form-select -->
				</li> <!-- /.link -->
				<li class="link sel">
					<a href="#">Programs</a>
					<ul class="form-select">
						<li>
							<a href="/languages/<?= Yii::$app->program->getAlias(ProgramComponent::PROGRAM_LANGUAGE) ?>">
								<?= Yii::$app->program->getName(ProgramComponent::PROGRAM_LANGUAGE) ?>
							</a>
						</li>
						<li>
							<a href="/languages/<?= Yii::$app->program->getAlias(ProgramComponent::PROGRAM_CAMP) ?>">
								<?= Yii::$app->program->getName(ProgramComponent::PROGRAM_CAMP) ?>
							</a>
						</li>
						<li>
							<a href="/languages/<?= Yii::$app->program->getAlias(ProgramComponent::PROGRAM_HIGHER_EDUCATION) ?>">
								<?= Yii::$app->program->getName(ProgramComponent::PROGRAM_HIGHER_EDUCATION) ?>
							</a>
						</li>
						<li>
							<a href="/languages/<?= Yii::$app->program->getAlias(ProgramComponent::PROGRAM_SECONDARY_EDUCATION) ?>">
								<?= Yii::$app->program->getName(ProgramComponent::PROGRAM_SECONDARY_EDUCATION) ?>
							</a>
						</li>
						<li>
							<a href="/languages/<?= Yii::$app->program->getAlias(ProgramComponent::PROGRAM_ONLINE_COURSE) ?>">
								<?= Yii::$app->program->getName(ProgramComponent::PROGRAM_ONLINE_COURSE) ?>
							</a>
						</li>
						<li>
							<a href="/languages/<?= Yii::$app->program->getAlias(ProgramComponent::PROGRAM_INTERNSHIPS) ?>">
								<?= Yii::$app->program->getName(ProgramComponent::PROGRAM_INTERNSHIPS) ?>
							</a>
						</li>
					</ul> <!-- /.form-select -->
				</li> <!-- /.link -->
				<li class="link">
					<a href="/offers">Offers</a>
				</li>
				<li class="link">
					<a href="/insurance">Insurance</a>
				</li>
				<li class="link">
					<a href="/reviews">Reviews</a>
				</li>
				<li class="link">
					<a href="/contacts">Contacts</a>
				</li>
			</ul> <!-- /.nav -->
		</div> <!-- /.column-left -->
		<div class="column-right row2">
			<div class="language">
				<div class="selected js-open-form-select" id="js-language-site" data-id="#js-form-language-site">
					<span class="js-selected">En</span>
					<img class="js-flag" src="/img/locales/en.jpg" alt="">
				</div>
			</div> <!-- /.language -->
			<svg class="menu-toggle" id="js-menu-open" width="24" height="16" viewBox="0 0 24 16" fill="#1a1a1c" xmlns="http://www.w3.org/2000/svg">
				<path d="M0 2H24V0H0V2ZM-7.94729e-08 9L24 9V7L7.94729e-08 7L-7.94729e-08 9ZM-7.94729e-08 16L24 16V14L7.94729e-08 14L-7.94729e-08 16Z"></path>
			</svg>
		</div> <!-- /.column-right -->
	</div> <!-- /.topline -->