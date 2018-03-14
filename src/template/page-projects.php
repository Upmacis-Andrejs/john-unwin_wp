<?php /* Template Name: Projects */ ?>

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
						<?php if( have_rows('above_the_fold_main') ): ?>
						<div class="page-content">
							<?php while( have_rows('above_the_fold_main') ) : the_row(); ?>
								<h1 class="title"><?php the_sub_field('title'); ?></h1>
								<p class="text"><?php the_sub_field('page_content'); ?></p>
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
							<a class="projects-block" href="#contents-<?php echo $block_no; ?>" data-rel="lightcase">
								<div class="inner">
									<div class="image" style="background-image: url(<?php echo $first_image; ?>);"></div>
									<div class="contents-wrapper">
										<h5 class="title"><?php the_sub_field('title'); ?></h5>
										<span class="hover-bg"></span>
										<span class="icon"></span>
									</div>
								</div>
								<div class="lightbox-contents" id="contents-<?php echo $block_no; ?>">
									<h4 class="title"><?php the_sub_field('title'); ?></h4>
									<p class="location"><?php the_sub_field('location'); ?></p>

									<?php
										$images = get_sub_field('image_gallery');
										if( $images ): ?>
										<div class="slider-wrapper">
										    <ul class="lightslider cS-hidden">
										        <?php foreach( $images as $image ): ?>
										            <li class="lightslider-item section-bg" style="background-image: url(<?php echo $image['url']; ?>)";></li>
										        <?php endforeach; ?>
										    </ul>
										</div>
									<?php endif; ?>
									<p class="description"><?php the_sub_field('description'); ?></p>
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

<?php get_footer(); ?>