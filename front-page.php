<?php get_header(); ?>

	<main id="site-content">

		<!-- Above The Fold Section -->
		<section <?php if( get_field('overlay_color') == 'none' ) { echo 'class="no-background"'; } ?> id="above-the-fold-section" style="background-image: url(<?php echo get_field('bg-img')['url']; ?>);">

			<?php /* Set section overlay color */
				if( get_field('overlay_color') == 'dark' ) {
					$overlay_color = 'rgba(#0b2644, 0.9)';
				} elseif ( get_field('overlay_color') == 'light' ) {
					$overlay_color = 'rgba(#214c89, 0.9)';
				}
			?>
			<?php if( !get_field('overlay_color') == 'none' ): ?>
				<div class="section-overlay" style="background: <?php echo $overlay_color; ?>"></div>
			<?php endif; ?>

			<?php /* Add map to homepage background */
				if ( is_front_page() ):
			?>
				<div class="background-map">
					<img src="<?php echo get_template_directory_uri(); ?>/img/background-map.svg" alt="map">
				</div>
			<?php endif; ?>

			<div class="container">
				<div class="row">

					<div class="page-conent">
						<a id="main-site-logo" href="<?php echo home_url(); ?>">
							<img src="<?php echo get_field('site_logo', 'option')['url']; ?>" alt="Site Logo">
						</a>
						<div class="editor-wrapper">
							<?php the_field('page_content'); ?>
						</div>
					</div>

					<?php /* Add list to homepage */
						if ( is_front_page() ):
					?>
						<div class="above-the-fold-list-wrapper">
							<h6 class="title">Areas we cover:</h6>
							<ul>
								<li>Loughborough</li>
								<li>Leicestershire</li>
								<li>Nottinghamshire</li>
								<li>Derbyshire</li>								
							</ul>
						</div>
					<?php endif; ?>

					<?php /* Add Get a Free Quote Block if quote_block field is true */
						if ( get_field('quote_block') == 'true' ):
					?>
					<?php endif; ?>

					<?php /* Add Call Us Now Block if quote_block field is true */
						if ( get_field('call_us_block') == 'true' ):
					?>
					<?php endif; ?>

				</div>
			</div>
		</section>
		<!-- /Above The Fold Section -->

		<!-- Sections Added With Page Builder -->

		<!-- /Sections Added With Page Builder -->
	</main>

<?php get_footer(); ?>