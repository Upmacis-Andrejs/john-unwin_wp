<?php /* Template Name: About Us */ ?>

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
						<h1 class="title"><?php the_sub_field('title'); ?></h1>
						<p class="text"><?php the_sub_field('page_content'); ?></p>
						<?php endwhile; ?>
					</div>
					<?php endif; ?>

					<?php /* Add Get a Free Quote Block if quote_block field is true */
						if ( get_field('quote_block') == 'true' ) {
							get_template_part('quote-block');
						}
					?>

					<?php /* Add Call Us Now Block if quote_block field is true */
						if ( get_field('call_us_block') == 'true' ) {
							get_template_part('call-us-block');
						}
					?>

				</div>
			</div>
		</section>
		<!-- /Above The Fold Section -->

		<!-- Sections Added With Page Builder -->
		<?php get_template_part('page-builder-block'); ?>
		<!-- /Sections Added With Page Builder -->

	</main>

<?php get_footer(); ?>