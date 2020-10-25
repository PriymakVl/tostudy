
$(document).ready(function() {

	/* Выбор программы (поиск)
	------------------------------------------------------- */
	$('#js-program').click(() => { $('#js-form-program').toggle(); });

	$('.js-program-option').on('click', function(){
		let prog_name = $(this).text();
		let prog_id = $(this).data('prog_id');
		$('#js-program .js-selected').text(prog_name).attr('prog_id', prog_id);

		$('.js-form-select').hide();
		return false;
	});

	/* Выбор языка (поиск)
	------------------------------------------------------- */
	$('#js-lang').click(() => { $('#js-form-language').toggle(); });

	$('.js-language-option').on('click', function(){
		let lang_name = $(this).text();
		let lang_id = $(this).data('lang_id');
		let prog_id = $('#js-program .js-selected').attr('prog_id');

		$('#js-lang .js-selected').text(lang_name).attr('lang_id', lang_id);

		if (!prog_id) alert('Не выбрана программа');
		// else return location.href = '/search/countries?lang_id=' + lang_id + '&prog_id=' + prog_id;
		else $.get('/search/countries', {lang_id: lang_id, prog_id: prog_id}, (data) => {template_countries(data);});

		$('.js-form-select').hide();
		return false;
	});


	/* Выбор страны (поиск)
	------------------------------------------------------- */
	$('#js-country').click(() => { $('#js-form-country').toggle(); });

	$('#js-form-country').on('click', '.js-country-option', function(){
		let country_name = $(this).text();
		let country_id = $(this).data('country_id');
		let prog_id = $('#js-program .js-selected').attr('prog_id');

		if (!prog_id) alert('Не выбрана программа');

		$('#js-country .js-selected').text(country_name).attr('country_id', country_id);

		$.get('/search/cities', {country_id: country_id, prog_id: prog_id}, (data) => {template_cities(data);});

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
		let prog_id = $('#js-program .js-selected').attr('prog_id');
		let lang_id = $('#js-lang .js-selected').attr('lang_id');
		let country_id = $('#js-country .js-selected').attr('country_id');
		let city_id = $('#js-city .js-selected').attr('city_id');
		let school = $('input[name="school"]').val();
		location.href = '/search/result?prog_id=' + prog_id + '&lang_id=' + lang_id + '&country_id=' + country_id
		 + '&city_id=' + city_id + '&school=' +school;
		return false;
	});

});

function template_countries(countries) {
	if (!countries) return;
	countries = JSON.parse(countries);
	let list_item_str = '';
	for(let i = 0; i < countries.length; i++) {
		list_item_str += '<li class="js-country-option" data-country_id="' + countries[i].id + '">' + countries[i].name + '</li>'
	}
	$('#js-form-country').empty().append(list_item_str);
}


function template_cities(cities) {
	if (!cities) return;
	cities = JSON.parse(cities);
	let list_item_str = '';
	for(let i = 0; i < cities.length; i++) {
		list_item_str += '<li class="js-city-option" data-city_id="' + cities[i].id + '">' + cities[i].name + '</li>'
	}
	$('#js-form-city').empty().append(list_item_str);
}



