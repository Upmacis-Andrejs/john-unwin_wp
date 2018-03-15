<?php /* Template Name: Careers */ ?>

<?php get_header(); ?>

	<main id="site-content">

		<!-- Above The Fold Section -->
		<section <?php if( get_field('overlay_color') == 'none' ) { echo 'class="no-background"'; } ?> id="above-the-fold-section">

			<?php /* Add Section Background */ get_template_part('section-background'); ?>

			<div class="container">
				<div class="row">
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

						<div class="left-block">
						<?php if( have_rows('above_the_fold_main') ): ?>
						<div class="page-content">
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

						<?php if( have_rows('careers') ): ?>
							<div class="careers-wrapper">
							<?php while( have_rows('careers') ) : the_row(); ?>
								<div class="careers-block">
									<a class="title-wrapper" href="#">
										<h4 class="title"><?php the_sub_field('title'); ?></h4>
									</a>

									<?php if( have_rows('contents') ): ?>
										<div class="content-wrapper">
										<?php while( have_rows('contents') ) : the_row(); ?>

										    <?php /* Block With Text */
										    	if( get_row_layout() == 'block_with_text' ): ?>
										    	<div class="block block-with-text">
										    		<p class="title"><?php the_sub_field('title'); ?></p>
										    		<p class="text"><?php the_sub_field('contents'); ?></p>
										    	</div>
										    <?php endif; ?>

										    <?php /* Block With List */
										    	if( get_row_layout() == 'block_with_list' ): ?>
										    	<div class="block block-with-list">
										    		<p class="title"><?php the_sub_field('title'); ?></p>
										    		<?php if( have_rows('list') ): ?>
										    		<ul class="list">
										    			<?php while( have_rows('list') ) : the_row(); ?>
														<li <?php if( get_sub_field('highlight_li') == 'true' ) { echo 'class="highlight"'; } ?>><?php the_sub_field('list_li_text'); ?></li>
										    			<?php endwhile; ?>
										    		</ul>
										    		<?php endif; ?>
										    	</div>
										    <?php endif; ?>

										<?php endwhile; ?>
											<div class="footnote-wrapper">
												<p class="text"><?php _e('Please apply with your CV via email', 'johnunwin'); ?></p>
				                                <a class="email" href="mailto:<?php the_field('human_resources_email', 'option'); ?>"><?php the_field('human_resources_email', 'option'); ?></a>
											</div>
										</div>
									<?php endif; ?>

								</div>
							<?php endwhile; ?>
							</div>
						<?php endif; ?>
						</div>

						<?php /* Add Selected Blocks */ get_template_part('add-blocks'); ?>
						<?php /* Add Media Block */ get_template_part('media-in-extra-blocks'); ?>
					</div>
				</div>
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
			    					<div class="block">
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