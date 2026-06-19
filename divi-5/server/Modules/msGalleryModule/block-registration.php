<?php
namespace MGFDL\Modules\msGalleryModule;

if (!defined('ABSPATH')) {
  die('Direct access forbidden.');
}

// Register the module as a WordPress block for Divi 5 migration
add_action('init', function() {
  if (function_exists('register_block_type')) {
    $block_json = dirname(__DIR__, 3) . '/visual-builder/src/modules/ms-gallery-module/module.json';
    
    if (file_exists($block_json)) {
      register_block_type($block_json);
    }
  }
}, 0);
