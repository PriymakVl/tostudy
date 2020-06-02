var $selected; //активный (открытый) select


$(function() {
	'use strict';
	
	
	/* Выбор курса (калькулятор)
	------------------------------------------------------- */
	$('.js-course-option').on('click', function(){
		var $this = $(this),
			$value = $this.data('value');
		$selected.data('value', $value).children('.js-selected').text($this.text());
		
		//возвращаем значения списка по умолчанию
		$('.js-weeks-option').removeClass('filtered');
	
		//фильтруем элементы списков
		$('.js-weeks-option').each(function(){
			var $this = $(this);
			if ($this.data('course') !== $value) { $this.addClass('filtered'); }
		});
		
		//setTimeout(calc, 100);
		$('.js-form-select').hide();
		return false;
	});
	
	
	/* Выбор количества недель (калькулятор)
	------------------------------------------------------- */
	$('.js-weeks-option').on('click', function(){
		var $this = $(this),
			$d = $this.data();
		
		$selected.data($d).children('.js-selected').text($this.text());
		setTimeout(calc, 100);
		$('.js-form-select').hide();
		return false;
	});
	
	
	/* Выбор жилья (калькулятор)
	------------------------------------------------------- */
	$('.js-accommodation-option').on('click', function(){
		var $this = $(this),
			$d = $this.data();
		
		$selected.data($d).children('.js-selected').text($this.text());
		setTimeout(calc, 100);
		$('.js-form-select').hide();
		return false;
	});
	
	
	
	function calc() {
		var $weeks = parseInt($('#js-weeks').data('weeks')), //количество недель
			$accommodation_week = parseInt($('#js-accommodation').data('price')), //цена жилья за неделю
			$accommodation_all = 0, //цена жилья за все время
			$registration_fee = parseInt($('#js-registration-fee').data('price')), //регистрационный сбор школы
			$currency = $('#js-to-pay').data('currency'), //валюта
			$course_week = parseInt($('#js-weeks').data('price')), //цена курса за неделю
			$course_all = 0, //цена курса за все время
			$discount_per = 0, //процент скидки за курс
			$discount = 0; //скидка за курс

			return console.log($course_week);

		if ($weeks === 0) {
			return false; 
		} 
			
		$course_all = $course_week * $weeks;
		//$discount = parseInt($course_all * $discount_per / 100);
		$accommodation_all = $accommodation_week * $weeks;
		
		$('#js-course-price').text($course_all +' '+ $currency);
		$('#js-discount').text($discount +' '+ $currency);
		$('#js-accommodation-price').text($accommodation_all +' '+ $currency);
		// $('#js-to-pay').text(($course_all - $discount + $registration_fee + $accommodation_all) +' '+ $currency);
		$('#js-to-pay').text(($course_all + $registration_fee + $accommodation_all) +' '+ $currency);
	}
	
	
	/* Выбор языка (поиск)
	------------------------------------------------------- */
	// $('.js-language-option').on('click', function(){
	// 	var $this = $(this),
	// 		$value = $this.data('value');
		
	// 	//возвращаем значения списков стран и городов по умолчанию
	// 	$('.js-country-option, .js-city-option').removeClass('filtered filtered2');
	// 	$('#js-country').children('.js-selected').text('Страна');
	// 	$('#js-city').children('.js-selected').text('Город');
	// 	$('#js-search-country').val(''); //параметр поиска
	// 	$('#js-search-city').val(''); //параметр поиска
	
	// 	//фильтруем элементы списков
	// 	$('.js-country-option, .js-city-option').each(function(){
	// 		var $this = $(this);
	// 		if ($this.data('language') !== $value && $this.data('value') !== 0) { $this.addClass('filtered'); }
	// 	});
		
		
	// 	$('#js-search-language').val($this.data('value')); //параметр поиска
	// 	$selected.children('.js-selected').text($this.text());
	// 	$('.js-form-select').hide();
	// 	return false;
	// });
	
	
	/* Выбор страны (поиск)
	------------------------------------------------------- */
	// $('.js-country-option').on('click', function(){
	// 	var $this = $(this),
	// 		$value = $this.data('value');
		
	// 	//возвращаем значения списка городов по умолчанию
	// 	$('.js-city-option').removeClass('filtered2');
	// 	$('#js-city').children('.js-selected').text('Город');
	// 	$('#js-search-city').val(''); //параметр поиска
		
	// // 	//фильтруем элементы списка
	// 	$('.js-city-option').each(function(){
	// 		var $this = $(this);
	// 		if ($this.data('country') !== $value && $this.data('value') !== 0) { $this.addClass('filtered2'); }
	// 	});
		
	// 	$('#js-search-country').val($this.data('value')); //параметр поиска
	// 	$selected.children('.js-selected').text($this.text());
	// 	$('.js-form-select').hide();
	// 	return false;
	// });
	
	
	/* Выбор города (поиск)
	------------------------------------------------------- */
	$('.js-city-option').on('click', function(){
		var $this = $(this);
		
		$('#js-search-city').val($this.data('value')); //параметр поиска
		$selected.children('.js-selected').text($this.text());
		$('.js-form-select').hide();
		return false;
	});
	
	
	/* Дата написания комментария
	------------------------------------------------------- */
	if ($('.js-date').length) {
		
		var $locale = $('.js-date').eq(0).data('locale');
		
		moment.locale($locale);

		$('.js-date').each(function(){
			var $this = $(this),
				$date = $this.text();

			$this.text(moment($date).fromNow());
		});
	}
	
	
	/* Открыть верхнее меню
	------------------------------------------------------- */
	$('#js-menu-open').on('click', function(){
		$('#js-menu').addClass('open');
		$('#page').addClass('form-open');
		return false;
	});
	
	
	/* Закрыть верхнее меню
	------------------------------------------------------- */
	$(function(){
		$(document).on('click touchstart', function(event) {
			if ($('#page').hasClass('form-open')) {
				if ($(event.target).closest('#js-menu').length) { return; }
				if ($(event.target).closest('.modal').length) { return; }
				$('#js-menu').removeClass('open');
				$('#page').removeClass('form-open');
				event.stopPropagation();
			}
		});
	});
	
	
	/* Выбор языка
	------------------------------------------------------- */
	$('.js-language-site').on('click', function(){
		var $locale = $(this).data('locale'),
			$redirect = $('#js-form-language-site').data('redirect');
		
		$('.js-form-select').hide();
		$selected.children('.js-selected').text($locale);
		$selected.children('.js-flag').attr('src', '/img/'+ $locale +'.jpg');
		
		$.post('/handlers/ajax_locale.php',
			{
				locale: $locale
			},
			function(data){ // Обработчик ответа от сервера
				if (data === 'locale') {
					window.location.href = $redirect;	
				}
  		});

		return false;
    });
	
	
	/* Показать скрытый блок
	------------------------------------------------------- */
	$('.js-show-hidden').on('click', function(){
		var $this = $(this),
			$container = $($this.data('hidden'));
		
		if ($this.hasClass('active')) {
			$this.removeClass('active');
			$container.addClass('hidden');
		} else {
			$this.addClass('active');
			$container.removeClass('hidden');
		}
		
		return false;
	});
	
	
	/* Навигация по странице
	------------------------------------------------------- */
	$('.js-get-section').on('click', function(){
        var $scroll = $($(this).data('section')).offset().top;
        $('html, body').animate({
            scrollTop: $scroll
        }, 500);
		return false;
    });
	
	
	/* Модальные окна
	------------------------------------------------------- */
	$('.js-open-modal').on('click', function(){
		var $modal_id = $(this).data('modalId');
		$($modal_id).show().removeClass('bounceOutUp').addClass('bounceInDown');
		$('#page').addClass('form-open');
		$('#js-menu').removeClass('open'); //закрываем мобильное меню
		return false;
	});
	
	
	$('.js-close').on('click', function(){
		var $modal = $($(this).data('modalId'));
		/*$modal.hide();*/
		closeModalWindow($modal); //закрываем модальное окно
		return false;
	});
	
	
	/* Закрыть модальное окно при клике вне его зоны
	------------------------------------------------------- */
	$(function(){	
		$(document).on('click touchstart', function(event) {
			if ($('.modal').is(':visible')) {
				if ($(event.target).closest('.modal').length) { return; }
				/*$('.modal:visible').hide();*/
				closeModalWindow($('.modal:visible')); //закрываем модальное окно
				event.stopPropagation();
			}
		});
	});
	
	
	/* Модальное окно статьи
	------------------------------------------------------- */
	$('.js-open-news').on('click', function(){
		
		let $id = $(this).data('id');
		let	$data = {}; //Ответ от сервера
		
		NProgress.start();
		
		$.post('/handlers/ajax_articles.php',
			{
				id: $id
			}, 
			function(data) { // Обработчик ответа от сервера
				$data = $.parseJSON(data);
				NProgress.done();

				if ($data.name === 'success') {
					$('#js-article').html($data.article);
					$('#js-modal-news').show().removeClass('bounceOutUp').addClass('bounceInDown');
					$('#page').addClass('form-open');	
				} else if ($data.name === 'error') {
					popupInfo($data.error, true);
				} else {
					popupInfo('Возникла ошибка', true);
				}
		});		
		return false;
	});
	
	
	/* Модальное окно статьи на странице "полезная информация"
	------------------------------------------------------- */
	$('.js-open-info-article').on('click', function(){
		
		let $id = $(this).data('id');
		let	$data = {}; //Ответ от сервера
		
		NProgress.start();
		
		$.post('/handlers/ajax_info_articles.php',
			{
				id: $id
			}, 
			function(data) { // Обработчик ответа от сервера
				$data = $.parseJSON(data);
				NProgress.done();

				if ($data.name === 'success') {
					$('#js-article').html($data.article);
					$('#js-modal-news').show().removeClass('bounceOutUp').addClass('bounceInDown');
					$('#page').addClass('form-open');	
				} else if ($data.name === 'error') {
					popupInfo($data.error, true);
				} else {
					popupInfo('Возникла ошибка', true);
				}
		});		
		return false;
	});
	
	
	/* FAQ
	------------------------------------------------------- */
	$('.js-question').on('click', function() {

        var $this = $(this),
            $answerId = $this.data('answerId');

        if(! $this.hasClass('active')) {
            $('.js-answer').slideUp();
            $('.js-question').removeClass('active');
        }

        $this.toggleClass('active');
        $($answerId).slideToggle();
		
		return false;
    });
	
	
	/* Переключатель табов
	------------------------------------------------------- */
	$('.js-switch-tab').on('click', function(){
		var $this = $(this),
			$tab = $this.data('tab');
		
		$('.tab').addClass('hidden');
		$('#js-tab'+ $tab).removeClass('hidden');
		
		//табы на главной странице
		if ($('#js-slider-products3').length) {
			$('#js-slider-products'+ $tab).slick('setPosition');
		}
		
		$('.js-switch-tab').removeClass('active');
		$this.addClass('active');
		return false;
	});
	
	
	$('.js-switch-mob-tab').on('click', function(){
		var $this = $(this),
			$tab = $this.data('tab');
		
		$('.tab').addClass('hidden');
		$('#js-tab'+ $tab).removeClass('hidden');
		
		//табы на главной странице
		if ($('#js-slider-products3').length) {
			$('#js-slider-products'+ $tab).slick('setPosition');
		}
		
		$('#js-selected').text($this.text());
		$('.js-form-select').hide();
		return false;
	});
	
	
	/* Отзывы
	------------------------------------------------------- */
	$('#js-slider-reviews').slick({
		speed: 700,
		slidesToShow: 3,
		slidesToScroll: 1,
		touchThreshold: 10,
		variableWidth: true,
		prevArrow: $('#js-slide-prev'),
		nextArrow: $('#js-slide-next'),
		responsive: [
			{
				breakpoint: 440,
				settings: {
					slidesToShow: 1,
					autoplay: true,
				}
			}
		]
	});
	
	
	/* Cлайдер "наши партнеры"
	------------------------------------------------------- */
	$('#js-slider-partners').slick({
		centerMode: true,
		variableWidth: true,
		arrows: false,
		slidesToScroll: 1, //прокручивать слайдов
		speed: 4000, //скорость анимации изменения слайда
		autoplaySpeed: 0,
		cssEase: 'linear',
		autoplay: true
	});
	
	
	/* Закрыть список
	------------------------------------------------------- */
	$(function(){
		$(document).on('click touchstart', function(event) {
			if ($('.js-form-select').is(':visible')) {
				if ($(event.target).closest('.js-form-select').length) { return; }
				$('.js-form-select').hide();
				event.stopPropagation();
			}
		});
	});


	/* Открыть список
	------------------------------------------------------- */
	$('.js-open-form-select').on('click', function(){
		var $this = $(this),
			$select = $($this.data('id')),
			$options = $select.children('li').not('.filtered').not('.filtered2');
		
		$('.js-form-select').hide();
		
		if ($('#js-calc').length) {
			if ($options.length < 1) {
				return false;
			}
		} else {
			if ($options.length < 2) {
				return false;
			}
		}
		
		$select.show();
		$selected = $this; //открытый select в данный момент
		return false;
	});
	
	
	/* Фиксация калькулятора при скролинге страницы
	------------------------------------------------------- */
	if ($('#js-calc').length) {
		
		boxTotalPosition();
		
		$(document).scroll(function () {
			boxTotalPosition();
		});
	}
	

	/* Задать вопрос
	------------------------------------------------------- */
	$('#js-feedback-modal').on('click', function(){
		var $username = $('#js-username-feedback-modal').val(),
			$email = $('#js-email-feedback-modal').val(),
			$comment = $('#js-comment-feedback-modal').val(),
			$data = {}; //Ответ от сервера

		if ($username === '') {
			popupInfo('Введите имя', true);
			return false;
		}

		if ($email === '') {
			popupInfo('Введите email', true);
			return false;
		}

		var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

		if(! pattern.test($email)) {
			popupInfo('Неправильный email', true);
			return false;
		}

		if ($comment === '') {
			popupInfo('Напишите текст сообщения', true);
			return false;
		}

		$.post('/handlers/ajax_feedback.php',
			{
				action: 'feedback',
				username: $username,
				email: $email,
				comment: $comment
			}, 
			function(data) { // Обработчик ответа от сервера
				$data = $.parseJSON(data);

				if ($data.name === 'success') {
					popupInfo('Спасибо, заявка принята. Мы свяжемся с Вами в ближайшее время.');
					closeModalWindow($('.modal:visible')); //закрываем модальное окно
				} else if ($data.name === 'error') {
					popupInfo($data.error, true);
				} else {
					popupInfo('Возникла ошибка', true);
				}
		});		
		return false;
	});


	/* Обратная связь
	------------------------------------------------------- */
	$('#js-feedback').on('click', function(){
		var $username = $('#js-username-feedback').val(),
			$email = $('#js-email-feedback').val(),
			$comment = $('#js-comment-feedback').val(),
			$data = {}; //Ответ от сервера

		if ($username === '') {
			popupInfo('Введите имя', true);
			return false;
		}

		if ($email === '') {
			popupInfo('Введите email', true);
			return false;
		}

		var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

		if(! pattern.test($email)) {
			popupInfo('Неправильный email', true);
			return false;
		}

		if ($comment === '') {
			popupInfo('Напишите текст сообщения', true);
			return false;
		}

		$.post('/handlers/ajax_feedback.php',
			{
				action: 'feedback',
				username: $username,
				email: $email,
				comment: $comment
			}, 
			function(data) { // Обработчик ответа от сервера
				$data = $.parseJSON(data);

				if ($data.name === 'success') {
					popupInfo('Спасибо, заявка принята. Мы свяжемся с Вами в ближайшее время.');
				} else if ($data.name === 'error') {
					popupInfo($data.error, true);
				} else {
					popupInfo('Возникла ошибка', true);
				}
		});		
		return false;
	});


	/* Форма для сбора контактных данных
	------------------------------------------------------- */
	$('.js-contacts').on('click', function(){
		var $id = $(this).data('id'), //ID формы
			$username = $('#js-username-contacts'+ $id).val(),
			$email = $('#js-email-contacts'+ $id).val(),
			$data = {}; //Ответ от сервера

		if ($username === '') {
			popupInfo('Введите имя', true);
			return false;
		}

		if ($email === '') {
			popupInfo('Введите email', true);
			return false;
		}

		var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

		if(! pattern.test($email)) {
			popupInfo('Неправильный email', true);
			return false;
		}

		$.post('/handlers/ajax_feedback.php',
			{
				action: 'contacts',
				username: $username,
				email: $email
			}, 
			function(data) { // Обработчик ответа от сервера
				$data = $.parseJSON(data);

				if ($data.name === 'success') {
					popupInfo('Спасибо, заявка принята. Мы свяжемся с Вами в ближайшее время.');
				} else if ($data.name === 'error') {
					popupInfo($data.error, true);
				} else {
					popupInfo('Возникла ошибка', true);
				}
		});		
		return false;
	});


	/* Оформление заказа
	------------------------------------------------------- */
	$('#js-order').on('click', function(){
		var $username = $('#js-username-order').val(),
			$email = $('#js-email-order').val(),
			$tel = $('#js-tel-order').val(),
			$course = $('#js-course').data(),
			$data = {}; //Ответ от сервера

		if ($username === '') {
			popupInfo('Введите имя', true);
			return false;
		}

		if ($email === '') {
			popupInfo('Введите email', true);
			return false;
		}

		var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

		if(! pattern.test($email)) {
			popupInfo('Неправильный email', true);
			return false;
		}

		if ($tel === '') {
			popupInfo('Введите номер телефона', true);
			return false;
		}
		
		$.post('/handlers/ajax_order.php',
			{
				username: $username, //имя
				email: $email, //email
				tel: $tel, //телефон
				comment: $('#js-comment-order').val(), //комментарий
				school: $course.school, //школа
				course: $course.value, //курс
				weeks: $('#js-weeks').data('weeks'), //количество недель
				accommodation: $('#js-accommodation').data('value') //тип проживания
			}, 
			function(data) { // Обработчик ответа от сервера
				$data = $.parseJSON(data);

				if ($data.name === 'success') {
					popupInfo('Спасибо, заявка принята. Мы свяжемся с Вами в ближайшее время.');
					closeModalWindow($('.modal:visible')); //закрываем модальное окно
				} else if ($data.name === 'error') {
					popupInfo($data.error, true);
				} else {
					popupInfo('Возникла ошибка', true);
				}
		});
		return false;
	});
	
	
	/* Постраничная навигация в результате поиска
	------------------------------------------------------- */
	$('#page').on('click', '.js-page-s', function(){
		var $page = $(this).data('page'),
			$data = {}; //Ответ от сервера
		
		NProgress.start();
		
		$.post('/handlers/ajax_search.php',
			{
				action: 'page',
				page: $page
			}, 
			function(data) { // Обработчик ответа от сервера
				$data = $.parseJSON(data);
				NProgress.done();

				if ($data.name === 'success') {
					$('#js-products').html($data.products);
					$('#js-wrap-pagination').html($data.pagination);
					
					//скролл наверх страницы
					var $scroll = $('#search').offset().top;
					
					$('html, body').animate({
						scrollTop: $scroll - 34
					}, 500);
					
					//показываем / скрываем кнопку "Показать ещё"
					if ($data.show_more) {
						$('#js-show-more-s').removeClass('hidden');
					} else {
						$('#js-show-more-s').addClass('hidden');
					}
					
				} else if ($data.name === 'error') {
					popupInfo($data.error, true);
				} else {
					popupInfo('Возникла ошибка', true);
				}
		});		
		return false;
	});
	
	
	/* Показать еще товары в результате поиска
	------------------------------------------------------- */
	$('#js-show-more-s').on('click', function(){
		var $this = $(this),
			$data = {}; //Ответ от сервера
		
		NProgress.start();
		
		$.post('/handlers/ajax_search.php',
			{
				action: 'show-more'
			},
			function(data) { // Обработчик ответа от сервера
				$data = $.parseJSON(data);
				NProgress.done();

				if ($data.name === 'success') {
					$('#js-products').append($data.products);
					$('#js-wrap-pagination').html($data.pagination);
					
					if ($data.show_more) {
						$this.removeClass('hidden');
					} else {
						$this.addClass('hidden');
					}
					
				} else if ($data.name === 'error') {
					popupInfo($data.error, true);
				} else {
					popupInfo('Возникла ошибка', true);
				}
		});		
		return false;
	});
	
	
	/* Постраничная навигация статей
	------------------------------------------------------- */
	$('#page').on('click', '.js-page-a', function(){
		var $page = $(this).data('page'),
			$data = {}; //Ответ от сервера
		
		NProgress.start();
		
		$.post('/handlers/ajax_articles.php',
			{
				action: 'page',
				page: $page
			}, 
			function(data) { // Обработчик ответа от сервера
				$data = $.parseJSON(data);
				NProgress.done();

				if ($data.name === 'success') {
					$('#js-articles').html($data.articles);
					$('#js-wrap-pagination').html($data.pagination);
					
					//скролл наверх страницы
					var $scroll = $('#tips').offset().top;
					
					$('html, body').animate({
						scrollTop: $scroll - 34
					}, 500);
					
					//показываем / скрываем кнопку "Показать ещё"
					if ($data.show_more) {
						$('#js-show-more-a').removeClass('hidden');
					} else {
						$('#js-show-more-a').addClass('hidden');
					}
					
				} else if ($data.name === 'error') {
					popupInfo($data.error, true);
				} else {
					popupInfo('Возникла ошибка', true);
				}
		});		
		return false;
	});
	
	
	/* Показать еще статьи
	------------------------------------------------------- */
	$('#js-show-more-a').on('click', function(){
		var $this = $(this),
			$data = {}; //Ответ от сервера
		
		NProgress.start();
		
		$.post('/handlers/ajax_articles.php',
			{
				action: 'show-more'
			},
			function(data) { // Обработчик ответа от сервера
				$data = $.parseJSON(data);
				NProgress.done();

				if ($data.name === 'success') {
					$('#js-articles').append($data.articles);
					$('#js-wrap-pagination').html($data.pagination);
					
					if ($data.show_more) {
						$this.removeClass('hidden');
					} else {
						$this.addClass('hidden');
					}
					
				} else if ($data.name === 'error') {
					popupInfo($data.error, true);
				} else {
					popupInfo('Возникла ошибка', true);
				}
		});		
		return false;
	});

});


/* Закрыть модальное окно
------------------------------------------------------- */
function closeModalWindow($modal) {
	'use strict';
	$modal.removeClass('bounceInDown').addClass('bounceOutUp');
	$('#page').removeClass('form-open');
	setTimeout(function() {
		$modal.hide();
	}, 700);
}


/* Информационное модальное окно
------------------------------------------------------- */
function popupInfo($text, $error) {
	'use strict';
	
	if ($('.popup-info').length) {
		$('.popup-info').remove();
	}
		
	var $class = 'popup-info',
		
		$icon = '<svg fill="#333" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><g transform="translate(0.000000,511.000000) scale(0.100000,-0.100000)"><path d="M4477.6,5002.9C2307.4,4736.8,599.4,3163.3,172.4,1034.1c-96.5-476.7-96.5-1380.5,0-1854.3c269.1-1336.6,1035.4-2465.5,2178.9-3208.4c488.4-318.8,1070.5-552.8,1719.8-696.1c263.2-55.6,391.9-64.4,933-64.4s669.8,8.8,933,64.4c1365.8,298.3,2462.6,1041.2,3202.6,2178.9c318.8,488.4,552.8,1070.5,696.1,1719.7c55.6,263.2,64.4,391.9,64.4,933c0,690.2-35.1,935.9-222.3,1517.9c-462.1,1450.7-1620.3,2626.4-3076.8,3129.4c-532.3,184.3-880.3,242.8-1494.5,251.5C4816.8,5011.7,4533.1,5008.8,4477.6,5002.9z M5761.5,4099.2c818.9-160.9,1517.9-532.3,2111.6-1123.1c593.7-596.6,959.3-1286.9,1129-2126.3c70.2-359.7,70.2-1126,0-1485.7c-169.6-839.4-535.2-1529.6-1129-2126.3c-596.6-593.7-1286.9-959.3-2126.2-1129c-359.7-70.2-1126-70.2-1485.8,0c-839.4,169.7-1529.6,535.3-2126.3,1129c-593.7,596.6-959.3,1286.9-1129,2126.3c-70.2,359.7-70.2,1126,0,1485.7c169.7,839.4,535.2,1529.6,1129,2126.3c675.6,672.7,1465.3,1052.9,2459.7,1178.7C4799.3,4181.1,5521.7,4146,5761.5,4099.2z"/><path d="M7124.4,2259.5c-117-52.6-137.5-76-1594-1757.8c-696.1-804.3-1278.1-1474-1292.7-1488.7c-14.6-17.6-272,219.4-631.7,576.2c-649.3,643.4-745.8,710.7-944.7,678.5c-277.8-46.8-438.7-374.4-307.1-623c23.4-43.9,400.7-435.8,842.3-874.5c675.6-669.7,818.9-798.4,924.2-830.6c260.3-76.1,219.4-114.1,1936.2,1860.1c854,982.7,1573.5,1822.1,1599.8,1871.8c64.3,119.9,58.5,324.6-11.7,418.2C7510.5,2271.2,7297,2341.4,7124.4,2259.5z"/></g></svg>',
		
		$popupInfo = '';
		
	if ($error) {
		$class = 'popup-info popup-error';
		
		$icon = '<svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><path d="M500,10C229.4,10,10,229.4,10,500c0,270.6,219.4,490,490,490c270.6,0,490-219.4,490-490C990,229.4,770.6,10,500,10z M500,923.7C266,923.7,76.4,734,76.4,500C76.4,266,266.1,76.4,500,76.4c234,0,423.6,189.7,423.6,423.6C923.6,734,734,923.7,500,923.7z"/><path d="M451.5,770.2c-13.1-13.1-19.7-29.3-19.7-48.5c0-18.6,6.7-34.5,20.2-47.6c13.4-13.1,29.5-19.7,48.1-19.7s34.6,6.6,48.1,19.7c13.4,13.1,20.1,29,20.1,47.6c0,19.2-6.6,35.3-19.7,48.5c-13.1,13.2-29.3,19.7-48.5,19.7C480.9,789.9,464.7,783.3,451.5,770.2z M444.1,559c0,16.5,5.1,29.9,15.2,40.4c10.1,10.4,23.4,15.6,39.8,15.6c16.5,0,29.9-5.2,40.2-15.6C549.8,589,555,575.5,555,559V265.2c0-16.5-5.2-29.7-15.6-39.9c-10.4-10.1-23.8-15.2-40.2-15.2c-15.9,0-29,5.2-39.4,15.6c-10.4,10.4-15.6,23.6-15.6,39.5V559z"/></svg>';
	}
		
	$popupInfo = $('<div>'+ $icon +'<p>'+ $text +'</p></div>')
	.addClass($class);
	$('#page').prepend($popupInfo);
	$('.popup-info').delay(7000).fadeOut(500);
}


/* Фиксации калькулятора при скролинге страницы
------------------------------------------------------- */
function boxTotalPosition() {
	'use strict';
	
	var $box_row = $('#js-row'),
		$box_total = $('#js-calc'),
		$offset_top = $box_row.offset().top,
		$scroll = $(window).scrollTop(),
		$new = $scroll - $offset_top + 40,
		$alo = $offset_top + $box_row.outerHeight() - $box_total.outerHeight();
	
	
	if($new > 0 && $scroll < $alo && $(window).width() > 970) {
		$box_total.css('transform', 'translate(0px, '+ $new +'px)');
	} else {
		$box_total.css('transform', 'translate(0px, 0px)');
	}
}