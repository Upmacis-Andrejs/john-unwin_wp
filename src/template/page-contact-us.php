<?php /* Template Name: Contact Us */ ?>

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

			<div class="container">
				<div class="row">
					<div class="main-site-logo-wrapper">
						<a id="main-site-logo" href="<?php echo home_url(); ?>">
							<img src="<?php echo get_field('site_logo', 'option')['url']; ?>" alt="Site Logo">
						</a>
					</div>

					<?php if( have_rows('above_the_fold_main') ): ?>
					<div class="page-content">
						<?php while( have_rows('above_the_fold_main') ) : the_row(); ?>
						<h1 class="title"><?php the_sub_field('title'); ?></h1>
						<p class="text"><?php the_sub_field('page_content'); ?></p>

						<?php /* Add Media Block */ get_template_part('media-in-page-content'); ?>

						<?php endwhile; ?>
					</div>
					<?php endif; ?>

					<div class="contacts-wrapper">
	                    <?php if( get_field('phone', 'option') ): ?>
	                    <div class="phone-wrapper flex-vert-c">
	                        <span class="icon"></span>
	                        <h3 class="text"><?php the_field('emergency_phone_text', 'option'); ?></h3>
	                        <a class="phone" href="tel:<?php $phone = get_field('phone', 'option'); echo str_replace(' ', '', $phone); ?>"><?php echo $phone; ?></a>
	                    </div>
	                    <?php endif; ?>

	                    <?php if( get_field('email', 'option') ): ?>
	                    <div class="email-wrapper flex-vert-c">
	                        <span class="icon"></span>
	                        <a class="email" href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>
	                    </div>
	                    <?php endif; ?>
					</div>

					<div class="address-wrapper">
						<h3 class="title"><?php _e('Address', 'johnunwin'); ?></h3>
						<a class="address" href="https://www.google.com/maps/dir/?api=1&destination=
							<?php $address = get_field('address', 'option');
							$address = str_replace('<br />', '', $address);
							$address = str_replace(' ', '+', $address);
							echo $address ?>" target="_blank" rel="nofollow">
							<?php the_field('address', 'option'); ?>
						</a>
					</div>

					<?php /* Add Selected Blocks */ get_template_part('add-blocks'); ?>
					<?php /* Add Media Block */ get_template_part('media-in-extra-blocks'); ?>

				</div>
			</div>
		</section>
		<!-- /Above The Fold Section -->

		<!-- Map Section -->
		<?php if( get_field('address_google_maps', 'option') ): ?>
		<section class="google-maps-section">
			<div class="acf-map" style="height: 500px;">
			    <?php $location = get_field('address_google_maps'); ?>
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
			</div>
		</section>
		<?php endif; ?>
		<!-- /Map Section -->

	</main>

<?php get_footer(); ?>