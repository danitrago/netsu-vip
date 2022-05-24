<?php
// Filters in archive requests page
function filterRequest() {
	$terms = get_terms([
        'taxonomy' => 'contract_type',
        'hide_empty' => true,
    ]);
    foreach ($terms as $term) {
        $urlBase = get_site_url();
        $postType = get_post_type();
        echo "<li>
            <a href='{$urlBase}/{$postType}/?contract_type={$term->slug}'>{$term->name}</a>
        </li>";
    }
}