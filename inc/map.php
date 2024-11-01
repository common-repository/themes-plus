<?php
	$map_styles = trim( esc_html( get_theme_mod('themes_plus_map_styles') ) );

	if ( !empty($map_styles) ):
		echo '<script>var styles = ' . $map_styles . '</script>';
	endif;
	
	// [map latlng='###.####,###.####' zoom='##' marker='http://']
	// 1. Check Shortcode attributes (first choice!): $latlng, $zoom
	extract(shortcode_atts(array(
		'latlng' => '',
		'zoom' => '',
		'marker' => '',
		'class' => '',
		'style' => '',
		'key' => ''
	), $atts));
	
	if ( empty($latlng) ):
		// Use global settings (Theme Customization API)
		$latlng = trim( esc_attr( get_theme_mod('themes_plus_map_latlng') ) );
	endif;
	
	if ( empty($zoom) ):
		// Use global settings (Theme Customization API)
		$zoom = trim( esc_attr( get_theme_mod('themes_plus_map_zoom', '13') ) );
	endif;
	
	if ( empty($marker) ):
		// Use global settings (Theme Customization API)
		$marker = trim( esc_attr( get_theme_mod('themes_plus_map_markerimage') ) );
	endif;

	if ( empty($key) ):
		// Use global settings (Theme Customization API)
		$key = trim( esc_attr( get_theme_mod('themes_plus_map_key') ) );
	endif;
?>

<div id="map-container"<?php if ( !empty($class) ): echo ' class="' . $class . '"'; endif; if ( !empty($style) ): echo ' style="' . $style . '"'; endif; ?>>
	<?php
		if ( !empty($latlng) ):

			// Load Google Maps API
			wp_register_script( 'gmapsapi', 'https://maps.googleapis.com/maps/api/js?' . ( !empty($key) ? '?key=' . $key : '' ), false, '1.0', false );
			wp_enqueue_script( 'gmapsapi' );

			// Initialize Google Maps
			wp_register_script( 'gmapsinit', plugins_url( '/js/map.min.js', dirname(__FILE__) ), array('gmapsapi'), '1.0', false );
			wp_enqueue_script( 'gmapsinit' );
	?>
		<div id="map-canvas" data-latlng="<?php echo $latlng; ?>"<?php if ( !empty($zoom) ): echo ' data-zoom="' . $zoom . '"'; endif; if ( !empty($marker) ): echo ' data-marker="' . $marker . '"'; endif; ?>><?php _e('Map', 'themes-plus'); ?></div><!-- /#map -->
	<?php 
		else:
	?>
		<p class="alert alert-danger"><?php _e('Lat/Lng undefined. Please add the coordinates in the Page Settings!', 'themes-plus'); ?></p>
	<?php
		endif;
	?>
</div>