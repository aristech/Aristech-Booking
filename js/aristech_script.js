jQuery(function ($) {


    "use strict";
		function getField(id) {
			var el = $('#'+id+'-picker');
			return el.length ? el : null;
		}

		$('.fa-calendar.in').click(function() {
            var el = document.getElementById("checkin-picker");
            $(el).focus();
		});

		$('.fa-calendar.out').click(function() {
			var el = document.getElementById("checkout-picker");
			$(el).focus();
		});

		function pickerSetup(id, date) {
			var el = getField(id);
			if ( el !== null ) {
				var checkin = (id === 'checkin');
				el.datepicker({
					altField: el.get(0).form[id],
					altFormat: 'yy-mm-dd',
					dateFormat: 'd M yy',
					onSelect: function() {
						if ( checkin && getField('checkout') !== null ) {
							var constraint = new Date(el.datepicker('getDate'));
							constraint.setDate(constraint.getDate()+1);
							getField('checkout').datepicker("option", 'minDate', constraint);
						}
					},
					numberOfMonths: 1,
					mandatory: true,
					firstDay: 1,
					minDate: checkin ? 0 : 1,
					maxDate: '+2y'
				});
				el.datepicker("setDate", date);
			}
		}

		pickerSetup("checkin", "+0");
        pickerSetup("checkout", "+1");

});