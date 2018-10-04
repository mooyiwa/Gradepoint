$(document).ready(function(){
$('.date').datepicker({
    dateFormat: "yy-mm-dd",
  showOn: 'both',
  buttonText: 'Choose a date',
  buttonImage: '../img/calendar.png',
  buttonImageOnly: true,
  numberOfMonths: 1,
	minDate: '-6m',
  maxDate: '6m',
  showButtonPanel: true
});
});