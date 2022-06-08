<?php
function request_card_layout()
{
?>
    <div class="archive-item bg-white mb-6 p-6 relative shadow-lg">
        <div class="mb-3">
            <span class="capitalize text-sm">Cliente: <?php echo get_post_meta(get_the_ID(), 'empresa', TRUE); ?></span>
            <br />
            <a href="<?php the_permalink(); ?>">
                <h2 class="text-xl font-semibold hover:text-teal-400 mb-2"><?php the_title(); ?></h2>
            </a>
            <span class="capitalize text-sm">
                <i class="fas fa-map-marker-alt text-teal-400"></i>
                <?php echo get_post_meta(get_the_ID(), 'pais', TRUE); ?>
            </span>
            |
            <span class="capitalize text-sm">
                <?php $taxonomy_names = wp_get_post_terms(get_the_ID(), 'contract_type');
                foreach ($taxonomy_names as $taxonomy) {
                    // echo $taxonomy->slug . " : ";
                    echo $taxonomy->name;
                    echo ", ";
                } ?>
            </span>
        </div>
        <div class="mb-5">
            <?php the_content(); ?>
            Marcas: 
            <?php
            foreach (get_post_meta(get_the_ID(), 'marcas', TRUE) as &$marca) {
                echo $marca . ',';
            }
            ?>
        </div>
        <div>
            <span class="text-sm">Vence:
                <?php
                echo date_format(date_create(get_post_meta(get_the_ID(), 'fecha_de_cierre', TRUE)), "d/m/Y");
                ?>
            </span>
        </div>
        <div class="absolute right-0 bottom-0 flex">
            <a href="<?php the_permalink(); ?>" class="bg-amber-500 hover:bg-teal-400 hover:text-white text-white py-4 px-7">
                <span class="font-semibold uppercase">cotizar</span>
            </a>
        </div>
    </div>
<?php
}
