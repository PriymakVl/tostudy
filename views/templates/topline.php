<div class="wrap topline row2">
		<div class="column-left row2">
			<a href="/" class="logo">to<span>study</span></a>
			<ul class="nav row2">
				<li class="link">
					<a href="/about">О нас</a>
				</li>
				<li class="link sel">
					<a href="#">Программы</a>
					<ul class="form-select">
						<li>
							<a href="/languages?program=<?= Yii::$app->program->get('language') ?>">Языковые курсы</a>
						</li>
						<li>
							<a href="/languages?program=<?= Yii::$app->program->get('camp') ?>">Летние программы и лагеря для детей</a>
						</li>
						<li>
							<a href="/languages?program=<?= Yii::$app->program->get('higher') ?>">Высшее и последипломное образование</a>
						</li>
					</ul> <!-- /.form-select -->
				</li> <!-- /.link -->
				<li class="link">
					<!-- <a href="/info">Полезная информация</a> -->
					<a href="/news">Новости</a>
					<!-- <ul class="form-select">
						<li><a href="/info">Полезная информация</a></li>
						<li><a href="/news">Новости</a></li>
					</ul> --> <!-- /.form-select -->
				</li> <!-- /.link -->
				<li class="link">
					<a href="/actions">Акции</a>
				</li>
				<li class="link">
					<a href="/insurance">Страхование</a>
				</li>
				<li class="link">
					<a href="/order">Как заказать</a>
				</li>
				<li class="link">
					<a href="/reviews">Отзывы</a>
				</li>
				<li class="link">
					<a href="/contacts">Контакты</a>
				</li>
			</ul> <!-- /.nav -->
		</div> <!-- /.column-left -->
		<div class="column-right row2">
			<a href="#" class="btn btn2 js-open-modal" data-modal-id="#js-modal-question"><?=$ini_file['header']['btn']?></a>
			<div class="language">
				<div class="selected js-open-form-select" id="js-language-site" data-id="#js-form-language-site">
					<span class="js-selected">Ru</span>
					<img class="js-flag" src="/img/locales/ru.jpg" alt="">
				</div>
				<ul id="js-form-language-site" class="form-select js-form-select" data-redirect="<?=$_SERVER['REQUEST_URI']?>">
					<li class="js-language-site" data-locale="en">EN</li>
					<li class="js-language-site" data-locale="es">ES</li>
					<!-- <li class="js-language-site" data-locale="ua">UA</li> -->
					<li class="js-language-site" data-locale="ru">RU</li>
					<!-- <li class="js-language-site" data-locale="cn">CN</li>	 -->
				</ul>
			</div> <!-- /.language -->
			<svg class="menu-toggle" id="js-menu-open" width="24" height="16" viewBox="0 0 24 16" fill="#1a1a1c" xmlns="http://www.w3.org/2000/svg">
				<path d="M0 2H24V0H0V2ZM-7.94729e-08 9L24 9V7L7.94729e-08 7L-7.94729e-08 9ZM-7.94729e-08 16L24 16V14L7.94729e-08 14L-7.94729e-08 16Z"></path>
			</svg>
		</div> <!-- /.column-right -->
	</div> <!-- /.topline -->