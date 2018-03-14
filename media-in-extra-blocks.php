<?php if( have_rows('media_block') ): ?>
<div class="media-block">
	<?php while( have_rows('media_block') ) : the_row(); ?>
		<?php if( get_sub_field('image') && get_sub_field('choose_media_type') == 'image' ): ?>
		<img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>">
		<?php endif; ?>

		<?php if( get_sub_field('video_from_external_resources') && get_sub_field('choose_media_type') == 'video_external' ): ?>
		<?php the_sub_field('video_from_external_resources'); ?>
		<?php endif; ?>

		<?php if( get_sub_field('video_from_local_library') && get_sub_field('choose_media_type') == 'video_local' ): ?>
		<video preload="metadata">
			<source src="<?php the_field('video_from_local_library'); ?>#t=0.5">
		</video>
		<?php endif; ?>
	<?php endwhile; ?>
</div>
<?php endif; ?>