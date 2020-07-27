<form action="/subscribe/create">
	<div class="modal" id="js-modal-subscribe">
		<a href="#" class="close js-close" data-modal-id="#js-modal-subscribe"><?= Yii::$app->svg->getClose() ?></a>
		<h2>Подписка на рассылку</h2>
		<p>Подписываясь на рассылку вы экономите свои деньги!</p>
		
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