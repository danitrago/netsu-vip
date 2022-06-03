<?php
function netsu_request_search_form()
{
    echo '
    <form role="search" method="get" class="search-form" action="http://localhost/vip-netsu/">
        <label>
        <span class="screen-reader-text">Buscar por:</span>
        <input type="search" class="search-field" placeholder="Buscar …" value="" name="s" tabindex="-1">
        <br />
        <select name="contract_type">
        <option value="">Seleccionar</option>
        <option value="compra-directa">Compra directa</option>
        <option value="alquiler">Alquiler</option>
        </select>
        <br />
        <input name="post_type" value="requests" hidden>
        </label>
        <input type="submit" class="search-submit" value="Buscar">
        </form>
        ';
}
