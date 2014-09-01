<?php 
/**
 * Customize
 *
 * Theme options are lame! Manage any customizations through the Theme
 * Customizer. Expose the customizer in the Appearance panel for easy access.
 * This uses the customizer class in the mp-core plugin
 *
 * @package mp_menu
 * @since mp_menu 3.0
 */
 
function mp_menu_customizer(){
	
	$args = array(
		array( 'section_id' => 'mp_menu_settings', 'section_title' => __( 'MP Menu', 'mp_core' ),'section_priority' => 1,
			'settings' => array(
				'mp_menu_change_at_screen_width' => array(
					'label'      => __( 'Switch to Pop-Out at this Screen Width', 'mp_core' ),
					'type'       => 'textbox',
					'default'    => '',
					'priority'   => 1,
					'element'    => NULL,
					'jquery_function_name' => NULL,
					'arg' => NULL
				),
				'mp_menu_toggle_color' => array(
					'label'      => __( 'Toggle Switch Color:', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 1,
					'element'    => '.mp-menu-toggle',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_menu_open_from' => array(
					'label'      => __( 'Open Menu From:', 'mp_core' ),
					'type'       => 'select',
					'default'    => '',
					'priority'   => 1,
					'choices'   => array( '', 'mp-menu-left.css' => "Left", 'mp-menu-right.css' => 'Right' ),
					'arg' => NULL
				),
				'mp_menu_bg_color' => array(
					'label'      => __( 'Menu Background Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 1,
					'element'    => '#mp-menu-holder [role~=navigation]',
					'jquery_function_name' => 'css',
					'arg' => 'background-color'
				),
				'mp_menu_text_color' => array(
					'label'      => __( 'Menu Text Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 1,
					'element'    => '#mp-menu-holder [role~=navigation] a, #mp-menu-holder [role~=navigation] ul li a',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_menu_attachment' => array(
					'label'      => __( 'Menu Attachment', 'mp_core' ),
					'type'       => 'radio',
					'default'    => '',
					'priority'   => 1,
					'element'    => '#mp-menu-holder [role~=navigation]',
					'jquery_function_name' => 'css',
					'arg' => 'position',
					'choices'   => array( 'absolute' => "Scroll", 'fixed' => 'Fixed' ),
				),
			)
		)
	);
	
	$args = has_filter('mp_menu_customizer_args') ? apply_filters('mp_menu_customizer_args', $args) : $args;
	
	new MP_CORE_Customizer($args);
}

add_action ('init', 'mp_menu_customizer');