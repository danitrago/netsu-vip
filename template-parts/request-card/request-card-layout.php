<?php
function request_card_layout()
{
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
            <span>Estado: <?php echo get_post_meta(get_the_ID(), 'estado', TRUE); ?></span>
            ,
            <span>Hasta: <?php echo get_post_meta(get_the_ID(), 'fecha_de_cierre', TRUE); ?></span>
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
