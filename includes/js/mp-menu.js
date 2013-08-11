jQuery(document).ready(function($){
		
	//Add menu holder to screen
	$( 'body' ).prepend( '<div id="mp-menu-holder"></div>' );
	
	//Store location of navigation by adding a placeholder div after it
	$( '[role=navigation]' ).filter(':even').after( '<div id="mp-menu-navigation-placeholder"></div>' );
  	
	//Add menu toggle to screen
	$( '[role=navigation]' ).filter(':even').after( '<div id="mp-menu-toggle-button-holder"><a class="mp-menu-toggle"></a></div>' );
	
	//Add close menu to mp-menu-holder
	$( '[role=navigation]' ).filter(':even').append( '<div id="mp-menu-close-button-holder"><a class="mp-menu-close-button"></a></div><div style="clear: both;"></div>' );
	
	//Items which should have the "open" or "close" class added to them
	var $items = $( '.site, .hfeed, [role=navigation]' );
	var $content = $('body');
	
	//Open function
	var open = function() {
		//$( 'body' ).addClass( 'mobile-open' );
		$content.addClass( 'mp-menu-body-open' );
		$items.removeClass('mp-menu-close').addClass('mp-menu-open');
		
	}
	
	//Close function
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
						
			// If supplied, triggered when a media query matches.
			match : function() {
				
				//Move site navigation - this only needs to be done if the overflow:hidden value is set on the parent. This must be moved outside of that
				$( '#mp-menu-holder' ).append( $( '[role=navigation]' ).filter(':even') );
				
				//Dropdowns - show them when clicked 
				$(document).on('click', '#mp-menu-holder li a:not(:last-child)', function(menu_item_clicked){
					
					//Prevent the default click action
					menu_item_clicked.preventDefault();
					
					//Toggle the desplay of this drodown sub-menu
					$(this).next().slideToggle();
								
				});
	
				
			},      
										
			// If supplied, triggered when the media query transitions 
			// *from a matched state to an unmatched state*.
			unmatch : function() {
				
				//Move site navigation back to its original location
				$( '#mp-menu-navigation-placeholder' ).before( $( '[role=navigation]' ).filter(':even') );
				
				//Remove all inline display styles added to li elements for dropdowns
				$( '.sub-menu' ).css( 'display', '' );
									
			}
			
	});
		
});