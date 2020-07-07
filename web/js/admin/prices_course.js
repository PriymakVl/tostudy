$(document).ready(function() {
	$('.js-save-prices').on('click', () => {

		const urlParams = new URLSearchParams(window.location.search);
		const course_id = urlParams.get('id');

		let weeks = $('#js-course-prices input[name="week"]').map((index, week) => { return $(week).val(); }).get();
		let prices = $('#js-course-prices input[name="price"]').map((index, week) => { return $(week).val(); }).get();
		let prices_str = makeResultString(weeks, prices);

		location.href = '/course/course-admin/prices?id=' + course_id + '&prices=' + prices_str;
	});

	$('#js-add-price').click(() => {
		let row = '<tr>';
		row += '<td><input type="text" value="" name="week" placeholder="Недель"></td>';
		row += '<td><input type="text" value="" name="price" placeholder="Цена за неделю"></td>'
		row += '<td></td></tr>';  
		$('#table-content').prepend(row);    		
	});


	$('.js-price-del').on('click', function() {
		$(this).parents('tr').remove();
		return false;
	});
});


function makeResultString(weeks, prices)
{
	let str = '';
	if (!weeks || !prices) return '';
	for (let i = 0, length = weeks.length; i < length; i++) {
		str += weeks[i] + ':' + prices[i] + ',';
	}
	return str.slice(0, -1);
}