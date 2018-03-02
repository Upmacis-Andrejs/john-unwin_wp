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

			<?php /* Add map to homepage background */
				if ( is_front_page() ):
			?>
				<div class="background-map">
					<img src="<?php echo get_template_directory_uri(); ?>/img/background-map.svg" alt="map">
				</div>
			<?php endif; ?>

			<div class="container">
				<div class="row">

					<div class="page-content">
						<a id="main-site-logo" href="<?php echo home_url(); ?>">
							<img src="<?php echo get_field('site_logo', 'option')['url']; ?>" alt="Site Logo">
						</a>

						<?php if( have_rows('above_the_fold_main') ): ?>
							<?php while( have_rows('above_the_fold_main') ) : the_row(); ?>
							<h1 class="title"><?php the_sub_field('title'); ?></h1>
							<p class="text"><?php the_sub_field('page_content'); ?></p>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>

					<?php /* Add List Block if it has content */
						if ( have_rows('list_block') ):
					?>
						<div class="above-the-fold-list-wrapper">
							<?php while ( have_rows('list_block') ) : the_row(); ?>
							<h6 class="title"><?php the_sub_field('list_block_title'); ?></h6>

							<?php if( have_rows('list_block_list') ): ?>
							<ul class="list">

								<?php while( have_rows('list_block_list') ) : the_row(); ?>
								<?php $checkbox = get_sub_field('list_style_li'); ?>
								<li class="<?php if( get_sub_field('list_style_li') ) {
									if( in_array('bold', $checkbox) ) {
										echo 'bold';
									} elseif( in_array('bold_colored', $checkbox) ) {
										echo 'bold-colored';
									} elseif( in_array('light', $checkbox) ) {
										echo 'light';
									} elseif( in_array('light_colored', $checkbox) ) {
										echo 'light-colored';
									}
								} ?>"><?php the_sub_field('list_li_text'); ?></li>
								<?php endwhile; ?>

							</ul>
							<?php endif; ?>

						<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<?php /* Add Selected Blocks */ get_template_part('add-blocks'); ?>

				</div>
			</div>
		</section>
		<!-- /Above The Fold Section -->

		<!-- Sections Added With Page Builder -->
		<?php get_template_part('page-builder-block'); ?>
		<!-- /Sections Added With Page Builder -->


	</main>

<?php get_footer(); ?>