(function($){
	
	$(".team-vc-slider").owlCarousel({
	  	autoPlay: true,
	  	loop:true,
        items : threedsettings.team_item,    
        itemsDesktopSmall : [979,2],
        itemsDesktop : [1199,2],       
        itemsTablet: [767,2],
        itemsTabletSmall: [650,1],
        itemsMobile : [479,1],
        center: true,
		
	});

	if(threedsettings.team_navigation=="ARROW")
	{		
		$(".team-vc-slider").data('owlCarousel').reinit({

			pagination:false,
			navigation:true,
	    	navigationText	:["<i class='fa fa-angle-left'>","<i class='fa fa-angle-right'>"]

		});
	}		
})(jQuery);/* =========== DOCUMENT READY ends ======================= */