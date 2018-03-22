<?php /* Template Name: Contact Us */ ?>

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
						<div class="page-content-wrapper">
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

							<?php if( get_field('phone', 'option') || get_field('email', 'option') ): ?>
							<div class="contacts-wrapper" data-aos="fade-down" data-aos-duration="1100">
                                <?php if( get_field('phone', 'option') ): ?>
                                <a class="phone-wrapper flex-vert-c" href="tel:<?php $phone = get_field('phone', 'option'); echo str_replace(' ', '', $phone); ?>">
                                    <span class="icon icon-phone"></span>
                                    <div class="phone-contents-wrapper flex-vert-c">
	                                    <?php if( have_rows('emergency_phone_text', 'option') ): ?>
	                                    <h4 class="text flex-vert-c">
	                                        <?php while( have_rows('emergency_phone_text', 'option') ) : the_row(); ?>
	                                        <span class="bold"><?php the_sub_field('bold_text', 'option'); ?></span>
	                                        <span class="normal"><?php the_sub_field('normal_text', 'option'); ?></span>
	                                        <?php endwhile;?>
	                                    </h4>
	                                    <?php endif; ?>
	                                    <h4 class="phone bold"><?php echo $phone; ?></h4>
	                                </div>
                                </a>
                                <?php endif; ?>

                                <?php if( get_field('email', 'option') ): ?>
                                <a class="email-wrapper flex-vert-c" href="mailto:<?php the_field('email', 'option'); ?>">
                                    <span class="icon icon-mail"></span>
                                    <h4 class="email normal"><?php the_field('email', 'option'); ?></h4>
                                </a>
                                <?php endif; ?>
							</div>
							<?php endif; ?>

							<div class="address-wrapper" data-aos="fade-down" data-aos-duration="1100">
								<p class="title"><?php _e('Address', 'johnunwin'); ?></p>
								<a class="address" href="https://www.google.com/maps/dir/?api=1&destination=
									<?php $address = get_field('address', 'option');
									$address = str_replace('<br />', '', $address);
									$address = str_replace(' ', '+', $address);
									echo $address ?>" target="_blank" rel="nofollow">
									<?php the_field('address', 'option'); ?>
								</a>
							</div>
						</div>

						<?php /* Add Selected Blocks */ get_template_part('add-blocks'); ?>
						<?php /* Add Media Block */ get_template_part('media-in-extra-blocks'); ?>
					</div>
				</div>
			</div>
		</section>
		<!-- /Above The Fold Section -->

		<!-- Map Section -->
		<?php if( get_field('address_google_maps', 'option') ): ?>
		<section id="google-maps-section">
			<div id="acf-map">
			    <?php $location = get_field('address_google_maps'); ?>
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
			</div>
		</section>
		<?php endif; ?>
		<!-- /Map Section -->

	</main>

<?php get_footer(); ?>