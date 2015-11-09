(function($){

	
	

	

}(jQuery));

$(document).ready(function(){

	/**
	 * How much items per page to show
	*/
	var show_per_page = 1;

	/**
	 * Getting the amount of elements inside content div
	*/
	var number_of_items = $('.post').size();

	/**
	 * Calculate the number of pages we are going to have
	 */
	
	var number_of_pages = Math.ceil(number_of_items / show_per_page);

	/**
	 * Set the value of our hidden input fields
	 */
	$('#current_page').val(0);
	$('#show_per_page').val(show_per_page);

	/**
	 *	Now when we got all we need for the navigation let's make it
	 */
	
	/**
	 * What are we going to have in the navigation?
	 * -link to previous page
	 * -links to specific pages
	 * -link to next page
	 */
	var navigation_html = '<button class=" btn btn-primary pull-left previous_link"><a class="link" href="javascript:previous();">Prev</a>';
	var current_link = 0;

	while(number_of_pages > current_link){
		navigation_html += '<a class="page_link" href="javascript:go_to_page('+ current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) + '</a>';
		current_link++;
	}

	navigation_html += '<button class="btn btn-primary pull-right next_link"><a class="link" href="javascript:next();">Next</a></button>';

	$('#page_navigation').html(navigation_html);

	$('.page_link').css('display', 'none');

	/**
	 * Add active_page class to the first page link
	 */
	$('#page_navigation .page_link:first').addClass('active_page');

	/**
	 * Hide all the first n (show_per_page) elements
	 */
	$('#content, page_link').children().css('display', 'none');

	/**
	 * and show the first n (show_per_page) elements
	 */
	$('.post').slice(0, show_per_page).css('display', 'block');

});

function previous(){
	new_page = parseInt($('#current_page').val()) - 1;

	/**
	 * If there is an item before the current active link run the function
	 */
	if($('.active_page').prev('.page_link').length==true){
		go_to_page(new_page);
	}
}

function next(){
	new_page = parseInt($('#current_page').val()) + 1;

	/**
	 * if there is an item after the current active link run the function
	 */
	if($('.active_page').next('.page_link').length==true){
		go_to_page(new_page);
	}
}

function go_to_page(page_num){
	
	/**
	 * Get the number of items show per page
	 */
	var show_per_page = parseInt($('#show_per_page').val());

	/**
	 * get the element number where to start the slice from
	 */
	start_from = page_num * show_per_page;

	/**
	 * Get the element number where to end the slice
	 */
	end_on = start_from + show_per_page;

	/**
	 * Hide all children elements of content div, get specific items and show them
	 */
	$('.post').css('display', 'none').slice(start_from, end_on).css('display', 'block');

	/**
	 * get the page link that has longdesc attribute of the current page and add active_page class to it and remove that class from previously active page link
	 */
	$('.page_link[longdesc=' + page_num + ']').addClass('active_page').siblings('.active_page').removeClass('active_page');

	/**
	 * Update the current page input field
	 */
	$('#current_page').val(page_num);

}