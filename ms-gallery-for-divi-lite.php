<?php
/*
Plugin Name: Ms Gallery For Divi Lite
Description: Fastest way to create responsive masonry galleries for Divi.
Version:     1.0.1
Author:      Mandeep Singh
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: ms-gallery-for-divi-lite
Domain Path: /languages

Ms Gallery For Divi Lite is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Ms Gallery For Divi Lite is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Ms Gallery For Divi Lite. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if(!defined('ABSPATH')){
	exit('Direct script access denied.');
}

define('MGFDL_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MGFDL_PLUGIN_URL', plugin_dir_url(__FILE__));
define('MGFDL_PLUGIN_VERSION', '1.0.1');

class MsGalleryForDiviLite
{

	public function __construct()
	{
		add_action('divi_extensions_init', array($this, 'mgfdl_initialize_extension'));
	}

	/**
	 * Creates the extension's main class instance.
	 *
	 * @since 1.0.1
	 */
	public function mgfdl_initialize_extension()
	{
		require_once MGFDL_PLUGIN_DIR . 'includes/MsGalleryForDivi.php';
	}
}
new MsGalleryForDiviLite();
