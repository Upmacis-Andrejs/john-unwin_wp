<div class="call-us-block">
	<h3 class="title"><?php the_field('call_us_title', 'option'); ?></h3>

	<a class="phone" href="tel:<?php $phone = get_field('call_us_phone', 'option'); echo str_replace(' ', '', $phone); ?>"><?php echo $phone; ?></a>
	
	<p class="additional-text"><?php the_field('call_us_additional_text', 'option'); ?></p>
</div>