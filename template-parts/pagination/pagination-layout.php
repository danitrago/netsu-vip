<?php
function pagination_layout($query_result)
{
?>
    <div class="pagination flex gap-3 border border-teal-400 float-right px-5 py-3">
        <?php
        echo paginate_links(array(
            'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'total'        => $query_result->max_num_pages,
            'current'      => max(1, get_query_var('paged') ? get_query_var('paged') : get_query_var('page') /* usign "paged" for search OR "page" for archive */),
            'format'       => '?page=%#%',
            'show_all'     => true,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => sprintf('<i></i> %1$s', __('Anterior', 'text-domain')),
            'next_text'    => sprintf('%1$s <i></i>', __('Siguiente', 'text-domain')),
            'add_args'     => false,
            'add_fragment' => '',
        ));
        ?>
    </div>
<?php
}
