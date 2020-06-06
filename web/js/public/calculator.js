var course_id;

$(document).ready(function() {

	/* Выбор курса (калькулятор)
	------------------------------------------------------- */
	$('#js-course').click(() => { $('#js-form-course').toggle();});

	$('.js-course-option').on('click', function(){
		let course_name = $(this).text();
		let course_id = $(this).data('course_id');

		$('#js-course .js-selected').text(course_name).data('course_id', course_id);

		$.get('/site/calculator', {course_id: course_id}, data => { template_weeks(data); });

		$('#js-form-course').hide();
		return false;
	});
	
	
	/* Выбор количества недель (калькулятор)
	------------------------------------------------------- */
	$('#js-weeks').click(() => { $('#js-form-weeks').toggle(); });

	$('#js-form-weeks').on('click', '.js-weeks-option', function(){
		let week = $(this).text();
		let price = $(this).data('price');
		$('#js-weeks .js-selected').text(week).data('price', price);

		setTimeout(calc, 100);

		$('#js-form-weeks').hide();
		return false;
	});
	
	
	/* Выбор жилья (калькулятор)
	------------------------------------------------------- */
	$('.js-accommodation-option').on('click', function(){
		var $this = $(this), $d = $this.data();
		
		$selected.data($d).children('.js-selected').text($this.text());

		setTimeout(calc, 100);

		$('.js-form-select').hide();
		return false;
	});
	
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

function template_weeks(weeks)
{
	if (!weeks) return;
	weeks = JSON.parse(weeks);
	let list_item_str = '';
	for(week in weeks) {
		list_item_str += '<li class="js-weeks-option" data-price="' + weeks[week]  + '">' + week + '</li>';
	}
	return $('#js-form-weeks').html(list_item_str);
}

	// $(function() {
 //        $('.parent_selector').on('click touchstart', '.selector', function(){ 
 //            console.log($(this));
 //        });
 //    });