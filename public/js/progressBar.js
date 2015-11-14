(function(){
'use strict';

	//get radio count
	var count = 0;
	var checked = 0;

	function countBoxes(){
		var divider = $('ol').children("li").length / $('ol').length;
		count = Math.floor($("input[type='radio']").length / divider);
	}

	countBoxes();
	$(":radio").on('click', countBoxes);

	// Count Checks
	function countChecked(){
		checked = $('input:checked').length;
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
	

	countChecked();
	$(":radio").on('click', countChecked);
}());

	