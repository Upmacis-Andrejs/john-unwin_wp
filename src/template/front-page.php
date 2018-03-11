<?php get_header(); ?>

	<main id="site-content">

		<!-- Above The Fold Section -->
		<section class="arrow-down <?php if( get_field('overlay_color') == 'none' ) { echo "no-background"; } ?>" id="above-the-fold-section" style="background-image: url(<?php echo get_field('bg_img')['url']; ?>);">

			<?php /* Set section overlay color */
				if( get_field('overlay_color') == 'dark' ) {
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
					<div class="container-inner">
					<div class="col-3">
						<div class="page-content-wrapper">
							<div class="page-content z-6">
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

							<div class="shadow"></div>
						</div>
					</div>

					<div class="col-4">
						<div class="background-map-wrapper">
							<div class="background-map-inner block-fit-parent flex-c-column">
								<img src="<?php echo get_template_directory_uri(); ?>/images/map-2.svg" alt="map">
							</div>
							<?php /* Add List Block if it has content */
								if ( have_rows('list_block') ):
							?>
								<div class="above-the-fold-list-wrapper">
									<?php while ( have_rows('list_block') ) : the_row(); ?>
									<h5 class="title"><?php the_sub_field('list_block_title'); ?></h5>

									<?php if( have_rows('list_block_list') ): ?>
									<ul class="list list-style-none">

										<?php while( have_rows('list_block_list') ) : the_row(); ?>
										<?php $select = get_sub_field('list_style_li'); ?>
										<li class="h6 <?php if( $select ) {
											if( $select == 'bold' ) {
												echo 'bold';
											} elseif( $select == 'bold_colored' ) {
												echo 'bold colored';
											} elseif( $select == 'light' ) {
												echo 'light';
											} elseif( $select == 'light_colored' ) {
												echo 'light colored';
											}
										} ?>"><?php the_sub_field('list_li_text'); ?></li>
										<?php endwhile; ?>

									</ul>
									<?php endif; ?>

								<?php endwhile; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<?php /* Add Selected Blocks */ get_template_part('add-blocks'); ?>

				</div>
				</div>
			</div>
		</section>
		<!-- /Above The Fold Section -->

		<!-- Sections Added With Page Builder -->
		<?php get_template_part('page-builder-block'); ?>
		<!-- /Sections Added With Page Builder -->


	</main>

<?php get_footer(); ?>