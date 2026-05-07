<?php

namespace MGFDL\Modules\msGalleryModule\msGalleryModuleTraits;

if (!defined('ABSPATH')) {
  die('Direct access forbidden.');
}

trait ModuleDataTrait
{

  /**
   * Get available image size options
   *
   * Returns an array of available WordPress image sizes with their
   * dimensions for use in the module settings.
   *
   * @since MGFD_PLUGIN_VERSION
   * @return array Array of image size options with labels.
   */
  public static function mgfd_image_size_options()
  {

    $default_image_sizes = ['thumbnail', 'medium', 'medium_large', 'large'];
    $image_sizes = [];
    foreach ($default_image_sizes as $size) {
      $image_sizes[$size] = [
        'width' => (int) get_option($size . '_size_w'),
        'height' => (int) get_option($size . '_size_h'),
        'crop' => (bool) get_option($size . '_crop')
      ];
    }

    $sizes = [];

    foreach ($image_sizes as $size_key => $size_attributes) {
      $control_title = ucwords(str_replace('_', ' ', $size_key));
      $sizes[$size_key] = $control_title;
    }

    $sizes['full'] = __('Full', 'ms-gallery-for-divi');

    return $sizes;
  }

  /**
   * Process gallery data from attachment IDs
   *
   * Fetches image data from WordPress media library based on provided attachment IDs.
   * Sanitizes and validates all data before returning.
   *
   * @since MGFD_PLUGIN_VERSION
   * @param array $props Module properties containing gallery configuration.
   * @param string $type Type of data to process (gallery or popup).
   * @return array Processed gallery data with sanitized image information.
   */
  public static function mgfd_gallery_data($props, $type)
  {
    $gallery_ids = $props['gallery_ids'];
    if (empty($gallery_ids)) {
      return array();
    }
    $gallery_images = get_posts([
      'include' => $gallery_ids,
      'post_status' => 'inherit',
      'post_type' => 'attachment',
      'post_mime_type' => 'image',
      'order' => 'ASC',
      'orderby' => 'post__in'
    ]);
    $mgfd_image_size = ($type === 'gallery') ? $props['gallery_image_size'] : 'full';
    $images_data = [];
    foreach ($gallery_images as $image) {
      $image_object = get_post($image->ID);
      $image_url = wp_get_attachment_image_src($image->ID, $mgfd_image_size);
      if (!$image_url) {
        continue;
      }

      $images_data[] = [
        'id' => $image->ID,
        'title' => $image_object->post_title,
        'alt' => get_post_meta($image->ID, '_wp_attachment_image_alt', true),
        'caption' => $image_object->post_excerpt,
        'description' => $image_object->post_content,
        'image_url' => $image_url[0],
        'width' => $image_url[1],
        'height' => $image_url[2]
      ];
    }

    return $images_data;
  }
}
