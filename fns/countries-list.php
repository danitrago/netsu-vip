<?php
function countries_list()
{
    global $wpdb;
    $query = $wpdb->get_results("SELECT DISTINCT meta_value as name FROM `wp_postmeta` WHERE meta_key = 'pais'");

    foreach ($query as $country) {
        $countries_options = explode("\"", $country->name);
        foreach ($countries_options as $country_option => $value) {
            if ($country_option % 2 != 0) {
                // push only countries
                $pushed_countries[] = $value;
            }
        }
    }

    foreach (array_unique($pushed_countries) as $country) {
        $object = new stdClass();
        $object->name = $country;
        $object->slug = $country;
        $result[] = $object;
    }

    return $result;
}
