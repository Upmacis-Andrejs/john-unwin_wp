		<?php if( have_rows('page_builder') ):
		    while ( have_rows('page_builder') ) : the_row();

		    /* Specific Page Builder Blocks */

		    /* Services Section */
		    if( get_row_layout() == 'services_section' ): ?>
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
		    			<div class="block-wrapper-1">

							<!-- loop through page_id=51 data (Services Page) -->
							<?php $the_query_51 = new WP_Query('page_id=51');
								while ($the_query_51->have_posts()) : $the_query_51->the_post(); ?>

								<?php if( have_rows('above_the_fold_main') ): ?>
								<div class="page-content">
									<?php while( have_rows('above_the_fold_main') ) : the_row(); ?>
									<h1><?php the_sub_field('page_content'); ?></h1>

									<?php if( have_rows('above_the_fold_list') ): ?>
									<ul class="list">

										<?php while( have_rows('above_the_fold_list') ) : the_row(); ?>
										<li <?php if( get_sub_field('atf_highlight_li', 'option') == 'true' ) { echo 'class="highlight"'; } ?>><?php the_sub_field('atf_li_text'); ?></li>
										<?php endwhile; ?>

									</ul>
									<?php endif; ?>

									<h6 class="additional-text"><?php the_sub_field('atf_additional_text'); ?></h6>
									<?php endwhile; ?>
									<a class="btn btn-1" href="#"><?php _e('Get a Quote', 'johnunwin'); ?></a>
								</div>
								<?php endif; ?>

								<?php if( have_rows('page_builder') ): ?>
									<div class="right-block">
								    <?php while ( have_rows('page_builder') ) : the_row(); ?>

									<?php /* Default Content Section */
								    if( get_row_layout() == 'default_content_section' ): ?>
								    <div class="default-content-section-block">
								    	<h4 class="title"><?php the_sub_field('title'); ?></h4>
										<?php while( have_rows('section_content') ) : the_row(); ?>
											<p class="text"><?php the_sub_field('contents'); ?></p>
										<?php endwhile; ?>
									</div>
									<?php endif; ?>

									<?php endwhile; ?>
									</div>
								<?php endif; ?>

							<?php endwhile; wp_reset_postdata(); ?>
							<!-- /loop through page_id=51 data (Services Page) -->

		    			</div>
		    		</div>
		    	</div>
		    </section>
			<?php endif; ?>

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

			<?php /* Default Content Section */
		    if( get_row_layout() == 'default_content_section' ): ?>
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

		    			<div class="block-wrapper-3">
							<?php if( have_rows('section_content') ): ?>
							<div class="section-content">
								<?php while( have_rows('section_content') ) : the_row(); ?>
								<h3 class="title"><?php the_sub_field('title'); ?></h1>
								<p class="text"><?php the_sub_field('contents'); ?></p>

								<?php /* Add Media Block */ get_template_part('media-in-page-content'); ?>

								<?php endwhile; ?>
							</div>
							<?php endif; ?>

							<?php if( have_rows('right_block') ): ?>
							<div class="right-block">
							    <?php while ( have_rows('right_block') ) : the_row(); ?>

							    <?php /* Block With List */
							    	if( get_row_layout() == 'block_with_list' ): ?>
							    	<div class="block block-with-list">
							    		<h3 class="title"><?php the_sub_field('title'); ?></h3>
							    		<?php if( have_rows('list') ): ?>
							    		<ul class="list">
							    			<?php while( have_rows('list') ) : the_row(); ?>
											<li <?php if( get_sub_field('highlight_li') == 'true' ) { echo 'class="highlight"'; } ?>><?php the_sub_field('list_li_text'); ?></li>
							    			<?php endwhile; ?>
							    		</ul>
							    		<?php endif; ?>
							    	</div>
							    <?php endif; ?>

							    <?php /* Block With Text */
							    	if( get_row_layout() == 'block_with_text' ): ?>
							    	<div class="block block-with-text">
							    		<h3 class="title"><?php the_sub_field('title'); ?></h3>
							    		<p class="text"><?php the_sub_field('contents'); ?></p>
							    	</div>
							    <?php endif; ?>

							    <?php endwhile; ?>
		    				</div>
		    				<?php endif; ?>
		    			</div>

		    		</div>
		    	</div>
		    </section>
			<?php endif; ?>

			<?php /* Team Section */
		    if( get_row_layout() == 'team_section' ): ?>
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
		    			<div class="section-content">
							<?php while( have_rows('section_content') ) : the_row(); ?>
							<h2 class="title"><?php the_sub_field('title'); ?></h2>

							<?php if( have_rows('team_member_blocks') ): ?>
							<div class="block-wrapper-4">
								<?php while( have_rows('team_member_blocks') ) : the_row(); ?>
								<div class="team-block">
									<div class="img-wrapper">
										<img src="<?php the_sub_field('image')['url']; ?>" alt="<?php the_sub_field('image')['alt']; ?>">
									</div>
									<h3 class="name"><?php the_sub_field('name'); ?></h3>
									<p class="position"><?php the_sub_field('position'); ?></p>
									<p class="phone-wrapper">
										<span class="label"><?php _e('Phone', 'johnunwin'); ?></span>
										<a class="phone" href="tel:<?php $phone = get_sub_field('phone'); echo str_replace(' ', '', $phone); ?>"><?php echo $phone; ?></a>
									</p>
									<p class="email-wrapper">
										<span class="label"><?php _e('E-mail', 'johnunwin'); ?></span>
										<a class="email" href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a>
									</p>
								</div>
								<?php endwhile; ?>
							</div>
							<?php endif; ?>

							<?php endwhile; ?>
						</div>
						<?php endif; ?>
		    		</div>
		    	</div>
		    </section>
			<?php endif; ?>

			<?php /* History Section */
		    if( get_row_layout() == 'history_section' ): ?>
		    <section class="<?php echo get_row_layout(); ?>">
		    	<div class="container">
		    		<div class="row">
		    			<div class="title-block">
		    				<h4 class="title"><?php the_sub_field('title'); ?></h4>
		    			</div>

						<?php if( have_rows('section_content') ): ?>
		    			<div class="section-content">
							<?php while( have_rows('section_content') ) : the_row(); ?>
							<h2 class="title"><?php the_sub_field('title'); ?></h2>

							<?php if( have_rows('history_blocks') ): ?>
							<div class="block-wrapper-6">
								<?php while( have_rows('history_blocks') ) : the_row(); ?>
								<div class="history-block">

									<?php if( get_row_layout() == 'event' ): ?>
									<h3 class="date">
										<span class="month"><?php the_sub_field('month'); ?></span>
										<span class="year"><?php the_sub_field('year'); ?></span>
									</h3>
									<p class="text"><?php the_sub_field('contents'); ?></p>
									<?php endif; ?>

									<?php if( get_row_layout() == 'year_block' ): ?>
									<h3 class="year"><?php the_sub_field('year'); ?></h3>
									<?php endif; ?>

								</div>
								<?php endwhile; ?>
							</div>
							<?php endif; ?>

							<?php endwhile; ?>
						</div>
						<?php endif; ?>
		    		</div>
		    	</div>
		    </section>
			<?php endif; ?>

			<?php endwhile; ?>	
		<?php endif; ?>