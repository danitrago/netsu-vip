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


				<!-- New Post Form -->
				<div id="postbox">
					<form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">

						<!-- post name -->
						<p><label for="title">Título</label><br />
							<input type="text" id="title" value="<?php echo get_the_ID() ?> - OFERTA" readonly tabindex="1" size="20" name="title" />
						</p>

						<!-- post name -->
						<p><label for="integrador">Integrador</label><br />
							<input type="text" id="integrador" value="<?php echo $current_user->user_login; ?>" readonly tabindex="1" size="20" name="integrador" />
						</p>

						<!-- post Valor -->
						<p><label for="valor">Valor</label><br />
							<input type="number" id="valor" value="" tabindex="1" size="20" name="valor" required />
						</p>

						<!-- post name -->
						<p><label for="asesor_comercial">Asesor comercial</label><br />
							<input type="text" id="asesor_comercial" value="" tabindex="1" size="20" name="asesor_comercial" required />
						</p>

						<!-- post name -->
						<p><label for="adjunto">Adjunto</label><br />
							<input type="file" id="adjunto" value="" tabindex="1" size="20" name="adjunto" required accept="application/pdf" />
						</p>
						
						<p align="right"><input type="submit" value="Publish" tabindex="6" id="submit" name="submit" /></p>

						<input type="hidden" name="action" value="new_post" />
						<?php wp_nonce_field('new-post'); ?>
					</form>

					<?php postingOffer(); ?>

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
