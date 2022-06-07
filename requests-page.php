<?php
/* Template Name: All Requests Page NETSU */

get_header();
?>

<main id="main" class="content-wrapper" style="display:flex">
    <div>
        <?php
        request_search_layout();
        ?>
    </div>
    <div>
        <?php
        // get data
        $query_result = query_requests();
        // use data to print elements
        if ($query_result->have_posts()) :
        ?>
            <h1>Todas las Solicitudes (<?php echo $query_result->found_posts ?>)</h1>
            <?php
            while ($query_result->have_posts()) {
                $query_result->the_post();
                request_card_layout();
            }
            ?>
            <!-- Add the pagination functions here. -->
            <hr />
        <?php
            pagination_layout($query_result);
        // Navigation
        // the_posts_navigation();
        else :
            // No Post Found
            echo '<h5>Ups, no se encontraron resultados</h5>';
        endif;
        ?>
    </div>
</main><!-- #main -->

<?php
get_footer();
