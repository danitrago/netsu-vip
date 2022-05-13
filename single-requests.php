<?php
/* Template Name: Custom Template */

get_header();
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
					<h1><?php the_title(); ?></h1>
				</div>

				<div class="post-meta">
					<hr />
					<p><?php echo get_post_meta(get_the_ID(), 'estado', TRUE); ?></p>
					<p><?php echo get_post_meta(get_the_ID(), 'vigencia', TRUE); ?></p>
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

				<form>
					<label for="test">Nombre Asesor</label>
					<input name="test" />
				</form>

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
