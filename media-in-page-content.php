<?php if( have_rows('media') ): ?>
<div class="media">
	<?php while( have_rows('media') ) : the_row(); ?>
		<?php if( get_sub_field('image') ): ?>
		<img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>">
		<?php endif; ?>

		<?php if( get_sub_field('video_from_external_resources') ): ?>
		<?php the_sub_field('video_from_external_resources'); ?>
		<?php endif; ?>

		<?php if( get_sub_field('video_from_local_library') ): ?>
		<video preload="metadata">
			<source src="<?php the_field('video_from_local_library'); ?>#t=0.5">
		</video>
		<?php endif; ?>
	<?php endwhile; ?>
</div>
<?php endif; ?>
