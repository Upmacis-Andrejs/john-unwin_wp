<?php /* Template Name: Testimonials */ ?>

<?php get_header(); ?>

	<main id="site-content">

		<!-- Above The Fold Section -->
		<section <?php if( get_field('overlay_color') == 'none' ) { echo 'class="no-background"'; } ?> id="above-the-fold-section">

			<?php /* Add Section Background */ get_template_part('section-background'); ?>

			<div class="container">
				<div class="row">
					<?php /* Add Wrapper for Mobile Menu */ get_template_part('wrapper-for-mobile-menu'); ?>
					<div class="main-site-logo-wrapper">
						<div class="title-block">
							<a id="main-site-logo" href="<?php echo home_url(); ?>">
								<img src="<?php echo get_field('site_logo', 'option')['url']; ?>" alt="Site Logo">
							</a>
						</div>
						<div class="decor-wrapper">
		    				<div class="decor-1"></div>
		    				<div class="decor-2"></div>
		    			</div>
	    				<div class="decor-line-1"></div>
	    				<div class="decor-line-2"></div>
					</div>

					<div class="above-the-fold-wrapper flex-vert-t">
						<?php if( have_rows('above_the_fold_main') ): ?>
						<div class="page-content" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1100">
							<?php while( have_rows('above_the_fold_main') ) : the_row(); ?>
								<?php if( get_sub_field('title') ): ?>
									<h1 class="title"><?php the_sub_field('title'); ?></h1>
								<?php endif; ?>
								<?php if( get_sub_field('page_content') ): ?>
									<p class="text"><?php the_sub_field('page_content'); ?></p>
								<?php endif; ?>
								<?php /* Add Media Block */ get_template_part('media-in-page-content'); ?>
							<?php endwhile; ?>
						</div>
						<?php endif; ?>

						<?php /* Add Selected Blocks */ get_template_part('add-blocks'); ?>
						<?php /* Add Media Block */ get_template_part('media-in-extra-blocks'); ?>
					</div>
				</div>

				<?php if( have_rows('testimonials') ): ?>
				<div class="row">
					<div class="testimonials-wrapper">
					<?php while( have_rows('testimonials') ) : the_row(); ?>
						<div class="testimonial-block" data-aos="fade-down" data-aos-duration="1100">
							<p class="text"><?php the_sub_field('contents'); ?></p>
							<p class="footnote"><?php the_sub_field('footnote'); ?></p>
						</div>
					<?php endwhile; ?>
					</div>
				</div>
				<?php endif; ?>

				<?php if ( get_field('feedback_form_shortcode') ): ?>
				<div class="row">
					<div class="feedback-form-wrapper flex-hor-c">
						<div class="feedback-form-block" data-aos="fade-up" data-aos-duration="1300">
							<?php
								$contact_form_shortcode = get_field('feedback_form_shortcode');
								echo do_shortcode($contact_form_shortcode, true);
							?>
							<div class="decor"></div>
						</div>
					</div>
				</div>
				<?php endif; ?>

			</div>
		</section>
		<!-- /Above The Fold Section -->

		<!-- loop through page_id=5 data (Home Page) -->
		<?php $the_query_5 = new WP_Query('page_id=5');
			while ($the_query_5->have_posts()) : $the_query_5->the_post(); ?>

			<?php if( have_rows('page_builder') ): ?>
			    <?php while ( have_rows('page_builder') ) : the_row(); ?>

				<?php /* About Us Section */
			    if( get_row_layout() == 'about_us_section' ): ?>
			    <section class="<?php echo get_row_layout(); if( get_sub_field('overlay_color') == 'none' ) { echo " no-background"; } ?>">

					<?php /* Add Section Background */ get_template_part('section-background'); ?>

			    	<div class="container">
			    		<div class="row">
		    				<div class="title-block-wrapper">
				    			<div class="title-block">
				    				<h5 class="title"><?php the_sub_field('title'); ?></h5>
				    			</div>
								<div class="shadow"></div>
								<div class="decor-wrapper">
				    				<div class="decor-1"></div>
				    				<div class="decor-2"></div>
				    			</div>
			    				<div class="decor-line-1"></div>
			    				<div class="decor-line-2"></div>
							</div>
						</div>

						<div class="row">
			    			<?php if( have_rows('section_content') ): ?>
			    			<div class="about-us-wrapper flex flex-wrap">
			    				<?php while( have_rows('section_content') ) : the_row(); ?>
			    					<div class="block" data-aos="fade-down" data-aos-duration="1200">
			    						<div class="icon-wrapper">
			    							<span class="icon"></span>
			    						</div>
			    						<div class="content-wrapper">
			    							<div class="upper-block">
												<h3 class="title"><?php the_sub_field('title'); ?></h3>
												<p class="text"><?php the_sub_field('contents'); ?></p>
			    							</div>
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