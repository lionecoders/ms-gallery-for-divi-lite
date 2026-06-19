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

// Register REST routes.
add_action(
  'init',
  function() {
    $restApi = new RESTRegistration();
    $restApi->register_routes();
  }
);