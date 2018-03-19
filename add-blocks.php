<?php if( have_rows('add_blocks') ): ?>
	<div class="add-blocks-wrapper" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1100">
    <?php while ( have_rows('add_blocks') ) : the_row(); ?>

	<?php /* Get a Quote Block */ if ( get_sub_field('quote_block') == 'true' ): ?>
	<div class="block quote-block">
		<h4 class="title"><?php the_field('quote_title', 'option'); ?></h4>

		<?php if( have_rows('quote_list', 'option') ): ?>
		<ul class="list list-style-none">
			<?php while( have_rows('quote_list', 'option') ) : the_row(); ?>
			<li <?php if( get_sub_field('quote_highlight_li', 'option') == 'true' ) { echo 'class="highlight"'; } ?>><?php the_sub_field('quote_li_text', 'option'); ?></li>
			<?php endwhile; ?>
		</ul>
		<?php endif; ?>

		<a class="btn btn-1 get-a-quote-form" href="#"><?php _e('Get a Quote', 'johnunwin'); ?></a>
	</div>
	<?php endif; ?>

	<?php /* Call Us Block */ if ( get_sub_field('call_us_block') == 'true' ): ?>
	<div class="block call-us-block">
		<h4 class="title"><?php the_field('call_us_title', 'option'); ?></h4>
        <a class="phone-wrapper flex-vert-c text-decor-none" href="tel:<?php $phone = get_field('phone', 'option'); echo str_replace(' ', '', $phone); ?>">
            <span class="icon icon-phone"></span>
            <h4 class="phone"><?php echo $phone; ?></h4>
        </a>
		<p class="additional-text"><?php the_field('call_us_additional_text', 'option'); ?></p>
	</div>
	<?php endif; ?>

	<?php /* Contact Form Block */ if ( get_sub_field('contact_form_block') == 'true' ): ?>
	<div class="block contact-form-block">
		<?php
			$contact_form_shortcode = get_field('contact_form_shortcode', 'option');
			echo do_shortcode($contact_form_shortcode, true);
		?>
	</div>
	<?php endif; ?>


	<?php /* Media Block */ if( have_rows('media_block') ): ?>
		<?php while( have_rows('media_block') ) : the_row(); ?>
			<?php if( get_sub_field('image') && get_sub_field('choose_media_type') == 'image' ): ?>
			<div class="block media-block">
				<img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>">
			</div>
			<?php endif; ?>

			<?php if( get_sub_field('video_from_external_resources') && get_sub_field('choose_media_type') == 'video_external' ): ?>
			<div class="block media-block">
				<div class="wrapper">
					<?php the_sub_field('video_from_external_resources'); ?>
				</div>
			</div>
			<?php endif; ?>

			<?php if( get_sub_field('video_from_local_library') && get_sub_field('choose_media_type') == 'video_local' ): ?>
			<div class="block media-block">
				<div class="wrapper">
					<video preload="metadata" controls>
						<source src="<?php echo get_sub_field('video_from_local_library')['url']; ?>#t=0.5">
					</video>
				</div>
			</div>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>


	<?php endwhile; ?>
	</div>
<?php endif; ?>
