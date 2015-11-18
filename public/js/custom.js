(function($){
'use strict';

	function countChecked(){
		var percentage = $('#percentage').val();
		var progress = $('#progress');

		if(percentage < 25 ){
			$('.progress-bar').addClass('progress-bar-danger');
			progress.addClass('label-danger');
			progress.text("No Report");
		}
		else if(percentage < 50 ){
			$('.progress-bar').removeClass('progress-bar-danger');
			$('.progress-bar').addClass('progress-bar-warning');

			progress.removeClass('label-danger');
			progress.addClass('label-warning');
			progress.text("Progessing");
		}
		else if(percentage == 100){
			$('.progress-bar').removeClass('progress-bar-warning');
			$('.progress-bar').addClass('progress-bar-primary');

			progress.removeClass('label-warning');
			progress.addClass('label-primary');
			progress.text("Submit");
			
		}
		else{
			$('.progress-bar').removeClass('progress-bar-warning');
			$('.progress-bar').addClass('progress-bar-success');

			progress.removeClass('label-warning');
			progress.addClass('label-success');
			progress.text("Approved");
		}
	}

	countChecked();
	/**
	 * GUI i for Multiple Select
	 */
	$('#selected').select2();

}(jQuery));