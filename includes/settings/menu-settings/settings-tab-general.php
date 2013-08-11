<?php			
/**
 * This is the code that will create a new tab of settings for your page.
 * To create a new tab and set up this page:
 * Step 1. Duplicate this page and include it in the "class initialization function".
 * Step 1. Do a find-and-replace for the term 'mp_menu_settings' and replace it with the slug you set when initializing this class
 * Step 2. Do a find and replace for 'general' and replace it with your desired tab slug
 * Step 3. Go to line 17 and set the title for this tab.
 * Step 4. Begin creating your custom options on line 30
 * Go here for full setup instructions: 
 * http://moveplugins.com/doc/settings-class/
 */


/**
* Create new tab
*/
function mp_menu_settings_general_new_tab( $active_tab ){
	
	//Create array containing the title and slug for this new tab
	$tab_info = array( 'title' => __('MP Menu Settings' , 'mp_menu'), 'slug' => 'general' );
	
	global $mp_menu_settings; $mp_menu_settings->new_tab( $active_tab, $tab_info );
		
}
//Hook into the new tab hook filter contained in the settings class in the Move Plugins Core
add_action('mp_menu_settings_new_tab_hook', 'mp_menu_settings_general_new_tab');

/**
* Create settings
*/
function mp_menu_settings_general_create(){
	
	
	register_setting(
		'mp_menu_settings_general',
		'mp_menu_settings_general',
		'mp_core_settings_validate'
	);
	
	add_settings_section(
		'general_settings',
		__( 'General Settings', 'mp_menu' ),
		'__return_false',
		'mp_menu_settings_general'
	);
	
	add_settings_field(
		'mp_menu_bg_color',
		__( 'Menu Background Color', 'mp_menu' ), 
		'mp_core_colorpicker',
		'mp_menu_settings_general',
		'general_settings',
		array(
			'name'        => 'mp_menu_bg_color',
			'value'       => mp_core_get_option( 'mp_menu_settings_general',  'mp_menu_bg_color' ),
			'description' => __( 'Set the background color you want to use for the pop-out-menu. (Optional)', 'mp_menu' ),
			'registration'=> 'mp_menu_settings_general',
		)
	);
	
	add_settings_field(
		'mp_menu_popout_location',
		__( 'Popout Location', 'mp_menu' ), 
		'mp_core_select',
		'mp_menu_settings_general',
		'general_settings',
		array(
			'name'        => 'mp_menu_popout_location',
			'value'       => mp_core_get_option( 'mp_menu_settings_general',  'mp_menu_popout_location' ),
			'description' => __( 'From where should the menu pop-out?', 'mp_menu' ),
			'registration'=> 'mp_menu_settings_general',
			'options'=> array( 'left' => "Left", 'right' => "Right" ),
		)
	);
		
	//additional general settings
	do_action('mp_menu_settings_additional_general_settings_hook');
}
add_action( 'admin_init', 'mp_menu_settings_general_create' );