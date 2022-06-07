<?php
// PLEASE IMPORT THIS FILE IN THE "functions.php" file from the child theme

// initial setup
$post_type_requests = 'requests';
$requests_taxonomy = 'contract_type';
$state_to_show = 'Recepción de cotizaciones';

// adding query string vars
function rj_add_query_vars_filter( $vars ){
    $vars[] = "pais";
    $vars[] = "test";
    $vars[] = "presupuesto";
    return $vars;
}

// usign custom template for the custom type in searchs
function render_search_template($template)
{
    global $wp_query;
    global $post_type_requests;
    $post_type = get_query_var('post_type');
    
    if (!empty($wp_query->is_search) && $post_type == $post_type_requests) {
        return locate_template('requests-page.php');
    }
    
    return $template;
}

add_filter( 'query_vars', 'rj_add_query_vars_filter' );
add_filter('template_include', __NAMESPACE__ . '\\render_search_template');

// importing template parts and functions
require_once 'template-parts/request-search/request-search-layout.php';
require_once 'template-parts/form-inputs/select-input.php';
require_once 'template-parts/request-card/request-card-layout.php';
require_once 'template-parts/pagination/pagination-layout.php';
require_once 'template-parts/offer-form/offer-form-layout.php';

require_once 'fns/create-offer-post.php';
require_once 'fns/query-requests.php';
