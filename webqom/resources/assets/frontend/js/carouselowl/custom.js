(function($) {
 "use strict";

$(document).ready(function() {

  $(".navigation-owl").owlCarousel({
	autoPlay : 9000,
	stopOnHover : true,
	navigation:true,
	paginationSpeed : 10000,
	goToFirstSpeed : 2000,
	singleItem : true,
	transitionStyle:"fadeUp",
	pagination:false,
  });



});

})(jQuery);
