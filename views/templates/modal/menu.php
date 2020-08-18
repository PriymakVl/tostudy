<?php 


?>
<div class="menu" id="js-menu">

	<?//= $this->render('feedback') ?>

	<ul class="links">
		<li><a href="/about">О нас</a></li>
	</ul>

	<div class="catalog">
		<h4 class="active js-show-hidden" data-hidden="#js-catalog">
			Программы
			<?= Yii::$app->svg->getArrowTop() ?>
		</h4>
		<ul id="js-catalog">
			<?php foreach ($programs as $program): ?>
				<li>
					<a href="/languages/<?= $program->col_alias ?>">
						<?= $program->col_name ?>
					</a>
				</li>
			<?php endforeach ?>
		</ul>
	</div> <!-- /.catalog -->
	<br>
	<ul class="links">
		<li><a href="/info">Полезная информация</a></li>
		<li><a href="/news">Новости</a></li>
		<li><a href="/offers">Акции</a></li>
		<li><a href="/insurance">Страхование</a></li>
		<li><a href="/order">Как заказать</a></li>
		<li><a href="/reviews">Отзывы</a></li>
		<li><a href="/contacts">Контакты</a></li>
	</ul>
						
	<ul class="contacts">
		<li><a href="mailto:" class="link email">info@tostudy.pro</a></li>
	</ul>		
	<div class="social-network">
		<a href="viber:" target="_blank">
			<?= Yii::$app->svg->getPhoneVolume() ?>
		</a>
		<a href="whatsapp:" target="_blank">
			<?= Yii::$app->svg->getPhone() ?>
		</a>
		<a href="https://t.me/" target="_blank">
			<?= Yii::$app->svg->getPaperPlan() ?>
		</a>
	</div> <!-- /.social-network -->
</div> <!-- /.menu -->