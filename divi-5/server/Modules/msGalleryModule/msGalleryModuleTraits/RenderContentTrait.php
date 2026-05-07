<?php

namespace MGFDL\Modules\msGalleryModule\msGalleryModuleTraits;

use MGFDL\Modules\msGalleryModule\msGalleryModuleTraits\ModuleDataTrait;

if (!defined('ABSPATH')) {
  die('Direct access forbidden.');
}

trait RenderContentTrait
{
  public static function render_content($props = [] )
  {
    $gallery_data = ModuleDataTrait::mgfd_gallery_data($props, 'gallery');
    return self::MGFD_template_style($props, $gallery_data);
  }

  public static function MGFD_template_style($props = [], $gallery_data = [])
  {
    if (empty($gallery_data)) {
      return '<p>No gallery items found.</p>';
    }

    $output = '';

    foreach ($gallery_data as $item) {
      $output .= '<div class="mgfd-ms-gallery-masonry-item">';
      $output .= '<a href="' . esc_url($item['image_url']) . '" target="_blank">';
      $output .= wp_get_attachment_image($item['id'], $props['gallery_image_size'], false, [
        'class' => 'mgfd-gallery-img',
        'title' => esc_attr($item['title']),
        'alt' => esc_attr($item['alt']),
      ]);
      $output .= '</a>';
      if ($props['overlay_content'] === 'on') {
        $output .= '<div class="mgfd-ms-gallery-overlay-content">';
        $output .= '<h3>' . esc_html($item['title']) . '</h3>';
        $output .= '<p>' . esc_html($item['description']) . '</p>';
        $output .= '<p>' . esc_html($item['caption']) . '</p>';
        $output .= '</div>';
      }
      $output .= '</div>';
    }

    return $output;
  }

}