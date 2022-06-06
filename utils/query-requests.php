<?php
function query_requests()
{
    global $post_type_requests;
    global $requests_taxonomy;
    global $state_to_show;

    $rd_args = array(
        'post_type' => $post_type_requests,
        's' => get_query_var('s'),
        'contract_type' => get_query_var($requests_taxonomy),
        'paged' =>  get_query_var('paged') ? get_query_var('paged') : get_query_var('page'), // usign "paged" for search OR "page" for archive
        'posts_per_page' => 3,
        'meta_query' => array(
            array(
                'key' => 'estado',
                'value' => array($state_to_show),
            ),
            array(
                'key' => 'pais',
                'value' => get_query_var('pais'),
                'compare' => 'LIKE',
            ),
            array(
                'key' => 'presupuesto',
                'value' => get_query_var('presupuesto'),
                'compare' => '>=',
            )
        )
    );

    $rd_query = new WP_Query($rd_args);

    return $rd_query;
}
