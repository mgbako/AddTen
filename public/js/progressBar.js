(function(){
'use strict';

	//get radio count
	var count = 0;
	var checked = 0;

	

	countBoxes();
	$(":radio").on('click', countBoxes);
	

	// Count Checks
	

	countChecked();
	$(":radio").on('click', countChecked);

	/*Count Down Function*/
	function counter(time, url)	{
		var interval = setInterval(function(){

			$('#counter').text(time);
			time = time - 1;

			if(time <= 0){
				//clearInterval(interval);
				window.location = url;
				clearInterval(interval);
			}
		}, 1000);

	}

	$('#countdown').countdown({date: '15 August 2015 15:53:00'});

	/*$('nav.paginate').customPaginate({
		itemsToPaginate: ".post"
	});*/


	/**
	 * GUI i for Multiple Select
	 */
	$('#selected').select2();

}());

	function countBoxes(){
		var divider = $('ol').children("li").length / $('ol').length;
		count = $("input[type='radio']").length / divider;
	}

	function countChecked(){
		checked = $('input:checked').length;
		console.log(checked);

		var percentage = parseInt( ( (checked / count) * 100), 10);

		
		if(percentage < 50 ){
			$('.progress-bar').addClass('progress-bar-danger');
		}
		else if(percentage < 100){
			$('.progress-bar').removeClass('progress-bar-danger');
			$('.progress-bar').addClass('progress-bar-warning');
		}
		else{
			$('.progress-bar').removeClass('progress-bar-warning');
			$('.progress-bar').addClass('progress-bar-success');
		}
		$('.progress-bar').css('width', percentage + '%');
		$('#counter').text(percentage + "%");
	}