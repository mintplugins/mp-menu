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
	 
	 //Open from right CSS
	 if ( $menu_css == 'mp-menu-left.css' ){
		 
		 echo '<style type="text/css">
		 	
			@media (max-width: ' . $screen_width . 'px){
					
				#mp-menu-toggle-button-holder, #mp-menu-close-button-holder{
					display:inline-block;
				}
					
				.mp-menu-open {
					-webkit-transform: translate3d(240px, 0, 0);
					-moz-transform: translate3d(240px, 0, 0);
					transform: translate3d(240px, 0, 0);
					
					-webkit-transition: all .3s;
					transition: all .3s;
				}
				
				.mp-menu-close {
					-webkit-transform: translate3d(0, 0, 0);
					-moz-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
					
					-webkit-transition: all .3s;
					transition: all .3s;
				}
					
				#mp-menu-holder{
					display:block;	
				}
				
				#mp-menu-holder [role~=navigation]{
					width: 240px;
					margin:0px!important;
					position: absolute;
					top: 0;
					overflow:hidden;
					
					-webkit-transform: translate3d(-240px, 0, 0);
					-moz-transform: translate3d(-240px, 0, 0);
					transform: translate3d(-240px, 0, 0);	
					
					-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
					-moz-box-sizing: border-box;    /* Firefox, other Gecko */
					box-sizing: border-box;         /* Opera/IE 8+ */
					
					-webkit-transition: all .3s;
					transition: all .3s;
				}
				
				#mp-menu-holder .mp-menu-open{
					-webkit-transform: translate3d(0, 0, 0)!important;
					-moz-transform: translate3d(0, 0, 0)!important;
					transform: translate3d(0, 0, 0)!important;	
					
					-webkit-transition: all .3s;
					transition: all .3s;
				}
			
			} </style>';
		 
	 }
	 //Open from left CSS
	 else{
		echo '<style type="text/css"">
		
		@media (max-width: ' . $screen_width . 'px){
	
				/*toggle and close buttons */
				#mp-menu-toggle-button-holder, #mp-menu-close-button-holder{
					display:inline-block;
				}
				
				/*This gets applied to the body upon open*/
				.mp-menu-open {
					-webkit-transform: translate3d(-240px, 0, 0);
					-moz-transform: translate3d(-240px, 0, 0);
					transform: translate3d(-240px, 0, 0);
					
					-webkit-transition: all .3s;
					transition: all .3s;
				}
				
				/*This gets applied to the body upon close */
				.mp-menu-close {
					-webkit-transform: translate3d(0, 0, 0);
					-moz-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
					right:0px;
					
					-webkit-transition: all .3s;
					transition: all .3s;
				}
				
				/*This holds the menu when the screen is mobile sized */
				#mp-menu-holder{
					display:block;	
				}
				
				/* This is the actual navigation div from wordpress when sitting in our mp-menu-holder div */
				#mp-menu-holder [role~=navigation]{
					width: 240px;
					margin:0px!important;
					position: absolute;
					top: 0;
					right: 0px;
					overflow:hidden;
					
					-webkit-transform: translate3d(240px, 0, 0);
					-moz-transform: translate3d(240px, 0, 0);
					transform: translate3d(240px, 0, 0);	
					
					-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
					-moz-box-sizing: border-box;    /* Firefox, other Gecko */
					box-sizing: border-box;         /* Opera/IE 8+ */
					
					-webkit-transition: all .3s;
					transition: all .3s;
				}
				
				/*This gets applied to the navigation menu when it is "open" */
				#mp-menu-holder .mp-menu-open{
					-webkit-transform: translate3d(0, 0, 0)!important;
					-moz-transform: translate3d(0, 0, 0)!important;
					transform: translate3d(0, 0, 0)!important;	
					
					-webkit-transition: all .3s;
					transition: all .3s;
				}
					
				.mp-menu-header-search{
					display:block;
				}
				
			}</style>'; 
	 }
	 
	 //Additional CSS dependant on the screen width variable
	 echo '<style type="text/css">
	 		
			@media (max-width: ' . $screen_width . 'px){
			#mp-menu-holder #mp-menu-holder-inner [role~=navigation]{
				padding: 5px 20px 0px 20px;
				height:100%;
			}
			
			#mp-menu-holder #mp-menu-holder-inner [role~=navigation] div{
				float:none;
			}
			
			#mp-menu-holder #mp-menu-holder-inner ul{
				box-shadow:none;
				border-radius:0;
				opacity:1;
				-webkit-backface-visibility:visible;
				-moz-backface-visibility: visible;
				backface-visibility: visible;
				-webkit-transform: none;
				-moz-transform: none;
				transform: none;
			}
			
			#mp-menu-holder #mp-menu-holder-inner li a{
				border-radius:0;	
			}
			
			#mp-menu-holder #mp-menu-holder-inner li a:hover{
				background:none;	
			}
			
			#mp-menu-holder #mp-menu-holder-inner li a:not(:last-child):after{
				font-family: "mp_menu";
				content: \'\e806\';
				margin-left: 5px;
				display: inline-block;
				-webkit-transform: rotate(0deg);
				-moz-transform: rotate(0deg);
				-o-transform: rotate(0deg);
				-ms-transform: rotate(0deg);
				transform: rotate(0deg);
				
				-webkit-transition: all .3s;
				transition: all .3s;
			}
			
			#mp-menu-holder #mp-menu-holder-inner li a:not(:last-child):hover:after{
				-webkit-transform: rotate(90deg);
				-moz-transform: rotate(90deg);
				-o-transform: rotate(90deg);
				-ms-transform: rotate(90deg);
				transform: rotate(90deg);
			}
			
			#mp-menu-holder #mp-menu-holder-inner ul,  #mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li{
				margin:0!important;
				padding:0!important;
			}
			
			#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul:after{
				border:none;
				border-radius:0;
			}
			
			#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li a{
				display:block;
				 padding:5px 0px 5px 0px!important;
			}
			
			#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul, #mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li{
				position:relative!important;
				float:none!important;
				clear: left;
				display:block;
				border:none;
			}
			#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li ul, #mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li ul li ul, #mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li ul li ul li ul{
				margin-left:20px!important;
				top:0px;
				left:0px;
				background:none;
			}
			/*Reset hover show/hide for dropdown menus. This is now handled by jquery on "click" */
			#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li ul,
			#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li:hover ul,
			#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li ul li:hover ul,
			#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li ul li ul li:hover ul,
			#mp-menu-holder #mp-menu-holder-inner [role~=navigation] ul li ul li ul li ul li:hover ul{
				display:none;
			}
			
			.mp-menu-toggle:before{
				content:\'\e800\';
			}
			#mp-menu-close-button-holder .mp-menu-close-button:before{
				content: \'\e805\';
				font-size:150%;
				margin-left:-3px;
			}
		}</style>';
	 
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
	