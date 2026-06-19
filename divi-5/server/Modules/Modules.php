<?php
/**
 * All modules.
 *
 * @package MGFDL\Modules;
 */

namespace MGFDL\Modules;

if (!defined('ABSPATH')) {
  die('Direct access forbidden.');
}

use MGFDL\Modules\msGalleryModule\MGFD_MsGallery;
use MGFDL\Modules\RESTRegistration;

// Load the MS Gallery module
$mgfd_module = new MGFD_MsGallery();
$mgfd_module->load();

// Register block for migration
add_action(
  'init',
  function() {
    if ( function_exists( 'register_block_type' ) ) {
      register_block_type(
        MGFDL_PLUGIN_DIR . 'divi-5/visual-builder/src/modules/ms-gallery-module/block.json'
      );
    }
  },
  5
);

// Register REST routes.
add_action(
  'init',
  function() {
    $restApi = new RESTRegistration();
    $restApi->register_routes();
  }
);