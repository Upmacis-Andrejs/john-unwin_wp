
<?php /* Set section overlay color and background image */
	if( get_sub_field('overlay_color') == 'dark' ) {
		$overlay_class = 'dark';
	} elseif ( get_field('overlay_color') == 'light' ) {
		$overlay_class = 'light';
	}
?>
<?php if( get_field('bg_img') ): ?>
 <div class="section-bg-img <?php echo $overlay_class; ?>" style="background-image: url(<?php echo get_field('bg_img')['url']; ?>);"></div>
<?php endif; ?>
<?php if( get_field('overlay_color') != 'none' ): ?>
	<div class="section-overlay <?php echo $overlay_class; ?>"></div>
<?php endif; ?>