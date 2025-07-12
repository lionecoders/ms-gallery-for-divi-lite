<?php
/**
 * Ms Gallery Module for Divi Builder
 *
 * @package MsGalleryForDivi
 * @subpackage Modules
 * @since 1.0.0
 *
 * @wordpress-plugin
 * Plugin Name: MS Gallery for Divi
 * Description: A custom Divi module for creating beautiful image galleries
 * Version: 1.0.0
 * Author: Mandeep Singh
 * License: GPL v2 or later
 * Text Domain: ms-gallery-for-divi-lite
 */

// Prevent direct access to this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

require_once 'mgfdHelper.php';

/**
 * MGFD_MsGallery Class
 *
 * Custom Divi Builder module for creating image galleries with various display styles.
 * Extends ET_Builder_Module to integrate with Divi's module system.
 *
 * @since 1.0.0
 */
class MGFD_MsGallery extends ET_Builder_Module {

	/**
	 * Module slug for Divi Builder
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public $slug = 'mgfd_ms_gallery';

	/**
	 * Visual Builder support flag
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public $vb_support = 'on';

	/**
	 * Module credits information
	 *
	 * @since 1.0.0
	 * @var array
	 */
	protected $module_credits = array(
		'author' => 'Mandeep Singh',
	);

	/**
	 * Initialize the module
	 *
	 * Sets up the module name and settings modal toggles for the Divi Builder interface.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function init() {
		$this->name = esc_html__( 'Ms Gallery', 'ms-gallery-for-divi-lite' );
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'general' => esc_html__( 'General Settings', 'ms-gallery-for-divi-lite' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'image_style' => esc_html__( 'Image Style Settings', 'ms-gallery-for-divi-lite' ),
				),
			),
		);
	}

	/**
	 * Get module fields configuration
	 *
	 * Retrieves the settings fields from the helper class.
	 *
	 * @since 1.0.0
	 * @return array Module fields configuration
	 */
	public function get_fields() {
		return MGFD_Helper::get_settings_fields();
	}

	/**
	 * Get advanced fields configuration
	 *
	 * Retrieves the advanced settings fields from the helper class.
	 *
	 * @since 1.0.0
	 * @return array Advanced fields configuration
	 */
	public function get_advanced_fields_config() {
		return MGFD_Helper::get_advanced_settings_fields();
	}

	/**
	 * Render the module output
	 *
	 * Generates the HTML output for the gallery module with proper escaping
	 * and security measures.
	 *
	 * @since 1.0.0
	 * @param array  $attrs Module attributes.
	 * @param string $content Module content (unused).
	 * @param string $render_slug Render slug for CSS targeting.
	 * @return string Rendered HTML output.
	 */
	public function render( $attrs, $content, $render_slug ) {
		// Sanitize properties to prevent XSS.
		$props = array_map( 'sanitize_text_field', $this->props );
		$gallery_data = MGFD_Helper::mgfd_gallery_data( $props );
		
		$mgfd_html = MGFD_Helper::MGFD_template_style( $props, $render_slug, $gallery_data );

		MGFD_Helper::MGFD_gallery_style( $props, $render_slug );
		
		return $mgfd_html;
	}
}

// Initialize the module.
new MGFD_MsGallery();
