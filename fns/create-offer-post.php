<?php

function upload_offer_file()
{
    if (isset($_FILES['adjunto'])) {

        if (!function_exists('wp_handle_upload')) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
        }

        global $wp_filesystem;
        WP_Filesystem();

        $name_file = $_FILES['adjunto']['name'];
        $tmp_name = $_FILES['adjunto']['tmp_name'];
        $allow_extensions = ['pdf'];

        // File type validation
        $path_parts = pathinfo($name_file);
        $ext = $path_parts['extension'];

        if (!in_array($ext, $allow_extensions)) {
            echo "Error: El archivo debe estar en formato PDF.";
            return false;
        }

        $content_directory = $wp_filesystem->wp_content_dir() . 'uploads/offers/';
        $wp_filesystem->mkdir($content_directory);

        if (move_uploaded_file($tmp_name, $content_directory . $name_file)) {
            $upload_id = wp_insert_attachment(array(
                'guid'           => $content_directory . $name_file,
                'post_mime_type' => "application/pdf",
                'post_title'     => preg_replace('/\.[^.]+$/', '', $name_file),
                'post_content'   => '',
                'post_status'    => 'inherit'
            ), $content_directory . $name_file);
            return $upload_id;
        } else {
            echo "Error: el archivo no fue subido.";
            return false;
        }
    }
}

function create_offer($idFile)
{
    if ('POST' == $_SERVER['REQUEST_METHOD'] && !empty($_POST['action']) &&  $_POST['action'] == "new_post") {
        // Do some minor form validation to make sure there is content
        if (isset($_POST['title'])) {
            $title =  $_POST['title'];
        } else {
            echo 'Please enter a  title - se envió: ' . print_r($_POST);
            return;
        }
        // if (isset($_POST['description'])) {
        //     $description = $_POST['description'];
        // } else {
        //     echo 'Please enter the content';
        // }
        // $tags = $_POST['post_tags'];

        // Add the content of the form to $post as an array
        $new_post = array(
            'post_title'    => $title,
            // 'post_content'  => $description,
            // 'post_category' => array($_POST['cat']),  // Usable for custom taxonomies too
            'meta_input' => array(
                'integrador' => $_POST['integrador'],
                'valor' => $_POST['valor'],
                'asesor_comercial' => $_POST['asesor_comercial'],
                'telefono_de_asesor' => $_POST['telefono_de_asesor'],
                'correo_electronico' => $_POST['correo_electronico'],
                'vigencia' => $_POST['vigencia'],
                'tiempo_de_entrega' => $_POST['tiempo_de_entrega'],
                'notas' => $_POST['notas'],
                'adjunto' => $idFile,
            ),
            // 'tags_input'    => array($tags),
            'post_status'   => 'publish',           // Choose: publish, preview, future, draft, etc.
            'post_type' => 'offers'  //'post',page' or use a custom post type if you want to
        );
        //save the new post
        $pid = wp_insert_post($new_post);
        //insert taxonomies
        echo $pid . 'Hecho, oferta guardada';
    }
}

function posting_offer()
{
    // upload file & create offer
    $fileId = upload_offer_file();
    // create offer in content type
    if ($fileId) {
        create_offer($fileId);
    }
}
