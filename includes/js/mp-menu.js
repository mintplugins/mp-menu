jQuery(document).ready(function($){
		
	//Add menu holder to screen
	$( 'body' ).prepend( '<div id="mp-menu-holder"></div>' );
	
	//Store location of navigation by adding a placeholder div after it
	$( '[role=navigation]' ).after( '<div id="mp-menu-navigation-placeholder"></div>' );
  	
	//Add menu toggle to screen
	$( '[role=navigation]' ).after( '<div id="mp-menu-toggle-button-holder"><a class="mp-menu-menu-1 mp-menu-toggle"></a></div>' );
	
	//Add close menu to mp-menu-holder
	$( '[role=navigation]' ).prepend( '<div id="mp-menu-close-button-holder"><a class="mp-menu-menu-1 mp-menu-close-button"></a></div><div style="clear: both;"></div>' );
	
	//Items which should have the "open" or "close" class added to them
	var $items = $( '.site, .hfeed, [role=navigation]' );
	var $content = $('body');
	
	var open = function() {
		//$( 'body' ).addClass( 'mobile-open' );
		$content.addClass( 'mp-menu-body-open' );
		$items.removeClass('mp-menu-close').addClass('mp-menu-open');
		
	}

	var close = function() { 
		//$( 'body' ).delay(300).removeClass( 'mobile-open' );
		$content.removeClass( 'mp-menu-body-open' );
		$items.removeClass('mp-menu-open').addClass('mp-menu-close');
		
		//After the transition is done, remove the mp-menu-close class because it breaks fixed menus because the properites conflict		
		setTimeout(function() {
			$items.removeClass( 'mp-menu-close' );
		}, 300);
		
	}
	
	//When toggle switch is clicked
  	$( '.mp-menu-toggle, .mp-menu-close-button' ).click(function(e){
		
		e.preventDefault();

		$content.hasClass( 'mp-menu-body-open' ) ? $(close) : $(open);
	});
	
	//When the screen is smaller than 1180px
	enquire.register("screen and (max-width:1180px)", {
						
			// OPTIONAL
			// If supplied, triggered when a media query matches.
			match : function() {
				
				//Move site navigation - this only needs to be done if the overflow:hidden value is set on the parent. This must be moved outside of that
				$( '#mp-menu-holder' ).append( $( '[role=navigation]' ) );
				
			},      
										
			// OPTIONAL
			// If supplied, triggered when the media query transitions 
			// *from a matched state to an unmatched state*.
			unmatch : function() {
				
				//Move site navigation back to its original location
				$( '#mp-menu-navigation-placeholder' ).before( $( '[role=navigation]' ) );
					
			}
			
	});
	
});