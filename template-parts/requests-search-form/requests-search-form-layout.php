<?php
function netsu_request_search_form()
{
    global $requests_taxonomy;
    $tax_terms = get_terms([
        'taxonomy' => $requests_taxonomy,
        'hide_empty' => true,
    ]);
    global $wpdb;
    $countries = $wpdb->get_results("SELECT DISTINCT meta_value as name, meta_value as slug FROM `wp_postmeta` WHERE meta_key = 'pais'");

    echo '<form role="search" method="get" class="search-form" action="' . home_url() . '">';
    echo '<input name="post_type" value="requests" hidden>';
    // search keyword
    echo '
    <input type="search" class="search-field" placeholder="Buscar …" value="' . get_query_var('s') . '" name="s" tabindex="-1">
    <br />
    ';

    // contract type
    select_input($requests_taxonomy, $tax_terms, 'Tipo de contrato', get_query_var($requests_taxonomy));
    // country
    select_input('pais', $countries, 'País', get_query_var('pais'));

     // budget from
     echo '
     <input type="number" class="search-field" placeholder="Presupuesto desde..." value="' . get_query_var('presupuesto') . '" name="presupuesto" tabindex="-1">
     <br />
     ';

    echo '<input type="submit" class="search-submit" value="Buscar">';
    echo '</form>';
}
