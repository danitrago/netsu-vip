<?php

function createOffer()
{
    if ('POST' == $_SERVER['REQUEST_METHOD'] && !empty($_POST['action']) &&  $_POST['action'] == "new_post") {
        // Do some minor form validation to make sure there is content
        if (isset($_POST['title'])) {
            $title =  $_POST['title'];
        } else {
            echo 'Please enter a  title';
            return;
        }
        if (isset($_POST['description'])) {
            $description = $_POST['description'];
        } else {
            echo 'Please enter the content';
        }
        $tags = $_POST['post_tags'];

        // Add the content of the form to $post as an array
        $new_post = array(
            'post_title'    => $title,
            'post_content'  => $description,
            'post_category' => array($_POST['cat']),  // Usable for custom taxonomies too
            'meta_input' => array('valor' => $_POST['valor']),
            'tags_input'    => array($tags),
            'post_status'   => 'publish',           // Choose: publish, preview, future, draft, etc.
            'post_type' => 'offers'  //'post',page' or use a custom post type if you want to
        );
        //save the new post
        $pid = wp_insert_post($new_post);
        //insert taxonomies
        echo $pid . 'Hecho, oferta guardada';
    }
}
