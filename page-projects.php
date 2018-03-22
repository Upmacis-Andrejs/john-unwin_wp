<?php /* Template Name: Projects */ ?>

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

				<div class="row">
					<?php if( have_rows('projects') ): ?>
						<div class="projects-wrapper flex-hor-c">
						<?php
							$block_no = 0;
							while( have_rows('projects') ) : the_row(); $block_no++; ?>
							<?php /* Get first image in gallery */
								$gallery = get_sub_field('image_gallery');
								$first_image = $gallery[0]['url'];
							?>
							<a class="projects-block" href="#project-<?php echo $block_no; ?>" data-aos="fade-down" data-aos-duration="1100">
								<div class="inner">
									<div class="image" style="background-image: url(<?php echo $first_image; ?>);"></div>
									<div class="contents-wrapper">
										<h5 class="title"><?php the_sub_field('title'); ?></h5>
										<span class="hover-bg"></span>
										<span class="icon"></span>
									</div>
								</div>
							</a>
						<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<!-- /Above The Fold Section -->

	</main>

<!-- Projects Popup Contents -->
<?php if( have_rows('projects') ): ?>
	<div id="projects-popup-wrapper" class="popup-wrapper">
		<a id="close-projects" class="icon icon-close text-decor-none" href="#"></a>
		<div id="projects-popup-table" class="popup-table">
			<div id="projects-popup-cell" class="popup-cell">
				<?php
					$block_no = 0;
					while( have_rows('projects') ) : the_row(); $block_no++; ?>
					<div class="projects-popup" id="project-<?php echo $block_no; ?>">
						<a class="arrow arrow-right" href="#"></a>
						<a class="arrow arrow-left" href="#"></a>
						<h4 class="title"><?php the_sub_field('title'); ?></h4>
						<p class="location"><?php the_sub_field('location'); ?></p>

						<?php
							$images = get_sub_field('image_gallery');
							if( $images ): ?>
							<div class="slider-wrapper">
							    <ul class="lightslider cS-hidden" id="lightslider-<?php echo $block_no; ?>">
							        <?php foreach( $images as $image ): ?>
							            <li class="lightslider-item section-bg" style="background-image: url(<?php echo $image['url']; ?>)";></li>
							        <?php endforeach; ?>
							    </ul>
							</div>
						<?php endif; ?>
						<?php if( get_sub_field('description') ): ?>
							<p class="description"><?php the_sub_field('description'); ?></p>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
<?php endif; ?>
<!-- /Projects Popup Contents -->

<?php get_footer(); ?>