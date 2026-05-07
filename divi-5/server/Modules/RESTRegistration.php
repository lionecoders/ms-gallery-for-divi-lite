<?php
/**
 * REST Registration.
 *
 * @package MGFD\Modules;
 */

namespace MGFDL\Modules;

if ( ! defined( 'ABSPATH' ) ) {
  die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\Route\RESTRoute;
use MGFDL\Modules\msGalleryModule\msGalleryModuleController;

/**
 * Class RESTRegistration
 *
 * @package MGFD\Modules
 */
class RESTRegistration {
  /**
   * Register REST routes for modules.
   */
  public function register_routes() {
    $route = new RESTRoute( 'mgfd/v1' ); // Namespace for the extension.

    // Route for msGalleryModule.
    $route->prefix('/module-data')->get( '/ms-gallery-module', msGalleryModuleController::class );
  }
}