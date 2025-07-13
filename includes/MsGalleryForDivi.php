<?php

if(!defined('ABSPATH')){
	exit('Direct script access denied.');
}

class MGFD_MsGalleryForDivi extends DiviExtension {

	/**
	 * The gettext domain for the extension's translations.
	 *
	 * @since 1.0.1
	 *
	 * @var string
	 */
	public $gettext_domain = 'ms-gallery-for-divi-lite';

	/**
	 * The extension's WP Plugin name.
	 *
	 * @since 1.0.1
	 *
	 * @var string
	 */
	public $name = 'ms-gallery-for-divi';

	/**
	 * The extension's version
	 *
	 * @since 1.0.1
	 *
	 * @var string
	 */
	public $version = '1.0.1';

	/**
	 * MGFD_MsGalleryForDivi constructor.
	 *
	 * @param string $name
	 * @param array  $args
	 */
	public function __construct( $name = 'ms-gallery-for-divi', $args = array() ) {
		$this->plugin_dir     = plugin_dir_path( __FILE__ );
		$this->plugin_dir_url = plugin_dir_url( $this->plugin_dir );

		parent::__construct( $name, $args );
	}
}

new MGFD_MsGalleryForDivi;
