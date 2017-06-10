
$(document).ready(function(){/* off-canvas sidebar toggle */

$('[data-toggle=offcanvas]').click(function() {
  	$(this).toggleClass('visible-xs text-center');
    $(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
    $('.row-offcanvas').toggleClass('active');
    $('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
    $('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
    $('#btnShow').toggle();
});

$('.datepicker').pickadate({
	format: 'yyyy-mm-dd',
	selectYears: true,
	selectMonths: true,
	selectYears: 110,
	max: new Date(new Date().getFullYear()+10,01,01)
});

$('.timepicker').pickatime({
  format: 'HH:i'
}
);

});