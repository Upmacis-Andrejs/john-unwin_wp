<?php get_header(); ?>

	<main id="site-content">

		<!-- Above The Fold Section -->
		<section class="arrow-down <?php if( get_field('overlay_color') == 'none' ) { echo "no-background"; } ?>" id="above-the-fold-section">

			<?php /* Add Section Background */ get_template_part('section-background'); ?>

			<div class="container">
				<div class="row">
					<div class="above-the-fold-wrapper flex-vert-t">
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