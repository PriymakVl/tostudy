<?php 
	
	$languages = array_slice(Yii::$app->params['languages'], 0, 5);

 ?>

<footer id="footer">
	<div class="wrap">
		<div class="row">
			<div>
				<h3>Languages</h3>
				<ul>
					<?php foreach ($languages as $lang): ?>
						<li>
							<a href="/countries/<?= $lang->col_alias ?>" class="link"><?= $lang->col_title_en ?></a>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
			<div>
				<h3>To customers</h3>
				<ul>
					<li><a href="/info" class="link">Useful information</a></li>
					<li><a href="/news" class="link">News</a></li>
					<li><a href="/insurance" class="link">Insurance</a></li>
					<li><a href="/order" class="link">Order</a></li>
				</ul>
			</div>
			<div>
				<h3>About us</h3>
				<ul>
					<li><a href="/contacts" class="link">Contacts</a></li>
					<li><a href="/about" class="link">About us</a></li>
					<li><a href="/reviews" class="link">Reviews</a></li>
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
							Vk
							<?= Yii::$app->svg->get('in-contact') ?>
						</a>
					</li>
					<li>
						<a href="https://ok.com/<?= Yii::$app->setting->get('col_ok') ?>/" target="_blank" class="link link2">
							Ok
							<?= Yii::$app->svg->get('classmates') ?>
						</a>
					</li>
				</ul>
			</div>
			<div class="contacts">
				<ul>
					<li><a href="mailto:<?=$row_st['col_email']?>" class="link email"><?= Yii::$app->setting->get('col_email') ?></a></li>
				</ul>
				<a href="#" class="btn btn2 js-open-modal" data-modal-id="#js-modal-question">Ask a question</a>
				<div class="social-network">
					<a href="viber://add?number=<?=str_replace('+', '', Yii::$app->setting->get('col_tel'))?>" target="_blank">
						<?= Yii::$app->svg->get('phone-volume') ?>
					</a>
					<a href="whatsapp://send/?phone=<?= Yii::$app->setting->get('col_tel') ?>" target="_blank">
						<?= Yii::$app->svg->get('phone') ?>
					</a>
					<a href="https://t.me/<?= Yii::$app->setting->get('col_telegram') ?>" target="_blank">
						<?= Yii::$app->svg->get('paper-plan') ?>
					</a>
				</div> <!-- /.social-network -->
			</div>
		</div> <!-- /.row -->
		<div class="row">
			<div class="info">Study abroad with tostudy © <?=date('Y')?></div>
		</div> <!-- /.row -->
	</div> <!-- /.wrap -->
</footer> <!-- /#footer -->

</div> <!-- /.wrapper -->
