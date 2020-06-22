/**
 * RT Ecommerce Additional Theme JS
 */
jQuery(function($){

    $(window).scroll(function(){
    	var scrollTop = $(window).scrollTop();
    	if( scrollTop > 0 ){
    		$('.menubar').addClass('scrolled');
    	}else{
    		$('.menubar').removeClass('scrolled');
    	}
        $('.main-header').css('background-position', 'center ' + (scrollTop / 2) + 'px');
    });

    $('.menu > ul').superfish({
		delay:       500,                            
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'                         
	});

    $('.toggle-nav').click(function(){
    	$('#site-navigation').slideToggle('slow');
        $( '.menubar' ).toggleClass( "hmenu" );
    });
});

jQuery(document).ready(function() {
// Main Banner Slier

	jQuery('.banner_slider').slick({
	  dots: true,
	  arrows: true,
	  nextArrow: '<div class="left_arrow"><i class="fas fa-long-arrow-alt-right"></i></div>',
			prevArrow: '<div class="right_arrow"><i class="fas fa-long-arrow-alt-left"></i></div>',
	  infinite: true,
	  speed: 300,
	  slidesToShow: 1
	});
});