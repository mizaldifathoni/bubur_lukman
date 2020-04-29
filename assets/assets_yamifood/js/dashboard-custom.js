(function ($) {
	"use strict";

	/* ..............................................
    Special Menu
    ................................................. */

	var Container = $('.container');
	Container.imagesLoaded(function () {
		var portfolio = $('.special-menu');
		portfolio.on('click', 'button', function () {
			$(this).addClass('active').siblings().removeClass('active');
			var filterValue = $(this).attr('data-filter');
			$grid.isotope({
				filter: filterValue
			});
    });
    
    var $grid = $('.special-list').isotope({
			itemSelector: '.special-grid'
		});
		
	});


}(jQuery));
