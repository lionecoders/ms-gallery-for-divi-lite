<?php
namespace MGFDL\Modules\msGalleryModule\msGalleryModuleTraits;

if (!defined('ABSPATH')) {
  die('Direct access forbidden.');
}

use ET\Builder\FrontEnd\Module\Style;
use ET\Builder\Packages\Module\Layout\Components\StyleCommon\CommonStyle;

trait ModuleStylesTrait
{

  use CustomCssTrait;

  public static function module_styles($args)
  {
    $attrs = $args['attrs'] ?? [];
    $elements = $args['elements'];
    $settings = $args['settings'] ?? [];
    $order_class = $args['orderClass'];

    Style::add(
      [
        'id' => $args['id'],
        'name' => $args['name'],
        'orderIndex' => $args['orderIndex'],
        'storeInstance' => $args['storeInstance'],
        'styles' => [
          CommonStyle::style(
            [
              'selector' => $order_class . ' .mgfd-gallery-wrapper img',
              'attr' => $attrs['image_object_fit'] ?? [],
              'declarationFunction' => function ($declaration_function_args) {
                $attr_value = $declaration_function_args['attrValue']['image_object_fit'] ?? [];
                return "--mgfd-image_object_fit: {$attr_value};";
              },
            ]
          ),
          CommonStyle::style(
            [
              'selector' => $order_class . '.mgfd-ms-gallery-masonry-container',
              'attr' => $attrs['grid_column'] ?? [],
              'declarationFunction' => function ($declaration_function_args) {
                $attr_value = $declaration_function_args['attrValue']['grid_column'] ?? $declaration_function_args['attrValue'];
                return "--mgfd-grid_column: {$attr_value};";
              },
            ]
          ),
          CommonStyle::style(
            [
              'selector' => $order_class . '.mgfd-ms-gallery-masonry-container',
              'attr' => $attrs['grid_column_gap'] ?? [],
              'declarationFunction' => function ($declaration_function_args) {
                $attr_value = $declaration_function_args['attrValue']['grid_column_gap'] ?? [];
                return "--mgfd-masonry-horizontal-gap: {$attr_value};";
              },
            ]
          ),
          CommonStyle::style(
            [
              'selector' => $order_class . '.mgfd-ms-gallery-masonry-container',
              'attr' => $attrs['grid_row_gap'] ?? [],
              'declarationFunction' => function ($declaration_function_args) {
                $attr_value = $declaration_function_args['attrValue']['grid_row_gap'] ?? [];
                return "--mgfd-masonry-vertical-gap: {$attr_value};";
              },
            ]
          ),
          CommonStyle::style(
            [
              'selector' => $order_class . ' .mgfd-ms-gallery-overlay-content',
              'attr' => $attrs['overlay_color'] ?? [],
              'declarationFunction' => function ($declaration_function_args) {
                $attr_value = $declaration_function_args['attrValue']['overlay_color'] ?? [];
                return "--mgfd-overlay-color: {$attr_value};";
              },
            ]
          ),
          CommonStyle::style(
            [
              'selector' => $order_class . ' .mgfd-ms-gallery-overlay-content',
              'attr' => $attrs['overlay_text_color'] ?? [],
              'declarationFunction' => function ($declaration_function_args) {
                $attr_value = $declaration_function_args['attrValue']['overlay_text_color'] ?? [];
                return "--mgfd-overlay-text-color: {$attr_value};";
              },
            ]
          ),
          $elements->style(
            [
              'attrName' => 'content',
            ]
          ),
        ],
      ]
    );
  }
}