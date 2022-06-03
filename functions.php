<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if (!function_exists('chld_thm_cfg_locale_css')) :
    function chld_thm_cfg_locale_css($uri)
    {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');

if (!function_exists('child_theme_configurator_css')) :
    function child_theme_configurator_css()
    {
        wp_enqueue_style('chld_thm_cfg_child', trailingslashit(get_stylesheet_directory_uri()) . 'style.css', array('astra-theme-css'));
    }
endif;
add_action('wp_enqueue_scripts', 'child_theme_configurator_css', 10);

// END ENQUEUE PARENT ACTION

function render_search_template( $template ) {
   global $wp_query;
   $post_type = get_query_var( 'post_type' );

   if ( ! empty( $wp_query->is_search ) && $post_type == 'requests') {
      return locate_template( 'search-requests.php' );  //  redirect to custom-post-type-search.php
   }

   return $template;
}

add_filter( 'template_include', __NAMESPACE__ . '\\render_search_template' );

require_once 'template-parts/filter-box.php';
require_once 'template-parts/offer-form/offer-form-layout.php';
require_once 'template-parts/requests-search-form/requests-search-form-layout.php';
require_once 'utils/create-offer-post.php';
