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
		    				<div class="editor-wrapper">
		    					<?php the_sub_field('section_content'); ?>
		    				</div>

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

			<?php endwhile; ?>	
		<?php endif; ?>