<?php /* Template Name: Services */ ?>

<?php get_header(); ?>

	<main id="site-content">

		<!-- Above The Fold Section -->
		<section <?php if( get_field('overlay_color') == 'none' ) { echo 'class="no-background"'; } ?> id="above-the-fold-section" style="background-image: url(<?php echo get_field('bg-img')['url']; ?>);">

			<?php /* Set section overlay color */
				if( get_sub_field('overlay_color') == 'dark' ) {
					$overlay_class = 'dark';
				} elseif ( get_field('overlay_color') == 'light' ) {
					$overlay_class = 'light';
				}
			?>
			<?php if( get_field('overlay_color') != 'none' ): ?>
				<div class="section-overlay <?php echo $overlay_class; ?>"></div>
			<?php endif; ?>

			<div class="container">
				<div class="row">
					<div class="main-site-logo-wrapper">
						<a id="main-site-logo" href="<?php echo home_url(); ?>">
							<img src="<?php echo get_field('site_logo', 'option')['url']; ?>" alt="Site Logo">
						</a>
					</div>

					<?php if( have_rows('above_the_fold_main') ): ?>
					<div class="page-content">
						<?php while( have_rows('above_the_fold_main') ) : the_row(); ?>
						<h1><?php the_sub_field('page_content'); ?></h1>

						<?php if( have_rows('above_the_fold_list') ): ?>
						<ul class="list">

							<?php while( have_rows('above_the_fold_list') ) : the_row(); ?>
							<li <?php if( get_sub_field('atf_highlight_li') == 'true' ) { echo 'class="highlight"'; } ?>><?php the_sub_field('atf_li_text'); ?></li>
							<?php endwhile; ?>

						</ul>
						<?php endif; ?>

						<h6 class="additional-text"><?php the_sub_field('atf_additional_text'); ?></h6>

						<?php /* Add Media Block */ get_template_part('media-in-page-content'); ?>

						<?php endwhile; ?>
					</div>
					<?php endif; ?>
					
					<?php /* Add Selected Blocks */ get_template_part('add-blocks'); ?>
					<?php /* Add Media Block */ get_template_part('media-in-extra-blocks'); ?>

				</div>
			</div>
		</section>
		<!-- /Above The Fold Section -->

		<!-- Sections Added With Page Builder -->
		<?php get_template_part('page-builder-block'); ?>
		<!-- /Sections Added With Page Builder -->

	</main>

<?php get_footer(); ?>