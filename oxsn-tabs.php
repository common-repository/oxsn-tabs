<?php


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


/*
Plugin Name: OXSN Tabs
Plugin URI: https://wordpress.org/plugins/oxsn-tabs/
Description: This plugin adds tabs!
Author: oxsn
Author URI: https://oxsn.com/
Version: 0.0.3
*/


define( 'oxsn_tabs_plugin_basename', plugin_basename( __FILE__ ) );
define( 'oxsn_tabs_plugin_dir_path', plugin_dir_path( __FILE__ ) );
define( 'oxsn_tabs_plugin_dir_url', plugin_dir_url( __FILE__ ) );

if ( ! function_exists ( 'oxsn_tabs_settings_link' ) ) {

	add_filter( 'plugin_action_links', 'oxsn_tabs_settings_link', 10, 2 );
	function oxsn_tabs_settings_link( $links, $file ) {

		if ( $file != oxsn_tabs_plugin_basename )
		return $links;
		$settings_page = '<a href="' . menu_page_url( 'oxsn-tabs', false ) . '">' . esc_html( __( 'Settings', 'oxsn-tabs' ) ) . '</a>';
		array_unshift( $links, $settings_page );
		return $links;

	}

}


/* OXSN Dashboard Tab */

if ( !function_exists('oxsn_dashboard_tab_nav_item') ) {

	add_action('admin_menu', 'oxsn_dashboard_tab_nav_item');
	function oxsn_dashboard_tab_nav_item() {

		add_menu_page('OXSN', 'OXSN', 'manage_options', 'oxsn-dashboard', 'oxsn_dashboard_tab' );

	}

}

if ( !function_exists('oxsn_dashboard_tab') ) {

	function oxsn_dashboard_tab() {

		if (!current_user_can('manage_options')) {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}

	?>

		<?php if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') : ?>

			<div id="message" class="updated">

				<p><strong><?php _e('Settings saved.') ?></strong></p>

			</div>

		<?php endif; ?>
		
		<div class="wrap">
		
			<h2>OXSN / Digital Agency</h2>

			<div id="poststuff">

				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content" style="position: relative;">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Information</h3>

							<div class="inside">

								<p></p>

							</div>
							
						</div>

					</div>

					<div id="postbox-container-1" class="postbox-container">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Coming Soon</h3>

							<div class="inside">

								<p></p>

							</div>
							
						</div>

					</div>

				</div>

			</div>

		</div>

	<?php 

	}

}


/* OXSN Plugin Tab */

if ( ! function_exists ( 'oxsn_tabs_plugin_tab_nav_item' ) ) {

	add_action('admin_menu', 'oxsn_tabs_plugin_tab_nav_item', 99);
	function oxsn_tabs_plugin_tab_nav_item() {

		add_submenu_page('oxsn-dashboard', 'OXSN Tabs', 'Tabs', 'manage_options', 'oxsn-tabs', 'oxsn_tabs_plugin_tab');

	}

}

if ( !function_exists('oxsn_tabs_plugin_tab') ) {

	function oxsn_tabs_plugin_tab() {

		if (!current_user_can('manage_options')) {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}

	?>

		<?php if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') : ?>

			<div id="message" class="updated">

				<p><strong><?php _e('Settings saved.') ?></strong></p>

			</div>

		<?php endif; ?>
		
		<div class="wrap oxsn_settings_page">
		
			<h2>OXSN / Tabs Plugin</h2>

			<div id="poststuff">

				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content" style="position: relative;">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Information</h3>

							<div class="inside">

								<p>Coming soon.</p>

							</div>
							
						</div>

					</div>

					<div id="postbox-container-1" class="postbox-container">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Custom Project</h3>

							<div class="inside">

								<p>Want us to build you a custom project?</p>

								<p><a href="mailto:brief@oxsn.com?Subject=Custom%20Project%20Request%21&Body=Please%20answer%20the%20following%20questions%20to%20help%20us%20better%20understand%20your%20needs..%0A%0A1.%20What%20is%20the%20name%20of%20your%20company%3F%0A%0A2.%20What%20are%20the%20concepts%20and%20goals%20of%20your%20project%3F%0A%0A3.%20What%20is%20the%20proposed%20budget%20of%20this%20project%3F" class="button button-primary button-large">Email Us</a></p>

							</div>
							
						</div>

						<div class="postbox">

							<h3 class="hndle cursor_initial">Support</h3>

							<div class="inside">

								<p>Need help with this plugin? Visit the Wordpress plugin page for support..</p>

								<p><a href="https://wordpress.org/support/plugin/oxsn-tabs" target="_blank" class="button button-primary button-large">Support</a></p>

							</div>
							
						</div>

					</div>

				</div>

			</div>

		</div>

	<?php 

	}

}


/* OXSN Include CSS */

if ( ! function_exists ( 'oxsn_tabs_inc_css' ) ) {

	add_action( 'wp_enqueue_scripts', 'oxsn_tabs_inc_css' );
	function oxsn_tabs_inc_css() {

		wp_enqueue_style( 'oxsn_tabs_etc_css', oxsn_tabs_plugin_dir_url . 'inc/css/etc.css', array(), '1.0.0', 'all' ); 

	}

}

/* OXSN Include JS */

if ( ! function_exists ( 'oxsn_tabs_inc_js' ) ) {

	add_action( 'wp_enqueue_scripts', 'oxsn_tabs_inc_js' );
	function oxsn_tabs_inc_js() {

		wp_enqueue_script( 'oxsn_tabs_etc_js', oxsn_tabs_plugin_dir_url . 'inc/js/etc.js', array(), '1.0.0', 'all' ); 

	}

}


/* OXSN Shortcodes */

//[oxsn_tabs_tab paired_id="" class=""]
if ( ! function_exists ( 'oxsn_tabs_tab_shortcode' ) ) {

	add_shortcode('oxsn_tabs_tab', 'oxsn_tabs_tab_shortcode');
	function oxsn_tabs_tab_shortcode( $atts, $content = null ) {
		$content = shortcode_unautop(trim($content));
		$a = shortcode_atts( array(
			'class' => '',
			'paired_id' => '',
		), $atts );

		$oxsn_tabs_tab_class = esc_attr($a['class']);
		$oxsn_tabs_tab_paired_id = esc_attr($a['paired_id']);

		return '<div class="oxsn_tabs_tab ' . $oxsn_tabs_tab_class . '" data-paired="' . $oxsn_tabs_tab_paired_id . '">' . do_shortcode($content) . '</div>';
	}

}

//[oxsn_tabs_content paired_id="" class=""]
if ( ! function_exists ( 'oxsn_tabs_content_shortcode' ) ) {

	add_shortcode('oxsn_tabs_content', 'oxsn_tabs_content_shortcode');
	function oxsn_tabs_content_shortcode( $atts, $content = null ) {
		$content = shortcode_unautop(trim($content));
		$a = shortcode_atts( array(
			'class' => '',
			'paired_id' => '',
		), $atts );

		$oxsn_tabs_content_class = esc_attr($a['class']);
		$oxsn_tabs_content_paired_id = esc_attr($a['paired_id']);

		return '<div class="oxsn_tabs_content ' . $oxsn_tabs_content_class . '" data-paired="' . $oxsn_tabs_content_paired_id . '">' . do_shortcode($content) . '</div>';
	}

}


/* OXSN Quicktags */

if ( ! function_exists ( 'oxsn_tabs_quicktags' ) ) {

	add_action( 'admin_print_footer_scripts', 'oxsn_tabs_quicktags' );
	function oxsn_tabs_quicktags() {

		if ( wp_script_is( 'quicktags' ) ) {

		?>

			<script type="text/javascript">
				QTags.addButton( 'oxsn_tabs_tab_quicktag', '[oxsn_tabs_tab]', '[oxsn_tabs_tab paired_id="" class=""]', '[/oxsn_tabs_tab]', 'oxsn_tabs_tab', 'Tabs Tab', 201 );
				QTags.addButton( 'oxsn_tabs_content_quicktag', '[oxsn_tabs_content]', '[oxsn_tabs_content paired_id="" class=""]', '[/oxsn_tabs_content]', 'oxsn_tabs_content', 'Tabs Content', 202 );
			</script>

		<?php

		}

	}

}


?>