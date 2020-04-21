
//Class 3.6
;(function($){
	$(window).on("elementor/frontend/init", function(){
		elementorFrontend.hooks.addAction('frontend/element_ready/ProgressbarWidget.default', function($scope,){
			//$(".progress").each(function(){
			$scope.find(".progress").each(function(){
				var element = $(this)[0];
				//Class 3.7
				var bar_color = $(this).data("bar_color");
				var bar_fill = $(this).data("bar_fill");
				var bar_height = $(this).data("bar_height");
				//end Class 3.7
				if(element) {
				var bar = new ProgressBar.Line(element, {
					strokeWidth: 4,
					easing: 'easeInOut',
					duration: 1400,
					color: bar_color,
					trailColor: '#777',
					trailWidth: 1,
					svgStyle: {width: '80%', height: bar_height},
					text: {
					    style: {
					    	// Text color.
							// Default: same as stroke color (options.color)
							color: '#333',
							position: 'absolute',
							right: '0',
							top: '0px',
							padding: 0,
							margin: 0,
							transform: null
						},
					    autoStyleContainer: false
					},
					step: (state, bar) => {
						bar.setText(Math.round(bar.value() * 100) + ' %');
					}
				});
			}
				bar.animate(bar_fill);  // Number from 0.0 to 1.0
			});

		});
				
		//});			
	});
	$(document).ready(function(){
		//alert("loaded");
		//console.log("loaded");		
	});
})(jQuery);