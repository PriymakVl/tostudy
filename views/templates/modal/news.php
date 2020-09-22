<form action="/subscribe/create">
	<div class="modal" id="js-modal-subscribe">
		<a href="#" class="close js-close" data-modal-id="#js-modal-subscribe"><?= Yii::$app->svg->getClose() ?></a>
		<h2>Подписка на новости</h2>
		<p>Подписывайтесь и будьте в курсе последних новостей в мире образования за рубежом и скидок на обучение за границей</p>
		
		<label class="input__label">Имя</label>
		<div class="input__field">
			<input type="text" id="js-username-feedback-modal" name="col_name">
		</div>
		<label class="input__label">Email</label>
		<div class="input__field">
			<input type="email" required id="js-email-feedback-modal" name="col_email">
		</div>
		<div class="action">
			<input type="submit" value="Подписаться" class="btn">
		</div>
</div> <!-- /.modal -->
</form>