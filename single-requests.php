<?php
/* Template Name: Single Request NETSU */

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


				<!-- New Post Form -->
				<div id="postbox">
					<form id="new_post" name="new_post" method="post" action="">

						<!-- post name -->
						<p><label for="title">Title</label><br />
							<input type="text" id="title" value="" tabindex="1" size="20" name="title" />
						</p>

						<!-- post Category -->
						<p><label for="Category">Category:</label><br />
						<p><?php wp_dropdown_categories('show_option_none=Category&tab_index=4&taxonomy=contract_type'); ?></p>


						<!-- post Content -->
						<p><label for="description">Content</label><br />
							<textarea id="description" tabindex="3" name="description" cols="50" rows="6"></textarea>
						</p>

						<!-- post Valor -->
						<p><label for="valor">Valor</label><br />
							<input type="number" id="valor" value="" tabindex="1" size="20" name="valor" />
						</p>

						<!-- post tags -->
						<p><label for="post_tags">Tags:</label>
							<input type="text" value="" tabindex="5" size="16" name="post_tags" id="post_tags" />
						</p>
						<p align="right"><input type="submit" value="Publish" tabindex="6" id="submit" name="submit" /></p>

						<input type="hidden" name="action" value="new_post" />
						<?php wp_nonce_field('new-post'); ?>
					</form>

					<?php createOffer(); ?>

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
