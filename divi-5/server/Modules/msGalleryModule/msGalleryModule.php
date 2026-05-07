<?php
/**
 * Static Module class.
 *
 * @package MGFDL\Modules\msGalleryModule;
 */

namespace MGFDL\Modules\msGalleryModule;

if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;
use MGFDL\Modules\msGalleryModule\msGalleryModuleTraits;

/**
 * Class msGalleryModule
 *
 * @package MGFD\Modules\msGalleryModule
 */
class msGalleryModule implements DependencyInterface {

  use msGalleryModuleTraits\RenderCallbackTrait;
  use msGalleryModuleTraits\RenderContentTrait;
  use msGalleryModuleTraits\ModuleClassnamesTrait;
  use msGalleryModuleTraits\ModuleStylesTrait;
  use msGalleryModuleTraits\ModuleScriptDataTrait;

  public function load() {
    $module_json_folder_path = dirname( __DIR__, 3 ) . '/visual-builder/src/modules/ms-gallery-module';

    add_action(
      'init',
      function() use ( $module_json_folder_path ) {
        ModuleRegistration::register_module(
          $module_json_folder_path,
          [
            'render_callback' => [ msGalleryModule::class, 'render_callback' ],
          ]
        );
      }
    );
  }
}