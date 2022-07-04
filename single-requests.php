<?php
/* Template Name: Single Request NETSU */

get_header();

$current_user = wp_get_current_user();
?>

<main id="main" class="w-full py-6 min-h-screen">
	<?php if (have_posts()) : ?>
		<?php
		// Start the Loop.
		while (have_posts()) :
			// You can list your posts here
			the_post();
		?>
			<div class="w-full flex flex-col md:flex-row gap-3">
				<div class="basis-2/4 mb-6">
					<div class="archive-item bg-white mb-6 p-6 relative shadow-lg min-h-screen">
						<div class="mb-3">
							<span class="capitalize text-sm">Cliente: <?php echo get_post_meta(get_the_ID(), 'empresa', TRUE); ?></span>
							<br />
							<h1 class="text-3xl font-semibold mb-2"><?php the_title(); ?></h1>
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
						</div>
						<h3 class="mb-4">Detalles de la solicitud</h3>
						<table>
							<tbody>
								<tr><?php table_row_layout('Empresa', 'empresa') ?></tr>
								<tr><?php table_row_layout('Pais', 'pais') ?></tr>
								<tr><?php table_row_layout('Presupuesto en USD', 'presupuesto', 'number') ?></tr>
								<tr><?php table_row_layout('Cantidad de productos', 'cantidad', 'number') ?></tr>
								<tr><?php table_row_layout('Marcas', 'marcas', 'array') ?></tr>
								<tr class="bg-lime-100 font-semibold"><?php table_row_layout('Fecha de cierre', 'fecha_de_cierre', 'date') ?></tr>
								<tr><?php table_row_layout('Fecha de compra', 'fecha_de_compra', 'date') ?></tr>
							</tbody>
						</table>

					</div>

				</div>
				<div class="basis-2/4 lg:pl-12">
					<div class="sticky top-8">
						<h2 class="text-xl font-semibold mb-5">Cotizar</h2>
						<?php formPostOffer() ?>
					</div>
				</div>
			</div>
	<?php
		endwhile;
		// Navigation
		the_post_navigation();
	else :
	// No Post Found
	endif;
	?>
</main><!-- #main -->

<?php
get_footer();
