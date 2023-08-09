<?php
/**
 * Blog template file
 *
 * @package Javid
 */

$no_of_columns = get_theme_mod('archives_columns_number', 3);

?>

<?php get_header(); ?>
	<div id="primary">
		<main id="main" class="site-main mt-5" role="main">
			<div class="container">
				<?php
				if (have_posts()) {
					?>
					<div class="grid-<?php echo $no_of_columns; ?>">
						<?php
						// start the loop
						while (have_posts()) : the_post();
							?>
							<div class="box-shadow border-box padding-box archive-article mb-5">
								<?php
								get_template_part('template-parts/content');
								?>
							</div>
						<?php
						endwhile;
						// end the loop
						?>
					</div>
					<?php
				} else {
					get_template_part('template-parts/content-none');
				}
				?>
				<?php javid_pagination(); ?>
			</div>

		</main>
	</div>

<?php get_footer(); ?>