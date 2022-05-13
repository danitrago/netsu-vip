<?php
/* Template Name: Custom Template */

get_header();
?>

<main id="main" class="content-wrapper" style="display:flex">
	<div>
		<h3>Filtrar</h3>
		<?php
		$terms = get_terms([
			'taxonomy' => 'request_type',
			'hide_empty' => false,
		]);
		foreach ($terms as $term) {
			echo $term->slug . " : ";
			echo $term->name;
			echo "<br><br>";
		}
		?>
	</div>
	<div>
		<?php if (have_posts()) : ?>
			<h1>Todas las Solicitudes</h1>
			<hr />
			<?php
			// Start the Loop.
			while (have_posts()) :
				// You can list your posts here
				the_post();
			?>
				<div class="archive-item">
					<div class="post-title">
						<a href="<?php the_permalink(); ?>">
							<h2><?php the_title(); ?></h2>
						</a>
						<h4>Tipo: <?php $taxonomy_names = wp_get_post_terms(get_the_ID(), 'request_type');
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
			endwhile;
			// Navigation
			// the_post_navigation();
		else :
		// No Post Found
		endif;
		?>
	</div>
</main><!-- #main -->

<?php
get_footer();
