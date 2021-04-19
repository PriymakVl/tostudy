<?php 
	
	$languages = array_slice(Yii::$app->params['languages'], 0, 5);

 ?>

<footer id="footer">
	<div class="wrap">
		<div class="row">
			<div>
				<h3>Языки</h3>
				<ul>
					<?php foreach ($languages as $lang): ?>
						<li>
							<a href="/countries?lang_id=<?= $lang->col_id ?>" class="link"><?= $lang->col_title_ru ?></a>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
			<div>
				<h3>Клиентам</h3>
				<ul>
					<li><a href="/info" class="link">Полезная информация</a></li>
					<li><a href="/news" class="link">Новости</a></li>
					<li><a href="/insurance" class="link">Страхование</a></li>
					<li><a href="/order" class="link">Как заказать</a></li>
				</ul>
			</div>
			<div>
				<h3>О нас</h3>
				<ul>
					<li><a href="/contacts" class="link">Контакты</a></li>
					<li><a href="/about" class="link">О нас</a></li>
					<li><a href="/reviews" class="link">Отзывы</a></li>
					<li>
						<a href="https://www.facebook.com/<?= Yii::$app->setting->get('col_facebook') ?>/" target="_blank" class="link link2">
							Facebook 
							<?= Yii::$app->svg->get('facebook') ?>
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/<?= Yii::$app->setting->get('col_instagram') ?>/" target="_blank" class="link link2">
							Instagram
							<?= Yii::$app->svg->get('instagram') ?>
						</a>
					</li>
					<li>
						<a href="https://vk.com/<?= Yii::$app->setting->get('col_vk') ?>" target="_blank" class="link link2">
							ВКонтакте 
							<?= Yii::$app->svg->get('in-contact') ?>
						</a>
					</li>
					<li>
						<a href="https://ok.com/<?= Yii::$app->setting->get('col_ok') ?>/" target="_blank" class="link link2">
							Однокласники 
							<?= Yii::$app->svg->get('classmates') ?>
						</a>
					</li>
				</ul>
			</div>

			<div class="contacts">
				<ul>
					<li><a href="mailto:<?=$row_st['col_email']?>" class="link email"><?= Yii::$app->setting->get('col_email') ?></a></li>
				</ul>
				
				<a href="#" class="btn btn2 js-open-modal" data-modal-id="#js-modal-question">Задать вопрос</a>

				<div class="social-network">
					<!-- viber -->
				<!-- 	<a href="viber://add?number=34722544687" target="_blank">
						<?//= Yii::$app->svg->get('phone-volume') ?>
					</a> -->
					<a href="viber://add?number=34722544687">
						<img src="https://it-land.by/wp-content/uploads/2018/10/Viber-logo.png">
					</a>
					<!-- whatsapp -->
					<a href="https://wa.me/34722544687" target="_blank">
						<?= Yii::$app->svg->get('phone') ?>
					</a>
					<!-- telegram -->
					<a href="https://t.me/@TostudyPro<?= Yii::$app->setting->get('col_telegram') ?>" target="_blank">
						<?= Yii::$app->svg->get('paper-plan') ?>
					</a>
				</div> <!-- /.social-network -->
			</div>
		</div> <!-- /.row -->
		<div class="row">
			<div class="info">Обучение за рубежом с tostudy © <?=date('Y')?></div>
		</div> <!-- /.row -->
	</div> <!-- /.wrap -->
</footer> <!-- /#footer -->

</div> <!-- /.wrapper -->

<?php echo $this->render('modal/question');
