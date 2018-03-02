<?php /* Template Name: Careers */ ?>

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

		<!-- loop through page_id=51 data (Home Page) -->
		<?php $the_query_5 = new WP_Query('page_id=5');
			while ($the_query_5->have_posts()) : $the_query_5->the_post(); ?>

			<?php if( have_rows('page_builder') ): ?>
			    <?php while ( have_rows('page_builder') ) : the_row(); ?>

				<?php /* About Us Section */
			    if( get_row_layout() == 'about_us_section' ): ?>
			    <section class="<?php echo get_row_layout(); if( get_sub_field('overlay_color') == 'none' ) { echo " no-background"; } ?>" style="background-image: url(<?php echo get_sub_field('bg-img')['url']; ?>);">

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
			    			<div class="title-block">
			    				<h4 class="title"><?php the_sub_field('title'); ?></h4>
			    			</div>

			    			<?php if( have_rows('section_content') ): ?>
			    			<div class="block-wrapper-2">
			    				<?php while( have_rows('section_content') ) : the_row(); ?>

			    					<div class="about-us-block">
			    						<div class="icon-wrapper">
			    							<span class="icon"></span>
			    						</div>
			    						<div class="block-content-wrapper">
											<h3 class="title"><?php the_sub_field('title'); ?></h3>
											<p class="text"><?php the_sub_field('contents'); ?></p>
		    								<a class="link" href="<?php the_sub_field('link') ?>" rel="nofollow"><?php the_sub_field('link_text'); ?></a>
			    						</div>
			    					</div>

			    				<?php endwhile; ?>
			    			</div>
			    			<?php endif; ?>

			    		</div>
			    	</div>
			    </section>
				<?php endif; ?>
			
				<?php endwhile; ?>
			<?php endif; ?>

		<?php endwhile; wp_reset_postdata(); ?>
		<!-- /loop through page_id=5 data (Home Page) -->

	</main>

<?php get_footer(); ?>