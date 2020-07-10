
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
	
	/* Навигация по странице
	------------------------------------------------------- */
	$('.js-get-section').on('click', function(){
        var $scroll = $($(this).data('section')).offset().top;
        $('html, body').animate({
            scrollTop: $scroll
        }, 500);
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

		$('.js-switch-mob-tab').removeClass('active');
		$(this).addClass('active');

		$('.tab').addClass('hidden');
		$('#js-tab'+ $tab).removeClass('hidden');
		
		//табы на главной странице
		if ($('#js-slider-products3').length) {
			$('#js-slider-products'+ $tab).slick('setPosition');
		}
		
		// $('#js-selected').text($this.text());
		// $('.js-form-select').hide();
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


	/* Фиксации калькулятора при скролинге страницы определение позиции
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
	
	
	/* Фиксация калькулятора при скролинге страницы
	------------------------------------------------------- */
	if ($('#js-calc').length) {
		
		boxTotalPosition();
		
		$(document).scroll(function () {
			boxTotalPosition();
		});
	}




