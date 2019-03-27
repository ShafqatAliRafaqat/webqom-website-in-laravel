

;
(function ($) {

	/**
	 * Description
	 * @method goMover
	 * @return 
	 */
	$.fn.goMover = function() {

		//variables later to expose as configs
		var $selItems = $(this);
		var $postFix = "+";
		var $speed = 700;
		var $currentLoc = "";
		var $activeClass = "active";
		var $redLine = 2;


		// assign onclick action to links
		$selItems.click(function() {
			//hash name
			var $hash = this.hash;
			window.location.hash = $hash + $postFix;
			return false;
		});

		//add class for easy selector later
		$selItems.addClass('gomover');

		//record all hash locations on page
		var $targs = {
			hashArray : [],
			fullHashArray : [],
			scrollTopArray : []
		}

		$selItems.each(function(){
			$targs.hashArray.push(this.hash);
			$targs.fullHashArray.push(this.hash + $postFix);
			$targs.scrollTopArray.push($(this.hash).position());
		});


		/**
		 * Description
		 * @method funcScrollSection
		 * @param {} $fullHash
		 * @return 
		 */
		var funcScrollSection = function($fullHash) {

			//test if hash is in list
			if( $.inArray($fullHash, $targs.fullHashArray) > -1){

				var $l = $fullHash.lastIndexOf($postFix);
				$hash = $fullHash.slice(0, $l);
				
				//hash target element
				var $scrollPoint = $($hash);

				//if target exists animate to it
				if ($scrollPoint.length) {

					$('body, html').animate({
						scrollTop: $scrollPoint.offset().top
					}, $speed);

					$('body, html').promise().done(function(){
						//console.log('Animation Completed');
					});

				}

			}
		}

		/**
		 * Description
		 * @method scrollPos
		 * @return 
		 */
		var scrollPos = function(){
			var currentScroll = $(window).scrollTop();
			var buffer = Math.round($(window).height() / $redLine);
			for (i=$targs.scrollTopArray.length-1; i>=0; i--) {
				if($targs.scrollTopArray[i].top < currentScroll + buffer) {
					$('.gomover').removeClass($activeClass);
					$('a[href=' + $targs.hashArray[i] + ']').addClass($activeClass);
					$currentLoc = $targs.hashArray[i];
					return;
				}
			}
			return;
		}


		// Throttle - Helper Utility
		/**
		 * Description
		 * @method goThrottle
		 * @param {} fn
		 * @param {} threshhold
		 * @param {} scope
		 * @return FunctionExpression
		 */
		var goThrottle = function(fn, threshhold, scope) {
			threshhold || (threshhold = 250);
			var last,
			deferTimer;
			return function () {
				var context = scope || this;

				var now = +new Date,
				args = arguments;
				if (last && now < last + threshhold) {
					// hold on to it
					clearTimeout(deferTimer);
					deferTimer = setTimeout(function () {
						last = now;
						fn.apply(context, args);
					}, threshhold);
				} else {
					last = now;
					fn.apply(context, args);
				}
			};
		}

		//Debounce - Helper Utility
		/**
		 * Description
		 * @method goDebounce
		 * @param {} fn
		 * @param {} delay
		 * @param {} scope
		 * @return FunctionExpression
		 */
		var goDebounce = function(fn, delay, scope) {
			var timer = null;
			return function () {
				var context = scope || this;
				var args = arguments;
				clearTimeout(timer);
				timer = setTimeout(function () {
					fn.apply(context, args);
				}, delay);
			};
		}
	

		$(window).scroll( 
			goThrottle(scrollPos, 200)
		);

		$(window).bind( 'hashchange', function(e) {
			funcScrollSection(window.location.hash);
 		});

		scrollPos();
 		funcScrollSection(window.location.hash);

	}

})(jQuery);
