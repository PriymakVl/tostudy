
$(document).ready(function() {

	/* Выбор языка (поиск)
	------------------------------------------------------- */
	$('#js-lang').click(() => { $('#js-form-language').toggle(); });

	$('.js-language-option').on('click', function(){
		let lang_name = $(this).text();
		let lang_id = $(this).data('lang_id');

		$('#js-lang .js-selected').text(lang_name).attr('lang_id', lang_id);

		$.get('/search/countries', {lang_id: lang_id}, (data) => {template_countries(data);});

		$('.js-form-select').hide();
		return false;
	});


	/* Выбор страны (поиск)
	------------------------------------------------------- */
	$('#js-country').click(() => { $('#js-form-country').toggle(); });

	$('#js-form-country').on('click', '.js-country-option', function(){
		let country_name = $(this).text();
		let country_id = $(this).data('country_id');

		$('#js-country .js-selected').text(country_name).attr('country_id', country_id);

		$.get('/search/cities', {country_id: country_id}, (data) => {template_cities(data);});

		$('.js-form-select').hide();
		return false;
	});

	/* Выбор города (поиск)
	------------------------------------------------------- */
	$('#js-city').click(() => { $('#js-form-city').toggle(); });

	$('#js-form-city').on('click', '.js-city-option', function(){
		let city_name = $(this).text();
		let city_id = $(this).data('city_id');

		$('#js-city .js-selected').text(city_name).attr('city_id', city_id);

		$('.js-form-select').hide();
		return false;
	});

	$('#js-submit-search').click(function() {
		let lang_id = $('#js-lang .js-selected').attr('lang_id');
		let country_id = $('#js-country .js-selected').attr('country_id');
		let city_id = $('#js-city .js-selected').attr('city_id');
		let school = $('input[name="school"]').val();
		location.href = '/search/result?lang_id=' + lang_id + '&country_id=' + country_id + '&city_id=' + city_id + '&school=' +school;
		return false;
	});

});

function template_countries(countries) {
	if (!countries) return;
	countries = JSON.parse(countries);
	let list_item_str = '<li class="js-country-option" data-value="0">Все</li>';
	for(let i = 0; i < countries.length; i++) {
		list_item_str += '<li class="js-country-option" data-country_id="' + countries[i].col_id + '">' + countries[i].col_title_ru + '</li>'
	}
	$('#js-form-country').empty().append(list_item_str);
}


function template_cities(cities) {
	if (!cities) return;
	cities = JSON.parse(cities);
	let list_item_str = '<li class="js-city-option" data-city_id="0">Все</li>';
	for(let i = 0; i < cities.length; i++) {
		list_item_str += '<li class="js-city-option" data-city_id="' + cities[i].col_id + '">' + cities[i].col_title_ru + '</li>'
	}
	$('#js-form-city').empty().append(list_item_str);
}



