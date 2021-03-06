<?php get_header(); ?>

	<main id="site-content">
		<!-- Above The Fold Section -->
		<section id="above-the-fold-section">

			<div class="container">
				<div class="row">

					<?php /* Add Wrapper for Mobile Menu */ get_template_part('wrapper-for-mobile-menu'); ?>

					<!-- article -->
					<article id="post_404">

						<div class="h1 accent number-title">404</div>

						<h1 class="page-not-found-title"><?php _e('Page Not Found', 'rkmachinery'); ?></h1>
						<p><?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'rkmachinery'); ?></p>
						<a href="<?php echo home_url(); ?>" class="btn btn-1"><?php _e('to homepage', 'rkmachinery'); ?></a>

					</article>
					<!-- /article -->
					
				</div>
			</div>
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
