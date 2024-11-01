<?php
/**
 * Plugin Name: them.es Plus
 * Plugin URI: https://wordpress.org/plugins/themes-plus
 * Description: "Short-code" your Bootstrap powered Theme and activate useful modules and features.
 * Version: 1.3.1
 * Author: them.es
 * Author URI: http://them.es
 * Text Domain: themes-plus
 * License: GPL version 2 or later - http://www.gnu.org/licenses/gpl-2.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

// Initialize Addon
if ( ! class_exists( 'themesPlus' ) ) {
	class themesPlus {
		
		public function __construct() {
			
			// Init function
			function themes_plus_init() {
				add_editor_style( plugins_url( '/assets/css/style-editor.css', __FILE__ ) ); // Style transformed Shortcodes in TinyMCE Editor
			}
			add_action( 'init', 'themes_plus_init' );
			
			// Load Stylesheets
			function themes_plus_stylesheets() {
				wp_register_style( 'pluginstylesheet', plugins_url( '/assets/css/style.css', __FILE__ ) );
				wp_enqueue_style( 'pluginstylesheet' ); // Load CSS
				
				wp_enqueue_style( 'dashicons' ); // Activate wp-internal dashicons webfont: https://developer.wordpress.org/resource/dashicons/
			}
			add_action( 'wp_enqueue_scripts', 'themes_plus_stylesheets' );
			
			// Localization
			function themes_plus_load_textdomain() {
				load_plugin_textdomain( 'themes-plus', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
			}
			add_action( 'plugins_loaded', 'themes_plus_load_textdomain' );


			/**
			 * Init Shortcake Plugin: https://github.com/fusioneng/Shortcake
			 * Plugin source has been added in /shortcake
			 */

			$initshortcake = plugin_dir_path( __FILE__ ) . '/inc/shortcake/shortcode-ui.php';

			// Include Shortcake if not loaded (by other Plugin) already
			if ( ! class_exists( 'Shortcode_UI' ) && is_readable( $initshortcake ) ) {
				require_once( $initshortcake );
			}


			/**
			 * Add Dropdown Button to TinyMCE Editor
			 */
			// Include file
			$tinymce_mod = plugin_dir_path( __FILE__ ) . '/inc/tinymce_mod.php';

			if ( is_readable( $tinymce_mod ) ) {
				require_once( $tinymce_mod );
			}


			/**
			 * Customizer API: Google Analytics, Map Styles, ...
			 */
			// Include file
			$plugin_customizer = plugin_dir_path( __FILE__ ) . '/inc/customizer.php';

			if ( is_readable( $plugin_customizer ) ) {
				require_once( $plugin_customizer );
			}


			/**
			 * Transform Standard Image Galleries
			 */
			// Include file
			$gallery_mod = plugin_dir_path( __FILE__ ) . '/inc/gallery_mod.php';

			if ( is_readable( $gallery_mod ) ) {
				require_once( $gallery_mod );
			}

			/**
			 * Add a custom field "External Weblink" to Media files
			 * Thanks: http://code.tutsplus.com/tutorials/creating-custom-fields-for-attachments-in-wordpress--net-13076
			 */

			// 1. Media-Metabox function
			function themes_image_attachment_fields( $form_fields, $post ) {

				$form_fields['weblink']['label'] = __( 'Weblink', 'themes-plus' );
				$form_fields['weblink']['input'] = 'text';
				$form_fields['weblink']['value'] = get_post_meta( $post->ID, '_weblink', true );

				return $form_fields;

			}
			add_filter( 'attachment_fields_to_edit', 'themes_image_attachment_fields', null, 2 );

			// 2. Save function
			function themes_image_attachment_fields_to_save( $post, $attachment ) {

				if ( isset( $attachment['weblink'] ) ) {
					// update_post_meta( postID, meta_key, meta_value );
					update_post_meta( $post['ID'], '_weblink', $attachment['weblink'] );
				}

				return $post;

			}
			add_filter( 'attachment_fields_to_save', 'themes_image_attachment_fields_to_save', null , 2 );


			/**
			 * Fix Shortcode markup
			 * Thanks: https://gist.github.com/maxxscho/2058547
			 */
			function themes_shortcode_fix_empty_paragraphs( $content ) {

				$array = array(
					'<p>[' => '[',
					']</p>' => ']',
					']<br>' => ']',
					']<br/>' => ']',
					']<br />' => ']',
				);
				$content = strtr( $content, $array );
				return $content;

			}
			add_filter( 'the_content', 'themes_shortcode_fix_empty_paragraphs' );


		/**
		 * Google Maps
		 *
		 * Shortcodes:
		 * [map] (Only working if latlng got defined in Customizer -> e.g. them.es Themes)
		 * [map latlng="##.####,##.####" zoom="##" class="..." style="..." key="..."]
		 */
			function themes_map_shortcode( $atts = array() ) {

				// Include file
				$file = plugin_dir_path( __FILE__ ) . '/inc/map.php';

				// Return Content from file
				if ( 'NULL' !== $file && file_exists( $file ) ) {

					ob_start();
					include( $file );
					$content = ob_get_clean();

					return $content;

				} else {

					return __( 'Error', 'themes-plus' );

				}
			}
			add_shortcode( 'map', 'themes_map_shortcode' );

		/**
		 * Register a TinyMCE UI for the Shortcode
		 * External Plugin "Shortcode UI" required: https://github.com/fusioneng/Shortcake
		 */
			if ( function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
				shortcode_ui_register_for_shortcode(
					'map',
					array(
						'label' => 'map',
						'listItemImage' => 'dashicons-location',
						'attrs' => array(
							array(
								'label'       => 'Lat,Lng',
								'attr'        => 'latlng',
								'type'        => 'text',
								'meta' => array(
									'placeholder' => '0.0000,0.0000',
								),
							),
							array(
								'label'       => 'Zoom',
								'attr'        => 'zoom',
								'type'        => 'number',
								'meta' => array(
									'placeholder' => '14',
								),
							),
							array(
								'label'       => 'Marker (PNG/GIF/JPG, 128x128)',
								'attr'        => 'marker',
								'type'        => 'text',
								'meta' => array(
									'placeholder' => 'http://',
								),
							),
							array(
								'label'       => 'Class',
								'attr'        => 'class',
								'type'        => 'text',
							),
							array(
								'label'       => 'CSS',
								'attr'        => 'style',
								'type'        => 'text',
							),
							array(
								'label'       => 'Google API Key',
								'attr'        => 'key',
								'type'        => 'text',
							),
						),
					)
				);
			}


		/**
		 * Recent posts
		 * 
		 * Shortcode:
		 * [recentposts] or [recentposts posts="10" ids="1,2,3,4"]
		 */
			function themes_recentposts_shortcode( $atts = array() ) {

				// Get Attributes
				extract( shortcode_atts( array(
					'posts' => '5',
					'ids' => '',
				), $atts ) );

				// Return Content
				$content = '<ul class="recentposts">';
				$content .= '<li><h3>' . __('Recent Posts', 'themes-plus') . '</h3></li>';
					$recentposts_query = new WP_Query( "posts_per_page=$posts" );// $posts = number of posts (default = 5)
					$month_check = null;
					if ( $recentposts_query->have_posts() ) :
						while ( $recentposts_query->have_posts() ) :
							$recentposts_query->the_post();
							$content .= '<li>';
								// Show monthly archive and link to months
								$month = get_the_date( 'F, Y' );
								if ( $month !== $month_check ) : $content .= '<p><a href="' . get_month_link( get_the_date( 'Y' ), get_the_date( 'm' ) ) . '" title="' . get_the_date( 'F, Y' ) . '">' . $month . '</a></p>'; endif;
								$month_check = $month;
							$content .= '<h4><a href="' . get_the_permalink() . '" title="' . sprintf( __( 'Permalink to %s', 'themes-plus' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark">' . get_the_title() . '</a></h4>';
							$content .= '</li>';
						endwhile;
					else :
						$content .= __('No Posts found!', 'themes-plus');
					endif;
					wp_reset_postdata(); // end of the loop.
				$content .= '</ul>';
				//$content = ob_get_clean();

				return $content;

			}
			add_shortcode( 'recentposts', 'themes_recentposts_shortcode' );

		/**
		 * Register a TinyMCE UI for the Shortcode
		 * External Plugin "Shortcode UI" required: https://github.com/fusioneng/Shortcake
		 */
			if ( function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
				shortcode_ui_register_for_shortcode(
					'recentposts',
					array(
						'label' => 'recentposts',
						//'listItemImage' => 'dashicons-editor-quote',
						'attrs' => array(
							array(
								'label'       => 'Number of Posts',
								'attr'        => 'posts',
								'type'        => 'number',
								'meta' => array(
									'placeholder' => '5',
								),
							),
							array(
								'label'       => 'Select Posts',
								'attr'        => 'ids',
								'type'        => 'post_select',
								'query'       => array(
													'post_type' => 'post',
													//'order' => 'ASC',
												),
								'multiple'    => true,
							),
						),
					)
				);
			}


		/**
		 * Countdown Timer: Count down to date
		 * 
		 * Shortcode:
		 * [timer]January 25, 2020 12:00:00[/timer]
		 */

			// Datetime: [timer]January 25, 2020 12:00:00[/timer]
			function themes_timer_shortcode( $atts = array(), $content = null ) {

				wp_register_script( 'timerinit', plugins_url( '/assets/js/countdown.build.js', __FILE__ ), array( 'jquery' ), '1.0', false );
				wp_enqueue_script( 'timerinit' );

				// Get Attributes
				extract( shortcode_atts( array(
					'class' => '',
					'style' => '',
				), $atts ) );

				$datetime = strtolower( do_shortcode( shortcode_unautop( $content ) ) ); // If $content contains a shortcode, that code will get processed

				return '<h3 id="timer" class="h1 timer' . ( $class ? ' ' . esc_attr( $class ) : '' ) . '"' . ( $style ? ' style="' . esc_attr( $style ) . '"' : '' ) . ' data-to="' . $datetime .'" data-offset="' . get_option( 'gmt_offset' ) . '" data-rtl="' . ( is_rtl() ? 'true' : 'false' ) . '">' . $datetime . ', UTC ' . get_option( 'gmt_offset' ) . '</h3>';

			}
			add_shortcode( 'timer', 'themes_timer_shortcode' );

		/**
		 * Register a TinyMCE UI for the Shortcode
		 * External Plugin "Shortcode UI" required: https://github.com/fusioneng/Shortcake
		 */
			if ( function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
				shortcode_ui_register_for_shortcode(
					'timer',
					array(
						'label' => 'Countdown Timer: Timestamp',
						//'listItemImage' => 'dashicons-editor-quote',
						'attrs' => array(
							array(
								'label'       => 'Timestamp: January 25, 2020 12:00:00',
								'description' => 'Timezone: UTC ' . get_option( 'gmt_offset' ) . ' ' . get_option( 'timezone_string' ),
								'attr'        => 'content',
								'type'        => 'text',
							),
							array(
								'label'       => 'Class',
								'attr'        => 'class',
								'type'        => 'text',
							),
							array(
								'label'       => 'CSS',
								'attr'        => 'style',
								'type'        => 'text',
							),
						),
						'inner_content' => array(
							'label'       => 'Timestamp: January 25, 2020 12:00:00',
							'description' => 'Timezone: UTC ' . get_option( 'gmt_offset' ) . ' ' . get_option( 'timezone_string' ),
						),
					)
				);
			}


		/**
		 * Stats Counter
		 *
		 * Shortcode:
		 * [countup]###[/countup]
		 */

			// Number: [countup]###[/countup]
			function themes_countup_shortcode( $atts = array(), $content = null ) {

				wp_register_script( 'countupinit', plugins_url( '/assets/js/countup.build.js', __FILE__ ), array( 'jquery' ), '1.0', false );
				wp_enqueue_script( 'countupinit' );

				// Get Attributes
				extract( shortcode_atts( array(
					'class' => '',
					'style' => '',
				), $atts ) );

				$timer = do_shortcode( shortcode_unautop( $content ) ); // If $content contains a shortcode, that code will get processed

				return '<h3 class="countup h1' . ( $class ? ' ' . esc_attr( $class ) : '' ) . '"' . ( $style ? ' style="' . esc_attr( $style ) . '"' : '' ) . ' data-to="' . $timer .'" data-speed="2500">' . $timer .'</h3>';

			}
			add_shortcode( 'countup', 'themes_countup_shortcode' );

		/**
		 * Register a TinyMCE UI for the Shortcode
		 * External Plugin "Shortcode UI" required: https://github.com/fusioneng/Shortcake
		 */
			if ( function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
				shortcode_ui_register_for_shortcode(
					'countup',
					array(
						'label' => 'Number',
						//'listItemImage' => 'dashicons-editor-quote',
						'attrs' => array(
							array(
								'label'       => 'Class',
								'attr'        => 'class',
								'type'        => 'text',
							),
							array(
								'label'       => 'CSS',
								'attr'        => 'style',
								'type'        => 'text',
							),
						),
						'inner_content' => array(
							'label'       => 'Count to',
							'meta' => array(
								'placeholder' => '100',
							),
						),
					)
				);
			}


		/**
		 * Progress bar
		 * 
		 * Shortcode:
		 * [progressbar color="blue" duration="2" label="true"]40[/progressbar]
		 * Colors: blue/green/lightblue/yellow/red
		 */

			function themes_progressbar_shortcode( $atts = array(), $content = null ) {

				// Get Attributes
				extract( shortcode_atts( array(
					'title' => '',
					'color' => '',
					'duration' => '',
					'label' => '',
					'class' => '',
					'style' => '',
				), $atts ) );

				$value = do_shortcode( shortcode_unautop( $content ) ); // If $content contains a shortcode, that code will get processed
			
				if ( isset( $color ) && ! empty( $color ) ) {
					if ( 'blue' === $color ) {
						$class .= ' bg-primary progress-bar-primary';
					} elseif ( 'green' === $color ) {
						$class .= ' bg-success progress-bar-success';
					} elseif ( 'lightblue' === $color ) {
						$class .= ' bg-info progress-bar-info';
					} elseif ( 'yellow' === $color ) {
						$class .= ' bg-warning progress-bar-warning';
					} elseif ( 'red' === $color ) {
						$class .= ' bg-danger progress-bar-danger';
					}
				}

				if ( ! empty( $label ) ) {
					$label = $value . '%';
				}

				$progressbar = '<div class="progress">';
					if ( isset( $title ) && ! empty( $title ) ) {
						$progressbar .= '<h3>' . $title . '</h3>';
					}
					$progressbar .= '<div class="progress-bar' . ( $class ? ' ' . esc_attr( $class ) : '' ) . '" style="width: ' . $label . ';' . ( $style ? ' ' . esc_attr( $style ) : '' ) . '" aria-valuenow="' . $value . '" aria-valuemin="0" aria-valuemax="100">';
						$progressbar .= ( ! empty( $label ) || isset( $label ) && '1' === $label ? $value . '%' : '<span class="sr-only">' . $value . '%</span>' );
					$progressbar .= '</div>';
				$progressbar .= '</div>';

				return $progressbar;

			}
			add_shortcode( 'progressbar', 'themes_progressbar_shortcode' );

		/**
		 * Register a TinyMCE UI for the Shortcode
		 * External Plugin "Shortcode UI" required: https://github.com/fusioneng/Shortcake
		 */
			if ( function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
				shortcode_ui_register_for_shortcode(
					'progressbar',
					array(
						'label' => 'Number',
						//'listItemImage' => 'dashicons-editor-quote',
						'attrs' => array(
							array(
								'label'       => 'Color',
								'attr'        => 'color',
								'type'        => 'select',
								'options'     => array(
													'blue' => 'Blue',
													'green' => 'Green',
													'lightblue' => 'Lightblue',
													'yellow' => 'Yellow',
													'red' => 'Red',
												),
							),
							array(
								'label'       => 'Duration (seconds)',
								'attr'        => 'duration',
								'type'        => 'number',
								'meta' => array(
									'placeholder' => '0.6',
								),
							),
							array(
								'label'       => 'Show Label',
								'attr'        => 'label',
								'type'        => 'checkbox',
							),
							array(
								'label'       => 'Class',
								'attr'        => 'class',
								'type'        => 'text',
							),
							array(
								'label'       => 'CSS',
								'attr'        => 'style',
								'type'        => 'text',
							),
						),
						'inner_content' => array(
							'label'       => 'Percentage',
							'meta' => array(
								'placeholder' => '40',
							),
						),
					)
				);
			}


		/**
		 * Grid
		 * 
		 * Shortcode:
		 * [row]
		 *   [col]Lorem ipsum...[/col]
		 *   [col]Lorem ipsum...[/col]
		 * [/row]
		 */
			function themes_row_shortcode( $atts = array(), $content = null ) {

				// Get Attributes
				extract( shortcode_atts( array(
					'class' => '',
					'style' => '',
				), $atts ) );

				$GLOBALS['colitem_count'] = substr_count( $content, '[/col]' ); // Count number of closing cols

				return '<div class="content-grid row' . ( $class ? ' ' . esc_attr( $class ) : '' ) . '"' . ( $style ? ' style="' . esc_attr( $style ) . '"' : '' ) . '>' . do_shortcode( shortcode_unautop( $content ) ) . '</div>'; // If $content contains a shortcode, that code will get processed

			}
			add_shortcode( 'row', 'themes_row_shortcode' );

			// Col Item(s): [col]...[/col]
			function themes_col_shortcode( $atts = array(), $content = null ) {

				// Get Attributes
				extract( shortcode_atts( array(
					'class' => '',
					'style' => '',
				), $atts ) );

				if ( isset( $GLOBALS['colitem_count'] ) ) {
					$colcounter = $GLOBALS['colitem_count'];

					if ( 2 === $colcounter ) {
						$bootstrap = 'col-md-6 col-sm-12 col-xs-12'; // 2 cols
					} elseif ( 3 === $colcounter ) {
						$bootstrap = 'col-md-4 col-sm-6 col-xs-12'; // 3 cols
					} elseif ( 4 === $colcounter ) {
						$bootstrap = 'col-md-3 col-sm-6 col-xs-12'; // 4 cols
					} elseif ( 6 === $colcounter ) {
						$bootstrap = 'col-md-2 col-sm-6 col-xs-12'; // 6 cols
					}

				} else {

					$bootstrap = 'col-md-12'; // 1 col

				}

				return '<div class="' . $bootstrap . ( $class ? ' ' . esc_attr( $class ) : '' ) . '"' . ( $style ? ' style="' . esc_attr( $style ) . '"' : '' ) . '>' . do_shortcode( shortcode_unautop( $content ) ) . '</div>'; // If $content contains a shortcode, that code will get processed

			}
			add_shortcode( 'col', 'themes_col_shortcode' );

		/**
		 * Register a TinyMCE UI for the Shortcode
		 * External Plugin "Shortcode UI" required: https://github.com/fusioneng/Shortcake
		 */
			if ( function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
				shortcode_ui_register_for_shortcode(
					'col',
					array(
						'label' => 'col',
						//'listItemImage' => 'dashicons-editor-quote',
						'attrs' => array(
							array(
								'label'       => 'Class',
								'attr'        => 'class',
								'type'        => 'text',
							),
							array(
								'label'       => 'CSS',
								'attr'        => 'style',
								'type'        => 'text',
							),
						),
						'inner_content' => array(
							'label'       => 'Content',
							'meta' => array(
								'placeholder' => 'Lorem ipsum dolor sit amet...',
							),
						),
					)
				);
			}
			
		}

	}
}

if ( class_exists( 'themesPlus' ) ) {
	$themes_plus = new themesPlus();
}

if ( ! function_exists( '_log' ) ) {
	function _log( $message ) {
		if ( true === WP_DEBUG ) {
			if ( is_array( $message ) || is_object( $message ) ) {
				error_log( print_r( $message, true ) );
			} else {
				error_log( $message );
			}
		}
	}
}

?>