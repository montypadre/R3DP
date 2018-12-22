(function($){
	
	
	if($('.load_more_portfolio_image').length)
	{
		$('.load_more_portfolio_image').on('click',function()
		{
				var total_item=$(this).data('total');
				var per_item=$(this).data('item');
				var offset=$(this).data('offset');
				var show_title=threedvcsettings.show_title;
				var show_content=threedvcsettings.show_content;
				var post_order=threedvcsettings.post_order;
				var portfolio_grid_col=threedvcsettings.portfolio_grid_col;
				var word_limit=threedvcsettings.word_limit;
				var data = {
			 	    action: 'loadPortfolioPosts',
			 	    post_order:post_order,
			 	    show_title:show_title,
			        show_content: show_content,
			        per_item:per_item,
			        offset:offset,		
			        portfolio_grid_col:portfolio_grid_col,	 
			        word_limit:word_limit,
			    };
			   
			    if(total_item>offset)
			    {	
			     	$('.image_spinner_wrapper').show();
				    $.post(threedvcsettings.ajaxurl,data,function(res)
				    {					    	 	
				     	var response = JSON.parse(res);			     				     				    		
				     	if(response.new_offset<total_item)
				     	{
				     		$('.load_more_portfolio_image').data("offset",response.new_offset); 
				     	}
				     	else
				     	{
				     		$('.load_more_portfolio_image').hide();
				     	}
				     	$('.portfolio-box-wrapper').append(response.html);
					     	
				      	$('.image_spinner_wrapper').hide();
				    }); 
				}
		});
	}

	if($(".single-portfolio-list").length)
	{
		$(".single-portfolio-list").owlCarousel({        
	        
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
	  var $grid = $('.masonary-grid-portfolio');
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