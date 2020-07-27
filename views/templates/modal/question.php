<form action="/feedback/footer">
	<div class="modal" id="js-modal-question">
		<a href="#" class="close js-close" data-modal-id="#js-modal-question"><?= Yii::$app->svg->getClose() ?></a>
		<h2>Задать вопрос</h2>
		<p>Напишите нам — и мы с Вами свяжемся для консультации</p>
		<label class="input__label">Имя</label>
		<div class="input__field">
			<input type="text" name="col_username">
		</div>
		<label class="input__label">Email</label>
		<div class="input__field">
			<input type="email"name="col_email">
		</div>
		<label class="input__label">Текст сообщения</label>
		<div class="input__field input__text last">
			<textarea name="col_comment"></textarea>
		</div>
		<div class="action">
			<input type="submit" value="Задать вопрос" class="btn">
		</div>
</div> <!-- /.modal -->
</form>