$(document).ready(function() {
	$('select[name="country_id"]').change(function() {
		let programId = $('#course-col_prog_id').val();
		let action = $('.course-form').data('action');
		let countryId = this.value;

		if (countryId) location.href = '/course/course-admin/' + action + '/?country_id=' + countryId + '&program_id=' + programId;
    	else location.href = '/course/course-admin/' + action;
	});

	$('select[name="city_id"]').change(function() {
		let programId = $('#course-col_prog_id').val();
		let cityId = this.value;
		let action = $('.course-form').data('action');

		if (cityId) location.href = '/course/course-admin/' + action + '/?city_id=' + cityId + '&program_id=' + programId;
		else location.href = '/course/course-admin/' + action;
	});
});
