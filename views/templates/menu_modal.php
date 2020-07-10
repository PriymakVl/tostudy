<?php 


?>
<div class="menu" id="js-menu">
	<a href="#" class="btn btn2 js-open-modal" data-modal-id="#js-modal-question">Задать вопрос</a>
	<ul class="links">
		<li><a href="/about.php">О нас</a></li>
		<li><a href="/info.php">Полезная информация</a></li>
		<li><a href="/news.php">Новости</a></li>
		<li><a href="/insurance.php">Страхование</a></li>
		<li><a href="/how_to_order.php">Как заказать</a></li>
		<li><a href="/reviews.php">Отзывы</a></li>
		<li><a href="/contacts.php">Контакты</a></li>
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