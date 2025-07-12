<?php

/**
 * MGFD Helper Class
 *
 * Helper functions for the MS Gallery for Divi module.
 * Provides field configurations, styling, and template generation.
 *
 * @package MsGalleryForDivi
 * @subpackage Modules
 * @since 1.0.0
 */

// Prevent direct access to this file.
if (! defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * MGFD_Helper Class
 *
 * Contains helper methods for the MS Gallery Divi module including
 * field configurations, styling, and template generation.
 *
 * @since 1.0.0
 */
class MGFD_Helper
{

    /**
     * Get settings fields configuration
     *
     * Returns the configuration array for all module settings fields
     * used in the Divi Builder interface.
     *
     * @since 1.0.0
     * @return array Array of field configurations for the module settings.
     */
    public static function get_settings_fields()
    {
        return array(
            'gallery_ids'     => [
                'label'            => __('Choose Images', 'ms-gallery-for-divi-lite'),
                'description'      => __('Choose the images that you would like to appear in the image gallery.', 'ms-gallery-for-divi-lite'),
                'type'             => 'upload-gallery',
                'option_category'  => 'basic_option',
                'toggle_slug'      => 'general',
                'computed_affects' => 'gallery_data'
            ],

            'gallery_image_size' => [
                'label' => __('Image Size', 'ms-gallery-for-divi-lite'),
                'description' => __('Set the size of the image.', 'ms-gallery-for-divi-lite'),
                'type' => 'select',
                'options' => self::mgfd_image_size_options(),
                'default' => 'full',
                'toggle_slug' => 'general',
                'computed_affects' => 'gallery_data'
            ],

            'gallery_data' => [
                'type'                => 'computed',
                'computed_callback'   => ['MGFD_Helper', 'mgfd_gallery_data'],
                'computed_depends_on' => ['gallery_ids', 'gallery_image_size']
            ],
            'gallery_style' => [
                'label' => __('Gallery Style', 'ms-gallery-for-divi-lite'),
                'description' => __('Set the style of the gallery.', 'ms-gallery-for-divi-lite'),
                'type' => 'select',
                'options' => ['masonry'],
                'default' => 'masonry',
                'toggle_slug' => 'general'
            ],
            'grid_column' => [
                'label' => __('Grid Column', 'ms-gallery-for-divi-lite'),
                'description' => __('Set the number of columns.', 'ms-gallery-for-divi-lite'),
                'type' => 'range',
                'range_settings' => [
                    'min' => 1,
                    'max' => 5,
                    'step' => 1
                ],
                'default' => '4',
                'toggle_slug' => 'general',
            ],
            'grid_column_gap' => [
                'label' => __('Column Gap', 'ms-gallery-for-divi-lite'),
                'description' => __('Set the gap between the columns.', 'ms-gallery-for-divi-lite'),
                'type' => 'range',
                'allowed_units' => ['px', 'em', 'rem', 'vh', 'vw', '%'],
                'range_settings' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1
                ],
                'default' => '10px',
                'toggle_slug' => 'general',
            ],
            'grid_row_gap' => [
                'label' => __('Row Gap', 'ms-gallery-for-divi-lite'),
                'description' => __('Set the gap between the rows.', 'ms-gallery-for-divi-lite'),
                'type' => 'range',
                'allowed_units' => ['px', 'em', 'rem', 'vh', 'vw', '%'],
                'range_settings' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1
                ],
                'default' => '10px',
                'toggle_slug' => 'general',
            ]
        );
    }

    /**
     * Get advanced settings fields configuration
     *
     * Returns the configuration array for advanced module settings
     * including borders and other styling options.
     *
     * @since 1.0.0
     * @return array Array of advanced field configurations.
     */
    public static function get_advanced_settings_fields()
    {
        $advanced_fields                   = array();
        $advanced_fields['text']           = false;
        $advanced_fields['link_options']   = false;
        $advanced_fields['fonts']          = false;
        $advanced_fields['margin_padding'] = false;
        $advanced_fields['animation']      = false;
        $advanced_fields['transform']      = false;

        $advanced_fields['borders']['image_style'] = array(
            'label_prefix' => esc_html__('Items', 'ms-gallery-for-divi-lite'),
            'css'          => array(
                'main' => array(
                    'border_styles' => '%%order_class%% .mgfd-ms-gallery-masonry-item img',
                    'border_radii'  => '%%order_class%% .mgfd-ms-gallery-masonry-item img',
                ),
                'important' => true,
            ),
            'tab_slug'     => 'advanced',
            'toggle_slug'  => 'image_style'
        );


        return $advanced_fields;
    }

    /**
     * Apply gallery styling to the module
     *
     * Sets CSS custom properties for grid columns, gaps, and overlay colors
     * based on module settings.
     *
     * @since 1.0.0
     * @param array  $props Module properties containing styling configuration.
     * @param string $render_slug Render slug for CSS targeting.
     * @return void
     */
    public static function MGFD_gallery_style($props, $render_slug)
    {

        if ($props['grid_column'] !== '') {
            ET_Builder_Element::set_style(
                $render_slug,
                array(
                    'selector'    => '%%order_class%% .mgfd-ms-gallery-grid-item, %%order_class%% .mgfd-ms-gallery-masonry-container',
                    'declaration' => sprintf('--mgfd-grid_column: %1$s !important;', $props['grid_column'])
                )
            );
        }



        if ($props['grid_column_gap'] !== '' && $props['gallery_style'] !== 'masonry') {
            ET_Builder_Element::set_style(
                $render_slug,
                array(
                    'selector'    => '%%order_class%% .mgfd-ms-gallery-masonry-container',
                    'declaration' => sprintf('--mgfd-grid-horizontal-gap: %1$s !important;', $props['grid_column_gap'])
                )
            );
        } else {
            ET_Builder_Element::set_style(
                $render_slug,
                array(
                    'selector'    => '%%order_class%% .mgfd-ms-gallery-masonry-container',
                    'declaration' => sprintf('--mgfd-masonry-horizontal-gap: %1$s !important;', $props['grid_column_gap'])
                )
            );
        }

        if ($props['grid_row_gap'] !== '' && $props['gallery_style'] !== 'masonry') {
            ET_Builder_Element::set_style(
                $render_slug,
                array(
                    'selector'    => '%%order_class%% .mgfd-ms-gallery-masonry-item',
                    'declaration' => sprintf('--mgfd-grid-vertical-gap: %1$s !important;', $props['grid_row_gap'])
                )
            );
        } else {
            ET_Builder_Element::set_style(
                $render_slug,
                array(
                    'selector'    => '%%order_class%% .mgfd-ms-gallery-masonry-item',
                    'declaration' => sprintf('--mgfd-masonry-vertical-gap: %1$s !important;', $props['grid_row_gap'])
                )
            );
        }


    }

    /**
     * Generate gallery HTML template
     *
     * Creates the HTML structure for the gallery based on the selected style
     * and gallery data with proper escaping and security measures.
     *
     * @since 1.0.0
     * @param array  $props Module properties containing gallery configuration.
     * @param string $render_slug Render slug for CSS targeting.
     * @param array  $gallery_data Processed gallery data with image information.
     * @return string Generated HTML output for the gallery.
     */
    public static function MGFD_template_style($props, $render_slug, $gallery_data)
    {
        if (empty($gallery_data)) {
            return '<p>No gallery items found.</p>';
        }

        $output = '<div class="mgfd-ms-gallery-masonry-container">';

        foreach ($gallery_data as $item) {
            $output .= '<div class="mgfd-ms-gallery-masonry-item">';
            $output .= '<a href="' . esc_url($item['image_url']) . '" target="_blank">';
            $output .= wp_get_attachment_image($item['id'], $props['gallery_image_size'], false, [
                'class' => 'mgfd-gallery-img',
                'title' => esc_attr($item['title']),
                'alt'   => esc_attr($item['alt']),
            ]);
            $output .= '</a>';
            $output .= '</div>';
        }        

        $output .= '</div>';

        return $output;
    }


    /**
     * Get available image size options
     *
     * Returns an array of available WordPress image sizes with their
     * dimensions for use in the module settings.
     *
     * @since 1.0.0
     * @return array Array of image size options with labels.
     */
    public static function mgfd_image_size_options()
    {

        $default_image_sizes = ['thumbnail', 'medium', 'medium_large', 'large'];
        $image_sizes         = [];
        foreach ($default_image_sizes as $size) {
            $image_sizes[$size] = [
                'width'  => (int) get_option($size . '_size_w'),
                'height' => (int) get_option($size . '_size_h'),
                'crop'   => (bool) get_option($size . '_crop')
            ];
        }

        $sizes = [];

        foreach ($image_sizes as $size_key => $size_attributes) {
            $control_title    = ucwords(str_replace('_', ' ', $size_key));
            $sizes[$size_key] = $control_title;
        }

        $sizes['full'] = __('Full', 'ms-gallery-for-divi-lite');

        return $sizes;
    }

    /**
     * Process gallery data from attachment IDs
     *
     * Fetches image data from WordPress media library based on provided attachment IDs.
     * Sanitizes and validates all data before returning.
     *
     * @since 1.0.0
     * @param array $props Module properties containing gallery configuration.
     * @return array Processed gallery data with sanitized image information.
     */
    public static function mgfd_gallery_data($props)
    {
        $gallery_ids = $props['gallery_ids'];
        if (empty($gallery_ids)) {
            return array();
        }
        $gallery_images = get_posts([
            'include'        => $gallery_ids,
            'post_status'    => 'inherit',
            'post_type'      => 'attachment',
            'post_mime_type' => 'image',
            'order'          => 'ASC',
            'orderby'        => 'post__in'
        ]);

        $images_data = [];
        foreach ($gallery_images as $image) {
            $image_object = get_post($image->ID);
            $image_url    = wp_get_attachment_image_src($image->ID, $props['gallery_image_size']);
            if (! $image_url) {
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
