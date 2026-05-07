<?php
namespace MGFDL\Modules\msGalleryModule\msGalleryModuleTraits;

if (!defined('ABSPATH')) {
  die('Direct access forbidden.');
}

use MGFDL\Modules\msGalleryModule\msGalleryModule;
use ET\Builder\Packages\Module\Module;
use ET\Builder\Framework\Utility\HTMLUtility;

trait RenderCallbackTrait
{

  public static function render_callback($attrs, $content, $block, $elements)
  {
    $props = mgfdHelper::get_all_attr_values($attrs);

    $templateHtml = HTMLUtility::render(
      [
        'tag' => 'div',
        'attributes' => [
          'class' => 'mgfd-ms-gallery-masonry-container',
        ],
        'childrenSanitizer' => 'et_core_esc_previously',
        'children' => self::render_content($props),
      ]
    );

    return Module::render(
      [
        // FE only.
        'orderIndex' => $block->parsed_block['orderIndex'],
        'storeInstance' => $block->parsed_block['storeInstance'],

        // VB equivalent.
        'attrs' => $attrs,
        'elements' => $elements,
        'id' => $block->parsed_block['id'],
        'moduleClassName' => '',
        'name' => $block->block_type->name,
        'classnamesFunction' => [msGalleryModule::class, 'module_classnames'],
        'moduleCategory' => $block->block_type->category,
        'stylesComponent' => [msGalleryModule::class, 'module_styles'],
        'scriptDataComponent' => [msGalleryModule::class, 'module_script_data'],
        'children' => $templateHtml
      ]
    );
  }
}
