<?php
/* Template Name: Single Request NETSU */

get_header();

$current_user = wp_get_current_user();
?>

<main id="main" class="content-wrapper">

	<?php if (have_posts()) : ?>

		<?php
		// Start the Loop.
		while (have_posts()) :
			// You can list your posts here
			the_post();
		?>
			<div class="archive-item">
				<div class="post-title">
					<h1><small>ID:<?php echo get_the_ID(); ?></small> - <?php the_title(); ?></h1>
				</div>

				<div class="post-meta">
					<hr />
					<p>Estado: <?php echo get_post_meta(get_the_ID(), 'estado', TRUE); ?></p>
					<p>Vigencia: <?php echo get_post_meta(get_the_ID(), 'fecha_de_cierre', TRUE); ?></p>
					Marcas:
					<ul>
						<?php
						foreach (get_post_meta(get_the_ID(), 'marcas', TRUE) as &$marca) {
							echo '<li>' . $marca . '</li>';
						}
						?>
					</ul>
				</div>
				<hr />
				<div class="post-content">
					<?php the_content(); ?>
				</div>

				<div class="post-fields">
					<?php the_meta(); ?>
				</div>


				<?php formPostOffer() ?>

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
