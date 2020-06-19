<div class="popup-info" id="popup-success">

	<?= Yii::$app->svg->get('check-circle') ?>

	<p><?= $message ?></p>

</div>

<script>

setTimeout(hidePopup, 10000);

function hidePopup() {
	let modal = document.getElementById('popup-success');
	modal.style.display = 'none';
}

</script>