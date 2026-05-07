<?php

/**
 * Enqueue Divi 5 Visual Builder Assets
 *
 * @since 1.0.0
 */

require_once MGFDL_PLUGIN_DIR . 'divi-5/vendor/autoload.php';
require_once MGFDL_PLUGIN_DIR . 'divi-5/server/Modules/Modules.php';

class msGalleryForDivi5
{

  public function __construct()
  {
    add_action('divi_visual_builder_assets_before_enqueue_scripts', array($this, 'mgfdl_divi5_enqueue_visual_builder_assets'));
    add_action('wp_enqueue_scripts', [$this, 'mgfd_style_enqueue']);

  }
  function mgfdl_divi5_enqueue_visual_builder_assets()
  {
    \ET\Builder\VisualBuilder\Assets\PackageBuildManager::register_package_build(
      [
        'name' => 'mgfdl-divi5-visual-builder',
        'version' => MGFDL_PLUGIN_VERSION,
        'script' => [
          'src' => MGFDL_PLUGIN_URL . 'divi-5/visual-builder/build/bundle.min.js',
          'deps' => [
            'divi-module-library',
            'divi-vendor-wp-hooks',
            'react',
            'jquery-core',
            'divi-rest',
            'wp-hooks',
          ],
          'enqueue_top_window' => false,
          'enqueue_app_window' => true,
        ],
      ]
    );
    
    }
    function mgfd_style_enqueue()
   {
       wp_enqueue_style('mgfdl-divi5-visual-builder', MGFDL_PLUGIN_URL . 'includes/modules/MsGallery/MsGallery.css', [], MGFDL_PLUGIN_VERSION);
   }
}
new msGalleryForDivi5();