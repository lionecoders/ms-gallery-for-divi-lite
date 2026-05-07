<?php
/**
 * All modules.
 *
 * @package MGFD\Modules;
 */

namespace MGFD\Modules;

if ( ! defined( 'ABSPATH' ) ) {
  die( 'Direct access forbidden.' );
}

use MGFDL\Modules\msGalleryModule\msGalleryModule;
use MGFDL\Modules\RESTRegistration;

// Register REST routes.
add_action(
  'init',
  function() {
    $restApi = new RESTRegistration();

    $restApi->register_routes();
  }
);

add_action(
  'divi_module_library_modules_dependency_tree',
  function( $dependency_tree ) {

    $dependency_tree->add_dependency( new msGalleryModule() );
  }
);