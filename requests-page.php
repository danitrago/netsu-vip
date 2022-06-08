<?php
/* Template Name: All Requests Page NETSU */

get_header();
?>

<main id="main" class="w-full py-6 min-h-screen">
    <div class="w-full">
        <?php search_keyword_layout() ?>
    </div>
    <div class="w-full flex flex-col md:flex-row gap-3">
        <div class="basis-1/4 mb-6">
            <div class="sticky top-8">
                <h2 class="text-xl font-semibold mb-5">Filtrar</h2>
                <?php
                request_search_layout();
                ?>
            </div>
        </div>
        <div class="basis-3/4 lg:pl-12">
            <?php
            // get data
            $query_result = query_requests();
            // use data to print elements
            if ($query_result->have_posts()) :
            ?>
                <h1 class="text-2xl font-semibold mb-5">
                    <?php
                    global $wp_query;
                    global $post_type_requests;
                    $post_type = get_query_var('post_type');
                    if (!empty($wp_query->is_search) && $post_type == $post_type_requests) {
                        echo "Resultados de Búsqueda ({$query_result->found_posts})";
                    } else {
                        echo "Todas las Solicitudes ({$query_result->found_posts})";
                    }
                    ?>
                </h1>
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
            ?>
                <div class="text-center py-6">
                    <i class="fa fa-frown text-7xl mb-6 text-teal-400 animate-pulse"></i>
                    <h2 class="text-2xl text-center">¡Ups!, no se encontraron resultados</h2>
                    <p>Intenta de nuevo con unos filtros de búsqueda diferentes.</p><br />
                    <a href="<?php echo home_url() ?>"><i class="fa fa-times mr-2"></i>Limpiar filtros</a>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();
