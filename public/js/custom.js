(function($){
'use strict';

	function countChecked(){
		var percentage = $('#percentage').val();
		var progress = $('.progressStatus');
		var remarks = $('.remarks');

		if(percentage == 0 ){
			$('.progress-bar').addClass('progress-bar-danger');
			progress.addClass('label-danger');
			progress.text("No Question Added");
			remarks.text("Not Done");
		}
		else if(percentage < 100 ){
			$('.progress-bar').removeClass('progress-bar-danger');
			$('.progress-bar').addClass('progress-bar-warning');

			progress.removeClass('label-danger');
			progress.addClass('label-warning');
			progress.text("Processing");
			remarks.text("Processing");
		}
		else if(percentage >= 100){
			$('.progress-bar').removeClass('progress-bar-warning');
			$('.progress-bar').addClass('progress-bar-primary');

			progress.removeClass('label-warning');
			progress.addClass('label-primary');
			progress.text("Submit");
			remarks.text("Waiting");
			
		}
		else{
			$('.progress-bar').removeClass('progress-bar-warning');
			$('.progress-bar').addClass('progress-bar-success');

			progress.removeClass('label-warning');
			progress.addClass('label-success');
			progress.text("Approved");
			remarks.text("Done");
		}
	}

	countChecked();
	/**
	 * GUI i for Multiple Select
	 */
	$('#selected, #seleteId').select2();

}(jQuery));