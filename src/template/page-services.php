<?php /* Template Name: Services */ ?>

<?php get_header(); ?>

	<main id="site-content">

		<!-- Above The Fold Section -->
		<section class="arrow-down <?php if( get_field('overlay_color') == 'none' ) { echo "no-background"; } ?>" id="above-the-fold-section">

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

					<div class="above-the-fold-wrapper services-wrapper flex-vert-t">
						<?php if( have_rows('above_the_fold_main') ): ?>
						<div class="page-content" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1100" data-aos-offset="0">
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

								<?php /* Add Media Block */ get_template_part('media-in-page-content'); ?>
								<?php endwhile; ?>
							</div>
						</div>
						<?php endif; ?>
					
						<?php /* Add Selected Blocks */ get_template_part('add-blocks'); ?>
						<?php /* Add Media Block */ get_template_part('media-in-extra-blocks'); ?>
					</div>
				</div>
			</div>
		</section>
		<!-- /Above The Fold Section -->

		<!-- Sections Added With Page Builder -->
		<?php get_template_part('page-builder-block'); ?>
		<!-- /Sections Added With Page Builder -->

	</main>

<?php get_footer(); ?>