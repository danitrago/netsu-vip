<?php
// Filters in archive requests page
function netsu_filter_box($tax, $title, $slug)
{
    $terms = get_terms([
        'taxonomy' => $tax,
        'hide_empty' => true,
    ]);
    echo "<h5>" . $title . "</h5>";
    echo "<ul>";
    foreach ($terms as $term) {
        $urlBase = get_site_url();
        // $postType = get_post_type();
        echo "<li>
        <a href='{$urlBase}/{$slug}/?contract_type={$term->slug}'>{$term->name} ({$term->count})</a>
        </li>";
    }
    echo "</ul>";
    echo "<hr/>";
}
