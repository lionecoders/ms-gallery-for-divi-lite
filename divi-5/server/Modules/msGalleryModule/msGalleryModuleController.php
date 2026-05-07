<?php
/**
 * msGalleryModule Controller.
 *
 * @package MGFD\Modules\msGalleryModule;
 */

namespace MGFDL\Modules\msGalleryModule;

if ( ! defined( 'ABSPATH' ) ) {
  die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\Controllers\RESTController;
use MGFDL\Modules\msGalleryModule\msGalleryModuleTraits\ModuleDataTrait;
use WP_REST_Request;
use WP_REST_Response;

/**
 * Class msGalleryModuleController
 *
 * @package MGFD\Modules\msGalleryModule
 */
class msGalleryModuleController extends RESTController {

  /**
   * Return data for the msGalleryModule.
   *
   * @param WP_REST_Request $request REST request object.
   *
   * @return WP_REST_Response|WP_Error
   */
  public static function index( WP_REST_Request $request ): WP_REST_Response {
    $props['gallery_ids'] = $request->get_param( 'gallery_ids' );
    $props['gallery_image_size'] = $request->get_param( 'gallery_image_size' );
    $response = [
      'data' =>  ModuleDataTrait::mgfd_gallery_data($props, 'gallery'),
    ];

    return self::response_success( $response );
  }

  /**
   * Index action arguments.
   *
   * Endpoint arguments as used in `register_rest_route()`.
   *
   * @return array
   */
  public static function index_args(): array {
    return [
      'gallery_ids' => [
        'type'              => 'string',
        'default'           => '',
        'sanitize_callback' => function( $value, $request, $param ) {
          return explode( ',', $value );
        },
      ],
    ];
  }

  /**
   * Index action permission.
   *
   * Endpoint permission callback as used in `register_rest_route()`.
   *
   * @return bool
   */
  public static function index_permission(): bool {
    return true; // You can use your own permission check here.
  }
}