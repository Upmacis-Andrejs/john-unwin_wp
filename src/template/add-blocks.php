<?php if( have_rows('add_blocks') ):
    while ( have_rows('add_blocks') ) : the_row(); ?>

	<?php if ( get_sub_field('quote_block') == 'true' ): ?>
	<div class="quote-block">
		<h3 class="title"><?php the_field('quote_title', 'option'); ?></h3>

		<?php if( have_rows('quote_list', 'option') ): ?>
		<ul class="list">
			<?php while( have_rows('quote_list', 'option') ) : the_row(); ?>
			<li <?php if( get_sub_field('quote_highlight_li', 'option') == 'true' ) { echo 'class="highlight"'; } ?>><?php the_sub_field('quote_li_text', 'option'); ?></li>
			<?php endwhile; ?>
		</ul>
		<?php endif; ?>

		<a class="btn btn-1" href="http://google.com"><?php _e('Get a Quote', 'johnunwin'); ?></a>
	</div>
	<?php endif; ?>

	<?php if ( get_sub_field('call_us_block') == 'true' ): ?>
	<div class="call-us-block">
		<h3 class="title"><?php the_field('call_us_title', 'option'); ?></h3>

		<a class="phone" href="tel:<?php $phone = get_field('phone', 'option'); echo str_replace(' ', '', $phone); ?>"><?php echo $phone; ?></a>
		
		<p class="additional-text"><?php the_field('call_us_additional_text', 'option'); ?></p>
	</div>
	<?php endif; ?>

	<?php if ( get_sub_field('contact_form_block') == 'true' ): ?>
	<div class="contact-form-block">
		<?php
			$contact_form_shortcode = get_field('contact_form_shortcode', 'option');
			echo do_shortcode($contact_form_shortcode, true);
		?>
	</div>
	<?php endif; ?>

	<?php endwhile; ?>
<?php endif; ?>
