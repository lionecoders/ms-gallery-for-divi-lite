<?php
namespace MGFDL\Modules\msGalleryModule\msGalleryModuleTraits;

trait mgfdHelper
{
    public static function get_all_attr_values($attrs)
    {
        $result = [];

        foreach ($attrs as $key => $attr) {
            if (!empty($attr['desktop']['value'])) {
                $value = $key === 'gallery_ids' ? esc_html($attr['desktop']['value']) : esc_html($attr['desktop']['value'][$key]);
            } else {
                $value = null;
            }
            // sanitize
            if (is_array($value)) {
                $result[$key] = array_map('esc_html', $value);
            } else {
                $result[$key] = esc_html($value);
            }
        }
        return $result;
    }
}