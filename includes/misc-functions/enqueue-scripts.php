<?php

/**
 * Enqueue Scripts for the MP Menu
 */
 function mp_menu_enqueue_scripts(){
		
	 //Get screen width for MP menu
	 $screen_width = get_theme_mod('mp_menu_change_at_screen_width');
	 $screen_width = empty($screen_width) ? 600 : $screen_width;
	 
	 //Enqueue Defualt setup CSS
	 wp_enqueue_style( 'mp_menu_css', plugins_url( '/css/mp-menu.css', dirname( __FILE__ ) ) );
	  
	 //MP Menu CSS
	 $menu_css = get_theme_mod( 'mp_menu_open_from' ) ;
	 $menu_css = !empty( $menu_css ) ? $menu_css : 'mp-menu-left.css';
	 
	 $output = '<!-- MP Menu CSS -->
	 ';
	  
	 //Open from right CSS
	 if ( $menu_css == 'mp-menu-left.css' ){
		 
		 $output .= '<style type="text/css">';
		 	
			 $output .= '@media (max-width: ' . $screen_width . 'px){';
					
				 $output .= '#mp-menu-toggle-button-holder, #mp-menu-close-button-holder{';
					 $output .= 'display:inline-block!important;';
				 $output .= '}';
					
				 $output .= '.mp-menu-open {';
					 $output .= '-webkit-transform: translate3d(240px, 0, 0);';
					 $output .= '-moz-transform: translate3d(240px, 0, 0);';
					 $output .= 'transform: translate3d(240px, 0, 0);';
					
					 $output .= '-webkit-transition: all .3s;';
					 $output .= 'transition: all .3s;';
				$output .= '}';
				
				$output .= '.mp-menu-close {';
					$output .= '-webkit-transform: translate3d(0, 0, 0);';
					$output .= '-moz-transform: translate3d(0, 0, 0);';
					$output .= 'transform: translate3d(0, 0, 0);';
					
					$output .= '-webkit-transition: all .3s;';
					$output .= 'transition: all .3s;';
				$output .= '}';
					
				$output .= '#mp-menu-holder{';
					$output .= 'display:block;';
				$output .= '}';
				
				$output .= '#mp-menu-holder [role~=navigation]{';
					$output .= 'width: 240px;';
					$output .= 'margin:0px!important;';
					$output .= 'position: absolute;';
					$output .= 'top: 0;';
					$output .= 'overflow:hidden;';
					
					$output .= '-webkit-transform: translate3d(-240px, 0, 0);';
					$output .= '-moz-transform: translate3d(-240px, 0, 0);';
					$output .= 'transform: translate3d(-240px, 0, 0);	';
					
					$output .= '-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */';
					$output .= '-moz-box-sizing: border-box;    /* Firefox, other Gecko */';
					$output .= 'box-sizing: border-box;         /* Opera/IE 8+ */';
					
					$output .= '-webkit-transition: all .3s;';
					$output .= 'transition: all .3s;';
				$output .= '}';
				
				$output .= '#mp-menu-holder .mp-menu-open{';
					$output .= '-webkit-transform: translate3d(0, 0, 0)!important;';
					$output .= '-moz-transform: translate3d(0, 0, 0)!important;';
					$output .= 'transform: translate3d(0, 0, 0)!important;	';
					
					$output .= '-webkit-transition: all .3s;';
					$output .= 'transition: all .3s;';
				$output .= '}';
			
			$output .= '} </style>';
		 
	 }
	 //Open from left CSS
	 else{
		$output .= '<style type="text/css">';
		
		$output .= '@media (max-width: ' . $screen_width . 'px){';
	
				$output .= '/*toggle and close buttons */';
				$output .= '#mp-menu-toggle-button-holder, #mp-menu-close-button-holder{';
					$output .= 'display:inline-block!important;';
				$output .= '}';
				
				$output .= '/*This gets applied to the body upon open*/';
				$output .= '.mp-menu-open {';
					$output .= '-webkit-transform: translate3d(-240px, 0, 0);';
					$output .= '-moz-transform: translate3d(-240px, 0, 0);';
					$output .= 'transform: translate3d(-240px, 0, 0);';
					
					$output .= '-webkit-transition: all .3s;';
					$output .= 'transition: all .3s;';
				$output .= '}';
				
				$output .= '/*This gets applied to the body upon close */';
				$output .= '.mp-menu-close {';
					$output .= '-webkit-transform: translate3d(0, 0, 0);';
					$output .= '-moz-transform: translate3d(0, 0, 0);';
					$output .= 'transform: translate3d(0, 0, 0);';
					$output .= 'right:0px;';
					
					$output .= '-webkit-transition: all .3s;';
					$output .= 'transition: all .3s;';
				$output .= '}';
				
				$output .= '/*This holds the menu when the screen is mobile sized */';
				$output .= '#mp-menu-holder{';
					$output .= 'display:block;	';
				$output .= '}';
				
				$output .= '/* This is the actual navigation div from wordpress when sitting in our mp-menu-holder div */';
				$output .= '#mp-menu-holder [role~=navigation]{';
					$output .= 'width: 240px;';
					$output .= 'margin:0px!important;';
					$output .= 'position: absolute;';
					$output .= 'top: 0;';
					$output .= 'right: 0px;';
					$output .= 'overflow:hidden;';
					
					$output .= '-webkit-transform: translate3d(240px, 0, 0);';
					$output .= '-moz-transform: translate3d(240px, 0, 0);';
					$output .= 'transform: translate3d(240px, 0, 0);	';
					
					$output .= '-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */';
					$output .= '-moz-box-sizing: border-box;    /* Firefox, other Gecko */';
					$output .= 'box-sizing: border-box;         /* Opera/IE 8+ */';
					
					$output .= '-webkit-transition: all .3s;';
					$output .= 'transition: all .3s;';
				$output .= '}';
				
				$output .= '/*This gets applied to the navigation menu when it is "open" */';
				$output .= '#mp-menu-holder .mp-menu-open{';
					$output .= '-webkit-transform: translate3d(0, 0, 0)!important;';
					$output .= '-moz-transform: translate3d(0, 0, 0)!important;';
					$output .= 'transform: translate3d(0, 0, 0)!important;	';
					
					$output .= '-webkit-transition: all .3s;';
					$output .= 'transition: all .3s;';
				$output .= '}';
					
				$output .= '.mp-menu-header-search{';
					$output .= 'display:block;';
				$output .= '}';
				
			$output .= '}</style>'; 
	 }
	 
	 //Additional CSS dependant on the screen width variable
	 $output .= '<style type="text/css">';
	 		
			$output .= '@media (max-width: ' . $screen_width . 'px){';
			$output .= '#mp-menu-holder #mp-menu-holder-inner [role~=navigation]{';
				$output .= 'padding: 5px 20px 0px 20px!important;';
				$output .= 'height:100%;';
			$output .= '}';
			
			$output .= '#mp-menu-holder #mp-menu-holder-inner [role~=navigation] div{';
				$output .= 'float:none;';
			$output .= '}';
			
			$output .= '#mp-menu-holder #mp-menu-holder-inner ul{';
				$output .= 'box-shadow:none;';
				$output .= 'border-radius:0;';
				$output .= 'opacity:1;';
				$output .= '-webkit-backface-visibility:visible;';
				$output .= '-moz-backface-visibility: visible;';
				$output .= 'backface-visibility: visible;';
				$output .= '-webkit-transform: none;';
				$output .= '-moz-transform: none;';
				$output .= 'transform: none;';
			$output .= '}';
			
			$output .= '#mp-menu-holder #mp-menu-holder-inner li a{';
				$output .= 'border-radius:0;	';
			$output .= '}';
			
			$output .= '#mp-menu-holder #mp-menu-holder-inner li a:hover{';
				$output .= 'background:none;	';
			$output .= '}';
			
			$output .= '#mp-menu-holder #mp-menu-holder-inner li a:not(:last-child):after{';
				$output .= 'font-family: "mp_menu";';
				$output .= 'content: \'\e806\';';
				$output .= 'margin-left: 5px;';
				$output .= 'display: inline-block;';
				$output .= '-webkit-transform: rotate(0deg);';
				$output .= '-moz-transform: rotate(0deg);';
				$output .= '-o-transform: rotate(0deg);';
				$output .= '-ms-transform: rotate(0deg);';
				$output .= 'transform: rotate(0deg);';
				
				$output .= '-webkit-transition: all .3s;';
				$output .= 'transition: all .3s;';
			$output .= '}';
			
			$output .= '#mp-menu-holder #mp-menu-holder-inner li a:not(:last-child):hover:after{';
				$output .= '-webkit-transform: rotate(90deg);';
				$output .= '-moz-transform: rotate(90deg);';
				$output .= '-o-transform: rotate(90deg);';
				$output .= '-ms-transform: rotate(90deg);';
				$output .= 'transform: rotate(90deg);';
			$output .= '}';
			
			$output .= '#mp-menu-holder #mp-menu-holder-inner ul,  #mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li{';
				$output .= 'margin:0!important;';
				$output .= 'padding:0!important;';
			$output .= '}';
			
			$output .= '#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul:after{';
				$output .= 'border:none;';
				$output .= 'border-radius:0;';
			$output .= '}';
			
			$output .= '#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li a{';
				$output .= 'display:block;';
				$output .= 'padding:5px 0px 5px 0px!important;';
			$output .= '}';
			
			$output .= '#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul, #mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li{';
				$output .= 'position:relative!important;';
				$output .= 'float:none!important;';
				$output .= 'clear: left;';
				$output .= 'display:block;';
				$output .= 'border:none;';
			$output .= '}';
			$output .= '#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li ul, #mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li ul li ul, #mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li ul li ul li ul{';
				$output .='margin-left:20px!important;';
				$output .= 'top:0px;';
				$output .= 'left:0px;';
				$output .= 'background:none;';
			$output .= '}';
			$output .= '/*Reset hover show/hide for dropdown menus. This is now handled by jquery on "click" */';
			$output .= '#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li ul,';
			$output .= '#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li:hover ul,';
			$output .= '#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li ul li:hover ul,';
			$output .= '#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li ul li ul li:hover ul,';
			$output .= '#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li ul li ul li ul li:hover ul{';
				$output .= 'display:none;';
			$output .= '}';
			
			$output .= '.mp-menu-toggle:before{';
				$output .= 'content:\'\e800\';';
			$output .= '}';
			$output .= '#mp-menu-close-button-holder .mp-menu-close-button:before{';
				$output .= 'content: \'\e805\';';
				$output .= 'font-size:150%;';
				$output .= 'margin-left:-3px;';
			$output .= '}';
		$output .= '}</style>';
	
	echo $output;
	 
	 //MP Menu Skin
	 $menu_skin = get_theme_mod( 'mp_menu_skin' ) ;
	 $menu_skin = !empty( $menu_skin ) ? $menu_skin : 'mp-menu-default-skin.css';
	 wp_enqueue_style( 'mp_menu_skin', plugins_url( '/css/skins/' . $menu_skin, dirname( __FILE__ ) ) );
	 	 
	 //Enable Media Queries for JS
	 wp_enqueue_script( 'mp_menu_enquire', plugins_url( '/js/enquire.min.js', dirname( __FILE__ ) ) );
	 
	 //MP Menu JS
	 wp_enqueue_script( 'mp_menu_js', plugins_url( '/js/mp-menu.js', dirname( __FILE__ ) ), array( 'jquery', 'mp_menu_enquire' ) );
	 wp_localize_script( 'mp_menu_js', 'mp_menu_vars', array(
 	 	'change_at_screen_width' => $screen_width
     ));	
	 
 }
 add_action( 'wp_enqueue_scripts', 'mp_menu_enqueue_scripts' );
	