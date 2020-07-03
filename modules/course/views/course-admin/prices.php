<div class="input">
	<label class="input__label input__label2">
		<div>Цена</div>
		<div>
			<a href="#" class="icon2" id="js-price-add">
				<i class="fas fa-plus-circle"></i>
			</a>
		</div>
	</label>
	<div id="js-price-group">
		<?php if ($prices): ?>
			<?php foreach ($prices as $week => $price): ?>
				<div class="input-group js-group">
					<input class="input__field js-weeks" type="text" value="<?= $week ?>" placeholder="Недель">
					<input class="input__field js-price" type="text" value="<?= $price ?>" placeholder="Цена за неделю">
					<a href="#" class="icon2 js-price-del" id="js-price-delete">
						<i class="far fa-trash-alt"></i>
					</a>
				</div>
			<?php endforeach ?>
		<?php endif ?>
	</div>
</div>