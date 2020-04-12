<?php
/*
Plugin Name: Elementor Test Plugin
Plugin URI:
Description: Class 1.3 of Elementor LWHH
Version: 1.0.0
Author: LWHH
Author URI: lwhh.com
License: GPLv2 or later
Text Domain: elementortestplugin
Domain Path: /languages/
*/

//Class 1.3
use \Elementor\Plugin as Plugin;

if(!defined('ABSPATH')){
	die(__("Direct Access is not Allowed",'eltp'));
}

final class ElementorTestExtension {

	const VERSION='1.0.0';
	const MINIMUM_ELEMENTOR_VERSION='2.0.0';
	const MINIMUM_PHP_VERSION="7.0";

	private static $_instance = null;
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}
	public function init() {
		load_plugin_textdomain( 'elementor-test-extension' );
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

		//class 1.4
		add_action('elementor/elements/categories_registered', [$this, 'register_new_category']);
		//end class 1.4
	
		//class 3.1
		add_action('elementor/frontend/after_enqueue_styles', [$this, 'widget_styles']);
		//end class 3.1
	}



	//Class 3.1
	function widget_styles(){
		wp_enqueue_style("froala", "//cdnjs.cloudflare.com/ajax/libs/froala-design-blocks/2.0.1/css/froala_blocks.min.css");
	}
	//End Class 3.1
	//class 1.4
	public function register_new_category($manager) {
		$manager->add_category('test_category', [
			'title' => __("Test Category",'eltp'),
			'icon' => 'fa fa-image'
		]);

		$manager->add_category('sliders', [
			'title' => __('Sliders', 'eltp'),
			'icon' => 'fa fa-video'
		]);
	}


	//end class 1.4

	public function init_widgets() {
		// Include Widget files
		require_once( __DIR__ . '/widgets/test-widget.php' );
		require_once( __DIR__ . '/widgets/faq-widget.php' ); //Class 2.12
		require_once( __DIR__ . '/widgets/pricing-widget.php' ); //Class 3.1
		// Register widget (use \Elementor\Plugin as Plugin line 14)
		Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Test_Widget() );
		Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Faq_Widget() );
		Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Pricing_Widget() );
	}

	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'eltp' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'eltp' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'eltp' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'eltp' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'eltp' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'eltp' ) . '</strong>'
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'eltp' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'eltp' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'eltp' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	public function includes() {}

}
ElementorTestExtension::instance();



