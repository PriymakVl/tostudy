<div id="breadcrumbs">
	<div class="wrap">
		<a href="/"><?=$ini_file['pages']['home']?></a>
		<span><?=$ini_file['nav']['link7']?></span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<div id="contacts">
	<div class="wrap">
		<h1 class="page-title"><?=$ini_file['nav']['link7']?></h1>
		<div class="content row">
			<div class="column-left">
				<p><?=$row_st['col_address']?></p>
				<p><?=$ini_file['contacts']['tel']?>: <?=$row_st['col_tel']?></p>
				<p><?=$row_st['col_email']?></p>
				<div class="social-network">
					<a href="https://www.facebook.com/<?=$row_st['col_facebook']?>/" target="_blank">
						<?= Yii::$app->svg->get('facebook-contacts') ?>
					</a>
					<a href="https://www.instagram.com/<?=$row_st['col_instagram']?>/" target="_blank">
						<?= Yii::$app->svg->get('instagram-contacts') ?>
					</a>
					<a href="https://vk.com/<?=$row_st['col_vk']?>/" target="_blank">
						<?= Yii::$app->svg->get('vk-contacts') ?>
					</a>
					<a href="https://ok.com/<?=$row_st['col_ok']?>/" target="_blank">
						<?= Yii::$app->svg->get('ok-contacts') ?>
					</a>
				</div> <!-- /.social-network -->
				<p class="label"><?=$ini_file['contacts']['schedule']?>:</p>
				<p class="last"><?=$row_st['col_schedule']?></p>
			</div> <!-- /.column-left -->
			
			<div class="form">
				<h2><?=$ini_file['feedback']['title']?>:</h2>
				<label class="input__label"><?=$ini_file['feedback']['username']?></label>
				<div class="input__field">
					<input type="text" id="js-username-feedback">
				</div>
				<label class="input__label"><?=$ini_file['feedback']['email']?></label>
				<div class="input__field">
					<input type="email" id="js-email-feedback">
				</div>
				<label class="input__label"><?=$ini_file['feedback']['comment']?></label>
				<div class="input__field input__text last">
					<textarea id="js-comment-feedback"></textarea>
				</div>
				<a href="#" class="btn btn2" id="js-feedback"><?=$ini_file['feedback']['btn']?></a>
			</div> <!-- /.form -->
		</div> <!-- /.content -->
	</div> <!-- /.wrap -->
</div> <!-- /#contacts -->