<?php
function netsu_request_search_form($tax)
{
    $terms = get_terms([
        'taxonomy' => $tax,
        'hide_empty' => true,
    ]);

    echo '
    <form role="search" method="get" class="search-form" action="http://localhost/vip-netsu/">
        <label>
        <span class="screen-reader-text">Buscar por:</span>
        <input type="search" class="search-field" placeholder="Buscar …" value="" name="s" tabindex="-1" required>
        <br />
        <select name="contract_type">
        <option value="">Seleccionar</option>
        ';

    foreach ($terms as $term) {
        echo "<option value='{$term->slug}'>{$term->name}</option>";
    };

    echo '
        </select>
        <br />
        <input name="post_type" value="requests" hidden>
        </label>
        <input type="submit" class="search-submit" value="Buscar">
        </form>
        ';
}
