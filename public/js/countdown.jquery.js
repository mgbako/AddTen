(function($){
'use strict';

	/*Count Down Function*/
	$.fn.countdown = function(options){
		var settings = {'date': null};
		if(options){
			$.extend(settings, options);
		}

		var this_sel = $(this);
		function count_exec(){
			var eventDate = Date.parse(settings['date']) / 1000;
			var currentDate = Math.floor( $.now() / 1000);
			
			var seconds = eventDate - currentDate;

			var days = Math.floor(seconds / (60 * 60 * 24));
			seconds -= days * 60 * 60 * 24;

			var hours = Math.floor(seconds / (60 * 60));
			seconds -= hours * 60 * 60;

			var minutes = Math.floor(seconds / 60);
			seconds -= minutes * 60;

			this_sel.find('.days').text(days);
			this_sel.find('.hours').text(hours);
			this_sel.find('.mins').text(minutes);
			this_sel.find('.secs').text(seconds);

			if(hours<0 && minutes<0 && seconds<0){
			window.location = 'http://localhost:8000/students';
			clearInterval(interval);
		}
		}

		count_exec();
		var interval = setInterval(count_exec, 1000);

		
	}

})(jQuery);