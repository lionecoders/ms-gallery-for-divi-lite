<?php
namespace MGFDL\Modules\msGalleryModule\msGalleryModuleTraits;

trait mgfdHelper
{
    public static function get_all_attr_values($attrs)
    {
        $result = [];

        foreach ($attrs as $key => $attr) {

            $value = null;

            if (!empty($attr['desktop']['value'])) {

                $desktop_value = $attr['desktop']['value'];

                // gallery_ids direct value
                if ($key === 'gallery_ids') {

                    $value = $desktop_value;

                }
                // if value is array
                elseif (is_array($desktop_value)) {

                    $value = $desktop_value[$key] ?? $desktop_value;

                }
                // if value is string
                else {

                    $value = $desktop_value;

                }
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