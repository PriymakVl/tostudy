
$(document).ready(function() {
	/* Выбор языка (поиск)
	------------------------------------------------------- */
	$('.js-language-option').on('click', function(){
		let $this = $(this);
		$('#js-search-language').val($this.data('value')); //параметр поиска
		$.get('/search/countries', {lang_id: $this.data('value')}, (data) => {template_countries(data);});
		$selected.children('.js-selected').text($this.text());
		$('.js-form-select').hide();
		return false;
	});


	/* Выбор страны (поиск)
	------------------------------------------------------- */
	$('#js-form-country').on('click', '.js-country-option', function(){
		let $this = $(this);
		$('#js-search-country').val($this.data('value')); //параметр поиска
		return $.get('/search/cities', {country_id: $this.data('value')}, (data) => {template_cities(data);});
		// return location.href = '/search/cities?country_id=' + $this.data('value'); 
		$selected.children('.js-selected').text($this.text());
		$('.js-form-select').hide();
		return false;
	});

});

function template_countries(countries) {
	// location.href = '/search/countries?lang_id=' + lang_id; 
	if (!countries) return;
	countries = JSON.parse(countries);
	let list_item_str = '<li class="js-country-option" data-value="0">Все</li>';
	for(let i = 0; i < countries.length; i++) {
		list_item_str += '<li class="js-country-option" data-value="' + countries[i].col_id + '">' + countries[i].col_title_ru + '</li>'
	}
	$('#js-form-country').empty().append(list_item_str);
}


function template_cities(cities) {
	// return location.href = '/search/cities?lang_id=' + lang_id; 
	return console.log(cities);
}

			//возвращаем значения списка городов по умолчанию
		// $('.js-city-option').removeClass('filtered2');
		// $('#js-city').children('.js-selected').text('Город');
		// $('#js-search-city').val(''); //параметр поиска
		
		// //фильтруем элементы списка
		// $('.js-city-option').each(function(){
		// 	var $this = $(this);
		// 	if ($this.data('country') !== $value && $this.data('value') !== 0) { $this.addClass('filtered2'); }
		// });


