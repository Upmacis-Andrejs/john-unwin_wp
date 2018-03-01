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