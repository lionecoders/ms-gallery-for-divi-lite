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

// Register REST routes.
add_action(
  'init',
  function() {
    $restApi = new RESTRegistration();

    $restApi->register_routes();
  }
);

$mgfd_module = new MGFD_MsGallery();
$mgfd_module->load();

add_action(
  'divi_module_library_modules_dependency_tree',
  function( $dependency_tree ) use ( $mgfd_module ) {
    $dependency_tree->add_dependency( $mgfd_module );
  }
);