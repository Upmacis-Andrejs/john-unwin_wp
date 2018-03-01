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

					<?php /* Add List Block if it has content */
						if ( have_rows('list_block') ):
					?>
						<div class="above-the-fold-list-wrapper">
							<?php while ( have_rows('list_block') ) : the_row(); ?>
							<h6 class="title"><?php the_sub_field('list_block_title'); ?></h6>

							<?php if( have_rows('list_block_list') ): ?>
							<ul class="list">

								<?php while( have_rows('list_block_list') ) : the_row(); ?>
								<li <?php if( get_sub_field('list_highlight_li', 'option') == 'true' ) { echo 'class="highlight"'; } ?>><?php the_sub_field('list_li_text'); ?></li>
								<?php endwhile; ?>
								
							</ul>
							<?php endif; ?>

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
		<?php if( have_rows('page_builder') ):
		    while ( have_rows('page_builder') ) : the_row();

		    /* Specific Page Builder Blocks */

		    /* Services Section */
		    if( get_row_layout() == 'services_section' ): ?>
		    <section class"<?php echo get_row_layout(); if( get_sub_field('overlay_color') == 'none' ) { echo "no-background"; } ?>" style="background-image: url(<?php echo get_sub_field('bg-img')['url']; ?>);">

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
		    			<div class="block-wrapper-1">
		    			</div>
		    		</div>
		    	</div>
		    </section>
			<?php endif; ?>

			<?php /* About Us Section */
		    if( get_row_layout() == 'about_us_section' ): ?>
		    <section class"<?php echo get_row_layout(); if( get_sub_field('overlay_color') == 'none' ) { echo "no-background"; } ?>" style="background-image: url(<?php echo get_sub_field('bg-img')['url']; ?>);">

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

		    			<?php if( have_rows('content_block') ): ?>
		    			<div class="block-wrapper-2">
		    				<?php while( have_rows('content_block') ) : the_row(); ?>

		    					<div class="about-us-block">
		    						<div class="icon-wrapper">
		    							<span class="icon"></span>
		    						</div>
		    						<div class="block-content-wrapper">
		    							<div class="editor-wrapper">
		    								<?php the_sub_field('contents'); ?>
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
	<!-- /Sections Added With Page Builder -->

	</main>

<?php get_footer(); ?>