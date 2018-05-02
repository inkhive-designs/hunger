jQuery(document).ready( function() {
	jQuery('#searchicon').click(function() {
		jQuery('#jumbosearch').fadeIn();
		jQuery('#jumbosearch input').focus();
	});
	jQuery('#jumbosearch .closeicon').click(function() {
		jQuery('#jumbosearch').fadeOut();
	});
	jQuery('body').keydown(function(e){
	    
	    if(e.keyCode == 27){
	        jQuery('#jumbosearch').fadeOut();
	    }
	});
	
	//masonry
/*
	jQuery('.masonry-main').masonry({
	  itemSelector: '.hunger'
	});
*/
	jQuery(".navigation-area").hide();
    jQuery(".megamenu-toggle").click(function(){
        jQuery(".navigation-area").slideToggle('slow');
    });

    jQuery("#site-navigation ul li.menu-item-has-children ul").hide();
    jQuery("#site-navigation ul li.menu-item-has-children").click(function(){
        jQuery(this).find("ul").slideToggle('slow');
    });

	jQuery('.nav-tabs li').click(function(){
		var cat = jQuery(this).attr("class");
	});
    if(jQuery("article").hasClass("category-" + jQuery(this).attr("class"))) {
        jQuery("article").show();
    }else {
        jQuery("article").hide();
    }
});

jQuery(window).load(function() {
        jQuery('#nivoSlider').nivoSlider({
	        prevText: "<i class='fa fa-chevron-circle-left'></i>",
	        nextText: "<i class='fa fa-chevron-circle-right'></i>",
        });
    });	
    
(function($) {
	$(document).ready(function() { 
		
		function showSlide(slide) {
			$('.slide').removeClass('visible');
			$('.'+slide).addClass('visible');
		}
		
		
		jQuery('.slide').addClass('not-visible');
		$('.slide1').addClass('visible');
		$('.thumb1').addClass('arrowed');
		$('.thumb').click(function() {
			$('.thumb').removeClass('arrowed');
			$(this).addClass('arrowed');
			
			if ( $(this).hasClass('thumb1') ) {
				showSlide('slide1');
			}
			if ( $(this).hasClass('thumb2') ) {
				showSlide('slide2');
			}
			if ( $(this).hasClass('thumb3') ) {
				showSlide('slide3');
			}
			if ( $(this).hasClass('thumb4') ) {
				showSlide('slide4');
			}
		});
	});
	
})( jQuery );


/*
Carousel Post Offers
 */
jQuery('.owl-carousel').owlCarousel({
    items: 4,
    margin: 1,
    loop: true,
    dots: false,
    nav: true,
    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
    responsive: {
        400 : {
            items : 1,
        },
        // breakpoint from 768 up
        768 : {
            items: 2,
        },
        991 : {
            items: 4,
        }
    }

});


/*
Loading Posts Category By Ajax
 */
jQuery(document).ready(function(jQuery) {
    jQuery('.cat-filter').click( function(event) {

        // Prevent default action - opening tag page
        if (event.preventDefault) {
            event.preventDefault();
        } else {
            event.returnValue = false;
        }

        // Get tag slug from title attirbute
        var selecetd_taxonomy = jQuery(this).attr('title');

        // After user click on tag, fade out list of posts
        jQuery('.categorized-posts').fadeOut();

        data = {
            action: 'filter_posts', // function to execute
            afp_nonce: afp_vars.afp_nonce, // wp_nonce
            taxonomy: selecetd_taxonomy, // selected tag
        };

        jQuery.post( afp_vars.afp_ajax_url, data, function(response) {

            if( response ) {
                // Display posts on page
                jQuery('.categorized-posts').html( response );
                // Restore div visibility
                jQuery('.categorized-posts').fadeIn();
            };
        });
    });
});