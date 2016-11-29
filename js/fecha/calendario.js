$(function () {
    $.datepicker.setDefaults($.datepicker.regional["es"]);
    $("#from").datepicker({
        dateFormat: 'dd-mm-yy',
        firstDay: 1,
        onSelect: function(selectedDate) {
			       $("#to").datepicker("option", "minDate", selectedDate);
		         }
    });
    $("#to").datepicker({
		    dateFormat: 'dd-mm-yy',
		    firstDay: 1,
		    onSelect: function(selectedDate) {
			       $("#from").datepicker( "option", "maxDate", selectedDate);
		         }
	  });
 });
