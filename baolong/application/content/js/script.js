jQuery(document).ready(function(){
	$(".openfull").click(function(){
		$(".excerpt").hide();
		$(".fullcontent").show();
	});
	$(".closefull").click(function(){		
		$(".fullcontent").hide();	
		$(".excerpt").show();
	});
	
	jQuery('#featured-product').jcarousel({    	
		auto: 5,
		wrap: 'circular',
		initCallback: mycarousel_initCallback    		
	});		
	jQuery('#promo').jcarousel({
		auto: 5,
		wrap: 'circular',
		initCallback: mycarousel_initCallback		
	});
});
function mycarousel_initCallback(carousel)
{
	// Disable autoscrolling if the user clicks the prev or next button.
	carousel.buttonNext.bind('click', function() {
		carousel.startAuto(0);
	});

	carousel.buttonPrev.bind('click', function() {
		carousel.startAuto(0);
	});

	// Pause autoscrolling if the user moves with the cursor over the clip.
	carousel.clip.hover(function() {
		carousel.stopAuto();
	}, function() {
		carousel.startAuto();
	});
}
