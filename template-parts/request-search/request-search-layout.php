<?php
function request_search_layout()
{
    global $wpdb;
    global $requests_taxonomy;
    global $post_type_requests;
    $tax_terms = get_terms([
        'taxonomy' => $requests_taxonomy,
        'hide_empty' => true,
    ]);
    $countries = $wpdb->get_results("SELECT DISTINCT meta_value as name, meta_value as slug FROM `wp_postmeta` WHERE meta_key = 'pais'");

?>
    <form role="search" method="get" action="<?php echo home_url() ?>">
        <input id="search-filter" type="search" class="p-3 h-12 rounded-none" placeholder="¿Qué estás buscando?" value="<?php echo get_query_var('s') ?>" name="s" tabindex="-1" hidden>

        <div class="mb-6 pl-3">
            <h3 class="font-semibold mb-3">Tipo de Contrato</h3>
            <?php
            radio_input($requests_taxonomy, $tax_terms, get_query_var($requests_taxonomy));
            ?>
        </div>
        <div class="mb-6 pl-3">
            <h3 class="font-semibold mb-3">País</h3>
            <?php
            radio_input('pais', $countries, get_query_var('pais'));
            ?>
        </div>
        <div class="mb-6 pl-3">
            <h3 class="font-semibold mb-3">Presupuesto</h3>
            <input type="number" class="p-3 h-12 rounded-none" placeholder="$0" value="<?php echo get_query_var('presupuesto') ?>" name="presupuesto" tabindex="-1">
        </div>
        <button type="submit" class="bg-teal-400 hover:bg-teal-400 hover:text-white text-white py-4 px-7">
            <span class="font-semibold uppercase">filtrar</span>
        </button>
        <input name="post_type" value="<?php echo $post_type_requests ?>" hidden>
    </form>
<?php

}
