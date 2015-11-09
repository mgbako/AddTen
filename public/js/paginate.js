(function($){

	$.fn.customPaginate = function(options){

		$(".finish").hide();
		var paginationContainer = this;
		var itemsToPaginate;
		var linkNumber;

		
		var defaults = {
			itemsPerPage : 1
		};

		var settings = {};

		$.extend(settings, defaults, options);
		var itemsPerPage = settings.itemsPerPage;

		itemsToPaginate = $(settings.itemsToPaginate);
		var numberOfPaginationLinks = Math.ceil(itemsToPaginate.length / itemsPerPage);
		var current;

		$('<ul></ul>').prependTo(paginationContainer).addClass("pagination");

		for(var index=0; index<numberOfPaginationLinks; index++){
			paginationContainer.find("ul").append("<li><a>"+ (index+1) +"</a></li>");

		}

		itemsToPaginate.filter(":gt("+ (itemsPerPage - 1) +")").hide();

		var link = paginationContainer.find("ul li").on("click", function(){
			
			linkNumber = $(this).text();

			$('.number').text(linkNumber);
			
			var itemsToHide = itemsToPaginate.filter(":lt("+ (linkNumber * itemsPerPage - 1) +")");
			$.merge(itemsToHide, itemsToPaginate.filter(":gt("+ ((linkNumber * itemsPerPage) - 1) +")"));
			itemsToHide.hide();

			var itemsToShow = itemsToPaginate.not(itemsToHide);
			itemsToShow.show();


			if(index+1 == linkNumber){
				link.addClass("activeLink");
				link.siblings().removeClass("activeLink");
			}
			
			//$('#total').text(linkNumber + "/"+numberOfPaginationLinks);
			

			if(linkNumber == numberOfPaginationLinks){
				$(".finish").show();
			}
			else
				$(".finish").hide();

			
		});




		
	}

}(jQuery));