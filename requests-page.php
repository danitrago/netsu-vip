<?php
/* Template Name: All Requests Page NETSU */

get_header();
?>

<main id="main" class="content-wrapper" style="display:flex">
    <div>
        <?php
        netsu_request_search_form();
        ?>
    </div>
    <div>
        <?php
        $query_result = query_requests();
        if ($query_result->have_posts()) :
        ?>
            <h1>Todas las Solicitudes (<?php echo $query_result->found_posts ?>)</h1>
            <?php
            echo 'Pages: ' . $query_result->max_num_pages
            ?>
            <br/>
            <?php
            echo 'Selected Page: ' . get_query_var('page')
            ?>
             <br/>
            <?php
            echo 'Selected Paged: ' . get_query_var('paged')
            ?>
            <?php
            while ($query_result->have_posts()) {
                $query_result->the_post();
            ?>
                <div class="archive-item">
                    <div class="post-title">
                        <a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                        </a>
                        <h4>Tipo: <?php $taxonomy_names = wp_get_post_terms(get_the_ID(), 'contract_type');
                                    foreach ($taxonomy_names as $taxonomy) {
                                        // echo $taxonomy->slug . " : ";
                                        echo $taxonomy->name;
                                        echo "<br><br>";
                                    } ?></h4>
                    </div>
                    <div class="post-meta">
                        <span><?php echo get_post_meta(get_the_ID(), 'estado', TRUE); ?></span>
                        <span>Hasta: <?php echo get_post_meta(get_the_ID(), 'vigencia', TRUE); ?></span>
                        <ul>
                            <?php
                            foreach (get_post_meta(get_the_ID(), 'marcas', TRUE) as &$marca) {
                                echo '<li>' . $marca . '</li>';
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    </div>

                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>

                    <div class="post-fields">
                        <?php the_meta(); ?>
                    </div>

                </div>
            <?php
            }
            ?>
            <!-- Add the pagination functions here. -->
            <hr />
            <div class="pagination">
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
            <hr />
            <?
            the_posts_pagination()
            ?>
        <?php
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
