<?php

/**
 * http://codex.wordpress.org/Theme_Customization_API
 *
 * How do I "output" custom theme modification settings? http://codex.wordpress.org/Function_Reference/get_theme_mod
 * echo get_theme_mod( 'copyright_info' );
 * or: echo get_theme_mod( 'copyright_info', 'Default &copy; Copyright Info if nothing provided' );
 *
 * "sanitize_callback": http://codex.wordpress.org/Data_Validation
 */

/**
 * Implement Theme Customizer additions and adjustments.
 */

function themes_plus_customizer( $wp_customize ) {
	
/*
 * Initialize sections
 */
	
	$wp_customize->add_section( 'themes_plus_section', array(
		'title'          => '&oplus; them.es Plus',
		'priority'       => 10000,
	) );
	
/*
 * Section: them.es+
 */
	
	/*
	 * Marker image
	 */
	// Header Logo
	$wp_customize->add_setting('themes_plus_map_markerimage', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'themes_plus_map_markerimage', array(
		'label'       => 'Map: Upload Marker image',
		'description' => '128x128px',
		'section'  => 'themes_plus_section',
		'settings' => 'themes_plus_map_markerimage',
		'priority' => 1,
	)));
	
	/*
	 * Lat/Lng Coordinates/Zoom
	 */
	$wp_customize->add_setting( 'themes_plus_map_latlng', array(
		'default'     => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'themes_plus_map_latlng', array(
		'label'       => 'Map: Lat/Lng',
		'description' => '0.0000,0.0000',
		'section'     => 'themes_plus_section',
		'type'        => 'text',
		'priority'    => 2,
		'settings'    => 'themes_plus_map_latlng',
	) );
	
	$wp_customize->add_setting( 'themes_plus_map_zoom', array(
		'default'     => '13',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'themes_plus_map_zoom', array(
		'label'       => 'Map: Zoomfactor',
		'description' => 'Default: 13',
		'section'     => 'themes_plus_section',
		'type'        => 'select',
		'priority'    => 3,
		'choices' => array(
			'1'      => '1',
			'2'      => '2',
			'3'      => '3',
			'4'      => '4',
			'5'      => '5',
			'6'      => '6',
			'7'      => '7',
			'8'      => '8',
			'9'      => '9',
			'10'     => '10',
			'11'     => '11',
			'12'     => '12',
			'13'     => '13',
			'14'     => '14',
			'15'     => '15',
			'16'     => '16',
			'17'     => '17',
			'18'     => '18',
			'19'     => '19',
			'20'     => '20',
			'21'     => '21'
		),
		'settings'   => 'themes_plus_map_zoom',
	) );

	$wp_customize->add_setting( 'themes_plus_map_key', array(
		'default'     => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'themes_plus_map_key', array(
		'label'       => 'Google API Key',
		'description' => 'https://developers.google.com/maps/documentation/javascript/get-api-key',
		'section'     => 'themes_plus_section',
		'type'        => 'text',
		'priority'    => 4,
		'settings'    => 'themes_plus_map_key',
	) );
	
	/*
	 * Map styles
	 */
	$wp_customize->add_setting( 'themes_plus_map_styles', array(
		'default'     => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'themes_plus_map_styles', array(
		'label'       => 'Map: Styles',
		'description' => 'https://developers.google.com/maps/documentation/javascript/styling',
		'section'     => 'themes_plus_section',
		'type'        => 'textarea',
		'priority'    => 5,
		'settings'    => 'themes_plus_map_styles',
	) );
	
	/*
	 * Favicon: Core feature soon? (see: https://core.trac.wordpress.org/ticket/16434)
	
	
	http://wordpress.stackexchange.com/questions/108131/conditional-image-sizes-for-use-via-theme-customizer-upload-only
	
	
	*
	 * Todo:
	 * 0. Upload image (PNG/GIF/JPG) size > "64x64"
	 * 1. Convert image to png
	 * 2. Resize to "64x64"
	 * 3. Rename to "favicon.png"
	 */
	/*$wp_customize->add_setting('themes_plus_favicon', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'themes_plus_favicon', array(
		'label'    => 'Upload Favicon',
		'description' => '64x64px',
		'section'  => 'themes_plus_section',
		'priority' => 9,
		'settings' => themes_plus_favicon',
	)));*/
	
	/*
	 * Touch Icon: Core feature soon? (see: https://core.trac.wordpress.org/ticket/16434)
	 * http://codex.wordpress.org/Class_Reference/WP_Image_Editor
	 *
	 * Todo:
	 * 0. Upload image (PNG/GIF/JPG) size > "512x512"
	 * 1. Convert image to png
	 * 2. Resize to "152x152", "120x120", "76x76", "57x57"
	 * 3. Rename to "apple-touch-icon-###.png"
	 */
	/*$wp_customize->add_setting('themes_plus_touchicon', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'themes_plus_touchicon', array(
		'label'    => 'Upload Touch Icon,
		'description' => '&gt;152x152px',
		'section'  => 'themes_plus_section',
		'priority' => 10,
		'settings' => 'themes_plus_touchicon',
	)));*/
	
}
add_action( 'customize_register', 'themes_plus_customizer' );


/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function themes_plus_customizer_preview_js() {
	wp_enqueue_script( 'customizer', plugin_dir_path( __FILE__ ) . '/inc/customizer.js', array( 'jquery' ), null, true );
}
add_action( 'customize_preview_init', 'themes_plus_customizer_preview_js' );