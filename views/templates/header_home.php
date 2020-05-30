<header id="header" class="home">
	<div class="topline row2">
		<div class="column-left row2">
			<a href="/" class="logo">to<span>study</span></a>
			<ul class="nav row2">
				<li class="link">
					<a href="/about.php"><?=$ini_file['nav']['link1']?></a>
				</li>
				<li class="link sel">
					<a href="/schools.php"><?=$ini_file['nav']['link2']?></a>
					<ul class="form-select">
						<li><a href="/schools.php?sub_cat=0"><?=$ini_file['nav']['link2_1']?></a></li>
						<li><a href="/schools.php?sub_cat=1"><?=$ini_file['nav']['link2_2']?></a></li>
						<li><a href="/schools.php?sub_cat=2"><?=$ini_file['nav']['link2_3']?></a></li>
					</ul> <!-- /.form-select -->
				</li> <!-- /.link -->
				<li class="link sel">
					<a href="/info.php"><?=$ini_file['nav']['link3']?></a>
					<ul class="form-select">
						<li><a href="/info.php"><?=$ini_file['nav']['link3']?></a></li>
						<li><a href="/news.php"><?=$ini_file['nav']['link8']?></a></li>
					</ul> <!-- /.form-select -->
				</li> <!-- /.link -->
				<li class="link">
					<a href="/insurance.php"><?=$ini_file['nav']['link4']?></a>
				</li>
				<li class="link">
					<a href="/how_to_order.php"><?=$ini_file['nav']['link5']?></a>
				</li>
				<li class="link">
					<a href="/reviews.php"><?=$ini_file['nav']['link6']?></a>
				</li>
				<li class="link">
					<a href="/contacts.php"><?=$ini_file['nav']['link7']?></a>
				</li>
			</ul> <!-- /.nav -->
		</div> <!-- /.column-left -->
		<div class="column-right row2">
			<a href="#" class="btn btn2 js-open-modal" data-modal-id="#js-modal-question"><?=$ini_file['header']['btn']?></a>
			<div class="language">
				<div class="selected js-open-form-select" id="js-language-site" data-id="#js-form-language-site">
					<span class="js-selected"><?=$_SESSION['locale']?></span>
					<img class="js-flag" src="/img/<?=$_SESSION['locale']?>.jpg" alt="">
				</div>
				<ul id="js-form-language-site" class="form-select js-form-select" data-redirect="<?=$_SERVER['REQUEST_URI']?>">
					<li class="js-language-site" data-locale="en">EN</li>
					<li class="js-language-site" data-locale="es">ES</li>
					<li class="js-language-site" data-locale="ua">UA</li>
					<li class="js-language-site" data-locale="ru">RU</li>
					<li class="js-language-site" data-locale="cn">CN</li>
				</ul>
			</div> <!-- /.language -->
			<svg class="menu-toggle" id="js-menu-open" width="24" height="16" viewBox="0 0 24 16" fill="#1a1a1c" xmlns="http://www.w3.org/2000/svg">
				<path d="M0 2H24V0H0V2ZM-7.94729e-08 9L24 9V7L7.94729e-08 7L-7.94729e-08 9ZM-7.94729e-08 16L24 16V14L7.94729e-08 14L-7.94729e-08 16Z"></path>
			</svg>
		</div> <!-- /.column-right -->
	</div> <!-- /.topline -->

	<div class="content">
		<h1 class="title"><?=$ini_file['header']['title']?></h1>
		<div class="subtitle"><?=$ini_file['header']['subtitle']?></div>
		
		<form action="/search.php" method="get" class="form">
			<div>
				<div class="input__field input__select js-open-form-select" data-id="#js-form-language">
					<span class="js-selected"><?=$ini_file['search']['language']?></span>
					<?=$svg['arrow']?>
					<ul id="js-form-language" class="form-select js-form-select">
						<li class="js-language-option" data-value="0"><?=$ini_file['search']['option_all']?></li>
						<?=$languages?>
					</ul> <!-- /.form-select -->
				</div> <!-- /.input__field -->

				<div class="input__field input__select js-open-form-select" data-id="#js-form-country">
					<span class="js-selected"><?=$ini_file['search']['country']?></span>
					<?=$svg['arrow']?>
					<ul id="js-form-country" class="form-select js-form-select">
						<li class="js-country-option" data-value="0"><?=$ini_file['search']['option_all']?></li>
						<?=$countries?>
					</ul> <!-- /.form-select -->
				</div> <!-- /.input__field -->
				
				<div class="input__field input__select js-open-form-select" data-id="#js-form-city">
					<span class="js-selected"><?=$ini_file['search']['city']?></span>
					<?=$svg['arrow']?>
					<ul id="js-form-city" class="form-select js-form-select">
						<li class="js-city-option" data-value="0"><?=$ini_file['search']['option_all']?></li>
						<?=$cities?>
					</ul> <!-- /.form-select -->
				</div> <!-- /.input__field -->
			</div>
			
			<div>
				<input type="hidden" name="language" value="" id="js-search-language">
				<input type="hidden" name="country" value="" id="js-search-country">
				<input type="hidden" name="city" value="" id="js-search-city">
				<div class="input__field">
					<input type="text" placeholder="<?=$ini_file['search']['school']?>" name="school">
				</div>
				<button type="submit" class="btn"><?=$ini_file['search']['btn']?></button>
			</div>
		</form> <!-- /.form -->
	</div> <!-- /.content -->

	<div class="scroll-down js-get-section" data-section="#js-why-us"><span><?=$ini_file['header']['scroll_down']?></span><i></i></div>

	<div class="social-network2">
		<a href="https://www.facebook.com/<?=$row_st['col_facebook']?>/" target="_blank">
			<svg width="16" height="16" viewBox="0 0 16 16" fill="#262626" xmlns="http://www.w3.org/2000/svg">
				<path d="M16 15.1169C16 15.6045 15.6046 16 15.117 16H11.0398V9.80396H13.1195L13.4309 7.38916H11.0397V5.84741C11.0397 5.14844 11.2338 4.67188 12.2364 4.67188L13.5151 4.67139V2.51172C13.2939 2.48218 12.5348 2.4165 11.6519 2.4165C9.80823 2.4165 8.54605 3.54175 8.54605 5.6084V7.38916H6.46097V9.80396H8.54605V16H0.883057C0.395233 16 0 15.6045 0 15.1169V0.883057C0 0.395264 0.395233 0 0.883057 0H15.117C15.6046 0 16 0.395264 16 0.883057V15.1169Z"></path>
			</svg>
		</a>
		<a href="https://www.instagram.com/<?=$row_st['col_instagram']?>/" target="_blank">
			<svg width="16" height="16" viewBox="0 0 16 16" fill="#262626" xmlns="http://www.w3.org/2000/svg">
				<path d="M5.33397 8C5.33397 6.5273 6.52756 5.33312 8.00032 5.33312C9.47308 5.33312 10.6673 6.5273 10.6673 8C10.6673 9.4727 9.47308 10.6669 8.00032 10.6669C6.52756 10.6669 5.33397 9.4727 5.33397 8ZM3.89225 8C3.89225 10.2688 5.73143 12.1079 8.00032 12.1079C10.2692 12.1079 12.1084 10.2688 12.1084 8C12.1084 5.7312 10.2692 3.8921 8.00032 3.8921C5.73143 3.8921 3.89225 5.7312 3.89225 8ZM11.311 3.72922C11.3109 3.91909 11.3671 4.10471 11.4726 4.26263C11.578 4.42054 11.7279 4.54365 11.9033 4.61638C12.0787 4.68911 12.2717 4.7082 12.4579 4.67123C12.6442 4.63426 12.8153 4.5429 12.9496 4.40869C13.0839 4.27449 13.1754 4.10347 13.2125 3.91726C13.2497 3.73106 13.2307 3.53802 13.1581 3.36258C13.0855 3.18713 12.9625 3.03715 12.8047 2.9316C12.6469 2.82605 12.4613 2.76968 12.2714 2.7696C12.0169 2.76972 11.7724 2.87085 11.5924 3.05077C11.4124 3.2307 11.3112 3.47471 11.311 3.72922ZM4.76819 14.5118C3.98819 14.4763 3.56424 14.3464 3.2825 14.2366C2.90898 14.0912 2.64247 13.918 2.36227 13.6382C2.08207 13.3584 1.90862 13.0922 1.76385 12.7187C1.65402 12.4371 1.52409 12.013 1.48864 11.233C1.44985 10.3898 1.44211 10.1364 1.44211 8.00006C1.44211 5.86368 1.45049 5.61107 1.48864 4.7671C1.52416 3.98714 1.65504 3.5639 1.76385 3.28147C1.90926 2.90797 2.08245 2.64147 2.36227 2.36128C2.64209 2.08109 2.90834 1.90765 3.2825 1.76288C3.56411 1.65306 3.98819 1.52314 4.76819 1.48768C5.61149 1.4489 5.86481 1.44115 8.00032 1.44115C10.1358 1.44115 10.3894 1.44954 11.2334 1.48768C12.0134 1.5232 12.4367 1.65408 12.7191 1.76288C13.0926 1.90765 13.3591 2.08147 13.6393 2.36128C13.9195 2.64109 14.0923 2.90797 14.2378 3.28147C14.3476 3.56307 14.4775 3.98714 14.513 4.7671C14.5518 5.61107 14.5595 5.86368 14.5595 8.00006C14.5595 10.1364 14.5518 10.3891 14.513 11.233C14.4774 12.013 14.3469 12.4369 14.2378 12.7187C14.0923 13.0922 13.9192 13.3587 13.6393 13.6382C13.3595 13.9178 13.0926 14.0912 12.7191 14.2366C12.4375 14.3464 12.0134 14.4764 11.2334 14.5118C10.3901 14.5506 10.1368 14.5583 8.00032 14.5583C5.86385 14.5583 5.61123 14.5506 4.76819 14.5118ZM4.70195 0.048448C3.85027 0.087232 3.26829 0.222272 2.76005 0.420032C2.23369 0.624256 1.7881 0.89824 1.34284 1.34278C0.897572 1.78733 0.624281 2.2336 0.420049 2.75994C0.222281 3.26848 0.0872355 3.85011 0.0484499 4.70176C0.00902436 5.55475 0 5.82746 0 8C0 10.1725 0.00902436 10.4452 0.0484499 11.2982C0.0872355 12.15 0.222281 12.7315 0.420049 13.2401C0.624281 13.7661 0.897636 14.2129 1.34284 14.6572C1.78804 15.1016 2.23369 15.3752 2.76005 15.58C3.26925 15.7777 3.85027 15.9128 4.70195 15.9516C5.55542 15.9903 5.82769 16 8.00032 16C10.173 16 10.4457 15.991 11.2987 15.9516C12.1504 15.9128 12.732 15.7777 13.2406 15.58C13.7666 15.3752 14.2125 15.1018 14.6578 14.6572C15.1031 14.2127 15.3758 13.7661 15.5806 13.2401C15.7784 12.7315 15.914 12.1499 15.9522 11.2982C15.991 10.4446 16 10.1725 16 8C16 5.82746 15.991 5.55475 15.9522 4.70176C15.9134 3.85005 15.7784 3.26816 15.5806 2.75994C15.3758 2.23392 15.1024 1.78803 14.6578 1.34278C14.2132 0.897536 13.7666 0.624256 13.2412 0.420032C12.732 0.222272 12.1504 0.086592 11.2993 0.048448C10.4463 0.009664 10.1736 0 8.00096 0C5.82833 0 5.55542 0.009024 4.70195 0.048448Z"></path>
				<path d="M5.33397 8C5.33397 6.5273 6.52756 5.33312 8.00032 5.33312C9.47308 5.33312 10.6673 6.5273 10.6673 8C10.6673 9.4727 9.47308 10.6669 8.00032 10.6669C6.52756 10.6669 5.33397 9.4727 5.33397 8ZM3.89225 8C3.89225 10.2688 5.73143 12.1079 8.00032 12.1079C10.2692 12.1079 12.1084 10.2688 12.1084 8C12.1084 5.7312 10.2692 3.8921 8.00032 3.8921C5.73143 3.8921 3.89225 5.7312 3.89225 8ZM11.311 3.72922C11.3109 3.91909 11.3671 4.10471 11.4726 4.26263C11.578 4.42054 11.7279 4.54365 11.9033 4.61638C12.0787 4.68911 12.2717 4.7082 12.4579 4.67123C12.6442 4.63426 12.8153 4.5429 12.9496 4.40869C13.0839 4.27449 13.1754 4.10347 13.2125 3.91726C13.2497 3.73106 13.2307 3.53802 13.1581 3.36258C13.0855 3.18713 12.9625 3.03715 12.8047 2.9316C12.6469 2.82605 12.4613 2.76968 12.2714 2.7696C12.0169 2.76972 11.7724 2.87085 11.5924 3.05077C11.4124 3.2307 11.3112 3.47471 11.311 3.72922ZM4.76819 14.5118C3.98819 14.4763 3.56424 14.3464 3.2825 14.2366C2.90898 14.0912 2.64247 13.918 2.36227 13.6382C2.08207 13.3584 1.90862 13.0922 1.76385 12.7187C1.65402 12.4371 1.52409 12.013 1.48864 11.233C1.44985 10.3898 1.44211 10.1364 1.44211 8.00006C1.44211 5.86368 1.45049 5.61107 1.48864 4.7671C1.52416 3.98714 1.65504 3.5639 1.76385 3.28147C1.90926 2.90797 2.08245 2.64147 2.36227 2.36128C2.64209 2.08109 2.90834 1.90765 3.2825 1.76288C3.56411 1.65306 3.98819 1.52314 4.76819 1.48768C5.61149 1.4489 5.86481 1.44115 8.00032 1.44115C10.1358 1.44115 10.3894 1.44954 11.2334 1.48768C12.0134 1.5232 12.4367 1.65408 12.7191 1.76288C13.0926 1.90765 13.3591 2.08147 13.6393 2.36128C13.9195 2.64109 14.0923 2.90797 14.2378 3.28147C14.3476 3.56307 14.4775 3.98714 14.513 4.7671C14.5518 5.61107 14.5595 5.86368 14.5595 8.00006C14.5595 10.1364 14.5518 10.3891 14.513 11.233C14.4774 12.013 14.3469 12.4369 14.2378 12.7187C14.0923 13.0922 13.9192 13.3587 13.6393 13.6382C13.3595 13.9178 13.0926 14.0912 12.7191 14.2366C12.4375 14.3464 12.0134 14.4764 11.2334 14.5118C10.3901 14.5506 10.1368 14.5583 8.00032 14.5583C5.86385 14.5583 5.61123 14.5506 4.76819 14.5118ZM4.70195 0.048448C3.85027 0.087232 3.26829 0.222272 2.76005 0.420032C2.23369 0.624256 1.7881 0.89824 1.34284 1.34278C0.897572 1.78733 0.624281 2.2336 0.420049 2.75994C0.222281 3.26848 0.0872355 3.85011 0.0484499 4.70176C0.00902436 5.55475 0 5.82746 0 8C0 10.1725 0.00902436 10.4452 0.0484499 11.2982C0.0872355 12.15 0.222281 12.7315 0.420049 13.2401C0.624281 13.7661 0.897636 14.2129 1.34284 14.6572C1.78804 15.1016 2.23369 15.3752 2.76005 15.58C3.26925 15.7777 3.85027 15.9128 4.70195 15.9516C5.55542 15.9903 5.82769 16 8.00032 16C10.173 16 10.4457 15.991 11.2987 15.9516C12.1504 15.9128 12.732 15.7777 13.2406 15.58C13.7666 15.3752 14.2125 15.1018 14.6578 14.6572C15.1031 14.2127 15.3758 13.7661 15.5806 13.2401C15.7784 12.7315 15.914 12.1499 15.9522 11.2982C15.991 10.4446 16 10.1725 16 8C16 5.82746 15.991 5.55475 15.9522 4.70176C15.9134 3.85005 15.7784 3.26816 15.5806 2.75994C15.3758 2.23392 15.1024 1.78803 14.6578 1.34278C14.2132 0.897536 13.7666 0.624256 13.2412 0.420032C12.732 0.222272 12.1504 0.086592 11.2993 0.048448C10.4463 0.009664 10.1736 0 8.00096 0C5.82833 0 5.55542 0.009024 4.70195 0.048448Z"></path>
			</svg>
		</a>
		<a href="https://vk.com/<?=$row_st['col_vk']?>/" target="_blank"> 
			<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" fill="#262626"><path d="M898.1,10H101.9C51.3,10,10,51.3,10,101.9v796.3c0,50.5,41.3,91.9,91.9,91.9h796.3c50.5,0,91.9-41.3,91.9-91.9V101.9C990,51.3,948.7,10,898.1,10z M803.8,696l-89.6,1.3c0,0-19.3,3.8-44.6-13.6c-33.5-23-65.1-82.9-89.8-75c-24.9,7.9-24.1,61.6-24.1,61.6s0.2,11.5-5.5,17.6c-6.1,6.7-18.4,8-18.4,8h-40c0,0-88.4,5.4-166.3-75.8c-85-88.4-160-264-160-264s-4.4-11.5,0.4-17c5.4-6.3,19.7-6.7,19.7-6.7l95.9-0.6c0,0,9,1.5,15.5,6.3c5.4,3.8,8.2,11.3,8.2,11.3s15.5,39.2,36,74.6c40,69.1,58.8,84.2,72.4,76.9c19.7-10.7,13.8-97.8,13.8-97.8s0.4-31.6-10-45.6c-8-10.9-23.2-14.2-29.7-14.9c-5.4-0.8,3.4-13.2,14.9-19c17.2-8.4,47.7-9,83.6-8.6c27.9,0.2,36.2,2.1,47.1,4.6c33.1,8,21.8,38.9,21.8,112.7c0,23.7-4.2,57,12.8,68c7.3,4.8,25.3,0.8,70.2-75.6c21.3-36.2,37.3-78.7,37.3-78.7s3.4-7.7,8.8-10.9c5.5-3.2,13-2.3,13-2.3l100.9-0.6c0,0,30.2-3.6,35.2,10.2c5.2,14.4-11.3,47.9-52.4,102.8c-67.6,90.2-75.2,81.7-18.9,133.8c53.6,49.8,64.7,74.1,66.6,77.1C850.4,693.1,803.7,696,803.8,696L803.8,696z"/></svg>
		</a>
		<a href="https://ok.com/<?=$row_st['col_ok']?>/" target="_blank"> 
			<svg width="16" height="16" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1000 1000" fill="#262626"><path d="M500.5,401.9c54.7-0.2,98.3-44.1,98.1-98.9c-0.2-54.8-43.9-98.5-98.6-98.5c-55.2-0.1-99.3,44.4-98.8,99.7C401.6,358.8,445.7,402.1,500.5,401.9z"/><path d="M937.9,10H62.1C33.3,10,10,33.3,10,62.1v875.7c0,28.8,23.3,52.1,52.1,52.1h875.7c28.8,0,52.1-23.3,52.1-52.1V62.1C990,33.3,966.7,10,937.9,10z M500.8,101.4c111.5,0.3,201.1,91.5,200.5,204.4c-0.6,110.2-91.6,199.5-203,199.1c-110.3-0.4-200.7-91.8-200-202.2C299,191,389.5,101.1,500.8,101.4z M726.8,584.2c-24.7,25.3-54.4,43.6-87.3,56.5c-31.2,12.1-65.3,18.2-99.2,22.2c5.1,5.6,7.5,8.3,10.7,11.5c45.9,46.1,92,92.1,137.8,138.4c15.6,15.8,18.9,35.3,10.3,53.6c-9.4,20.1-30.4,33.2-51,31.8c-13.1-0.9-23.2-7.4-32.3-16.5c-34.7-34.9-70-69.1-103.9-104.6c-9.9-10.3-14.6-8.4-23.4,0.6c-34.9,35.9-70.3,71.2-105.9,106.3c-16,15.8-35,18.6-53.6,9.6c-19.7-9.6-32.3-29.7-31.3-49.9c0.7-13.7,7.4-24.1,16.8-33.5c45.4-45.4,90.7-90.8,136.1-136.3c3-3,5.8-6.2,10.2-10.9c-61.8-6.5-117.5-21.7-165.2-59c-5.9-4.6-12-9.1-17.5-14.3c-20.9-20.1-23-43-6.4-66.7c14.1-20.2,37.9-25.7,62.5-14.1c4.8,2.2,9.3,5.1,13.7,8.1c88.9,61.1,211.1,62.8,300.3,2.8c8.8-6.8,18.3-12.3,29.3-15.1c21.3-5.5,41.2,2.3,52.6,21C743.1,546.9,742.9,567.6,726.8,584.2z"/></svg>
		</a>
	</div> <!-- /.social-network -->
</header>
