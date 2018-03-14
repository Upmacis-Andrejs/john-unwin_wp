<?php if( have_rows('media') ): ?>
	<?php while( have_rows('media') ) : the_row(); ?>
		<?php if( get_sub_field('image') && get_sub_field('choose_media_type') == 'image' ): ?>
		<div class="media">
			<img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>">
		</div>
		<?php endif; ?>

		<?php if( get_sub_field('video_from_external_resources') && get_sub_field('choose_media_type') == 'video_external' ): ?>
		<div class="media">
			<div class="wrapper">
				<?php the_sub_field('video_from_external_resources'); ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if( get_sub_field('video_from_local_library') && get_sub_field('choose_media_type') == 'video_local' ): ?>
		<div class="media">
			<div class="media">
				<video preload="metadata" controls>
					<source src="<?php echo get_sub_field('video_from_local_library')['url']; ?>#t=0.5">
				</video>
			</div>
		</div>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>
