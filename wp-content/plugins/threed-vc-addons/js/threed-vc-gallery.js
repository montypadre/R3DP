
(function($){
	
	function prettyPhotoLoad()
	{	    
	     $("a[rel^='gridprettyPhoto']").prettyPhoto();    
	}
	if($('.prettyphoto').length)
 	{
 		prettyPhotoLoad();
 	}
	if($('.load_more_gallery_image').length)
	{
		$('.load_more_gallery_image').on('click',function()
		{
				var total_item=$(this).data('total');
				var per_item=$(this).data('item');
				var offset=$(this).data('offset');
				var threed_gallery_grid_col=threedvcsettings.threed_gallery_grid_col;
				var threed_gallery_on_click=threedvcsettings.threed_gallery_on_click;
				var page_id=threedvcsettings.page_id;		



				var data = {
			      action: 'loadGalleryImages',
			      image_ids: threedvcsettings.image_ids,
			      total_item:total_item,
			      per_item:per_item,
			      offset:offset,
			      threed_gallery_grid_col:threed_gallery_grid_col,
			      threed_gallery_on_click:threed_gallery_on_click,
			      page_id:page_id
			    };
				
			    if(total_item>offset)
			    {	
			    	$('.image_spinner_wrapper').show();
				    $.post(threedvcsettings.ajaxurl,data,function(res)
				    {		     	
				     	var response = JSON.parse(res);			     				     				    		
				     	if(response.new_offset<total_item)
				     	{
				     		$('.load_more_gallery_image').data("offset",response.new_offset); 
				     	}
				     	else
				     	{
				     		$('.load_more_gallery_image').hide();
				     	}
				     	$('.gallery-box-wrapper').append(response.html);
				     	if($('.prettyphoto').length)
				     	{
				     		prettyPhotoLoad();
				     	}
				     	$('.image_spinner_wrapper').hide();
				    }); 
				}
		});
	}
	if($(".single-gallery-list").length)
	{
		$(".single-gallery-list").owlCarousel({        
	        
	        center : true,
		      loop : true,
		      itemsDesktop : [1199,1],
		      itemsDesktopSmall : [991,1],
		      itemsTablet: [767,3],
		      itemsTabletSmall: [650,1],
		      itemsMobile : [479,1],
		      singleItem : true,
		      dotsEach : true		
		});
	}	
	 /* --------------- masonary -----------------*/
	  var $grid = $('.masonary-grid');
	  if($grid.length){
	      var masonaryOptions = {
	        isAnimated: true,
	        gutter: 15,
	        isFitWidth: true
	      };

	      $grid.imagesLoaded(function () {
	          $grid.masonry(masonaryOptions);
	      });

	      $(window).on('threedResizeEnd', function () {
	          $grid.masonry(masonaryOptions);
	      });
	  }

})(jQuery);/* =========== DOCUMENT READY ends ======================= */