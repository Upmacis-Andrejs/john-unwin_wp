		<?php if( have_rows('page_builder') ):
		    while ( have_rows('page_builder') ) : the_row();

		    /* Specific Page Builder Blocks */

		    /* Services Section */
		    if( get_row_layout() == 'services_section' ): ?>
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
	    				<div class="services-wrapper flex-vert-c">

						<!-- loop through page_id=51 data (Services Page) -->
						<?php $the_query_51 = new WP_Query('page_id=51');
							while ($the_query_51->have_posts()) : $the_query_51->the_post(); ?>

						<?php if( have_rows('above_the_fold_main') ): ?>
						<div class="page-content" data-aos="fade-down" data-aos-duration="1100">
    						<div class="icon-wrapper">
    							<span class="icon"></span>
    						</div>
    						<div class="content-wrapper">
								<?php while( have_rows('above_the_fold_main') ) : the_row(); ?>
								<?php if( get_sub_field('page_content') ): ?>
									<h4 class="title"><?php the_sub_field('page_content'); ?></h4>
								<?php endif; ?>

								<?php if( have_rows('above_the_fold_list') ): ?>
								<ul class="list list-style-none">

									<?php while( have_rows('above_the_fold_list') ) : the_row(); ?>
									<li <?php if( get_sub_field('atf_highlight_li', 'option') == 'true' ) { echo 'class="highlight"'; } ?>><?php the_sub_field('atf_li_text'); ?></li>
									<?php endwhile; ?>

								</ul>
								<?php endif; ?>

								<?php if( get_sub_field('atf_additional_text') ): ?>
									<h5 class="additional-text"><?php the_sub_field('atf_additional_text'); ?></h5>
								<?php endif; ?>
								<?php endwhile; ?>
								<a class="btn btn-1 get-a-quote-form" href="#"><?php _e('Get a Quote', 'johnunwin'); ?></a>
							</div>
						</div>
						<?php endif; ?>

						<?php if( have_rows('page_builder') ): $services_count = -1; ?>
							<div class="right-block">
						    <?php while ( have_rows('page_builder') ) : the_row(); $services_count++ ?>

							<?php /* Default Content Section */
						    if( get_row_layout() == 'default_content_section' ): ?>
						    <div class="default-content-section-block" data-aos="fade-left" data-aos-delay="<?php echo (100 + $services_count * 150) ?>" data-aos-duration="600" data-aos-offset="10">
						    	<div class="title-wrapper" href="#">
							    	<h4 class="title"><span class="decor-plus"></span><?php the_sub_field('title'); ?></h4>
							    	<div class="decor"></div>
							    </div>
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

			<?php /* Default Content Section */
		    if( get_row_layout() == 'default_content_section' ): ?>
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

		    			<div class="default-content-wrapper flex-vert-t" data-aos="fade-down" data-aos-duration="1100">
							<?php if( have_rows('section_content') ): ?>
							<div class="section-content">
								<?php while( have_rows('section_content') ) : the_row(); ?>
									<?php if( get_sub_field('title') ): ?>
										<h3 class="title"><?php the_sub_field('title'); ?></h3>
									<?php endif; ?>
									<?php if( get_sub_field('contents') ): ?>
										<p class="text"><?php the_sub_field('contents'); ?></p>
									<?php endif; ?>
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
							    		<h4 class="title"><?php the_sub_field('title'); ?></h4>
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
							    		<h4 class="title"><?php the_sub_field('title'); ?></h4>
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

						<?php if( have_rows('section_content') ): ?>
		    			<div class="section-content">
							<?php while( have_rows('section_content') ) : the_row(); ?>
							<div class="title-wrapper">
								<div class="icon"></div>
								<h3 class="title"><?php the_sub_field('title'); ?></h3>
							</div>

							<?php if( have_rows('team_member_blocks') ): ?>
							<div class="team-wrapper flex-hor-c">
								<?php while( have_rows('team_member_blocks') ) : the_row(); ?>
								<div class="team-block" data-aos="fade-down" data-aos-duration="1100">
									<?php if( get_sub_field('image') ): ?>
									<div class="img-wrapper">
										<img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>">
									</div>
									<?php endif; ?>
									<h5 class="name"><?php the_sub_field('name'); ?></h5>
									<p class="position"><?php the_sub_field('position'); ?></p>
									<?php if( get_sub_field('phone') || get_sub_field('email') ): ?>
									<div class="contact-info-wrapper">
										<?php if( get_sub_field('phone') ): ?>
										<p class="phone-wrapper">
											<span class="label"><?php _e('Phone:', 'johnunwin'); ?></span>
											<a class="phone" href="tel:<?php $phone = get_sub_field('phone'); echo str_replace(' ', '', $phone); ?>"><?php echo $phone; ?></a>
										</p>
										<?php endif; ?>
										<?php if( get_sub_field('email') ): ?>
										<p class="email-wrapper">
											<span class="label"><?php _e('E-mail:', 'johnunwin'); ?></span>
											<a class="email" href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a>
										</p>
										<?php endif; ?>
									</div>
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

			<?php /* History Section */
		    if( get_row_layout() == 'history_section' ): ?>
		    <section class="<?php echo get_row_layout(); ?>">
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

						<?php if( have_rows('section_content') ): ?>
		    			<div class="section-content" data-aos="fade-down" data-aos-duration="1100">
							<?php while( have_rows('section_content') ) : the_row(); ?>
							<div class="title-wrapper">
								<div class="icon"></div>
								<h3 class="title"><?php the_sub_field('title'); ?></h3>
							</div>

							<?php if( have_rows('history_blocks') ): ?>
							<div class="history-wrapper" >
								<div class="decor-line"></div>
								<div class="history-inner" id="history-inner">
									<div class="history-inner-wrapper" id="history-inner-wrapper">
										<?php while( have_rows('history_blocks') ) : the_row(); ?>

											<?php if( get_row_layout() == 'event' ): ?>
											<div class="history-block">
												<h5 class="date">
													<span class="month"><?php the_sub_field('month'); ?></span>
													<span class="year"><?php the_sub_field('year'); ?></span>
												</h5>
												<p class="text"><?php the_sub_field('contents'); ?></p>
												<div class="decor-vert-line"></div>
											</div>
											<?php endif; ?>
											
											<?php if( get_row_layout() == 'year_block' ): ?>
											<div class="main-year-block">
												<h3 class="main-year"><?php the_sub_field('year'); ?></h3>
											</div>
											<?php endif; ?>

										<?php endwhile; ?>
									</div>
						            <div class="gradient gradient-right"></div>
						            <div class="gradient gradient-left"></div>
								</div>
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