			<div class="calc" id="js-calc">
				<h2><?=$ini_file['calc']['title']?></h2>
				<label class="input__label">
					<span><?=$ini_file['calc']['course_label']?></span>
					<span class="price" id="js-course-price"></span>
				</label>
				
				<div class="input__field input__select js-open-form-select"
					 data-value="0"
					 data-school="<?=$_GET['id']?>"
					 id="js-course" data-id="#js-form-course">
					<span class="js-selected"><?=$ini_file['calc']['course_placeholder']?></span>
					<?=$svg['arrow']?>
					<ul id="js-form-course" class="form-select js-form-select">
						<?=$courses_op?>
					</ul> <!-- /.form-select -->
				</div> <!-- /.input__field -->
				
				<label class="input__label">
					<span><?=$ini_file['calc']['weeks_label']?></span>
				</label>
				
				<div class="input__field input__select js-open-form-select" data-weeks="0" id="js-weeks" data-id="#js-form-weeks">
					<span class="js-selected"><?=$ini_file['calc']['weeks_placeholder']?></span>
					<?=$svg['arrow']?>
					<ul id="js-form-weeks" class="form-select js-form-select">
						<?=$weeks_op?>
					</ul> <!-- /.form-select -->
				</div> <!-- /.input__field -->
				
				<label class="input__label">
					<span><?=$ini_file['calc']['accommodation_label']?></span>
					<span class="price" id="js-accommodation-price"></span>
				</label>
				
				<div class="input__field input__select js-open-form-select" data-value="0" data-price="0" id="js-accommodation" data-id="#js-form-accommodation">
					<span class="js-selected"><?=$ini_file['calc']['accommodation_placeholder']?></span>
					<?=$svg['arrow']?>
					<ul id="js-form-accommodation" class="form-select js-form-select">
						<?=$accommodation_op?>
					</ul> <!-- /.form-select -->
				</div> <!-- /.input__field -->
				
				<div class="registration-fee row">
					<span><?=$ini_file['calc']['registration_fee']?>:</span>
					<span class="price" id="js-registration-fee" data-price="<?=$row['col_registration_fee']?>"><?=$row['col_registration_fee'] .' '. $arr_currency[$row['col_currency']]?></span>
				</div>
				
	<!-- 			<div class="discount row">
					<span><?//=$ini_file['calc']['discount']?>:</span>
					<span class="price" id="js-discount"></span>
				</div> -->
				
				<div class="to-pay">
					<span><?=$ini_file['calc']['to_pay']?>:</span>
					<span id="js-to-pay" data-currency="<?=$arr_currency[$row['col_currency']]?>"></span>
				</div>

				<div class="action">
					<a href="#" class="btn btn2 js-open-modal" data-modal-id="#js-modal-order"><?=$ini_file['calc']['btn']?></a>
				</div>

			</div> <!-- /.calc -->