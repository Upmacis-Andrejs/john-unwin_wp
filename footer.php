			<!-- footer -->
			<footer class="footer z-99" id="site-footer">
				<div class="container">
					<div class="row" id="footer-row-1">
						<?php if( have_rows('footer_menu', 'option') ): ?>
						<div class="footer-menu-wrapper">
							<ul class="footer-menu">
								<?php while( have_rows('footer_menu', 'option') ) : the_row(); ?>
								<li>
									<a href="
									<?php if( get_sub_field('footer_menu_item_file', 'option') ) {
										the_sub_field('footer_menu_item_file', 'option');
									} else {
										the_sub_field('footer_menu_item_link', 'option'); } ?>"
									>
										<?php the_sub_field('footer_menu_item_text', 'option'); ?>
									</a>
								</li>
								<?php endwhile; ?>
							</ul>
						</div>
						<?php endif; ?>

						<div class="footer-contacts-wrapper">

							<?php if( get_field('phone', 'option') ): ?>
							<div class="block phone-block">
								<h4 class="title"><?php _e('Telephone', 'johnunwin'); ?></h4>
                                <a class="phone" href="tel:<?php $phone = get_field('phone', 'option'); echo str_replace(' ', '', $phone); ?>"><?php echo $phone; ?></a>
							</div>
							<?php endif; ?>

							<?php if( get_field('email', 'option') ): ?>
							<div class="block email-block">
								<h4 class="title"><?php _e('Email', 'johnunwin'); ?></h4>
                                <a class="email" href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>
							</div>
							<?php endif; ?>

							<?php if( get_field('address', 'option') ): ?>
							<div class="block address-block">
								<h4 class="title"><?php _e('Address', 'johnunwin'); ?></h4>
								<a class="address" href="https://www.google.com/maps/dir/?api=1&destination=
									<?php $address = get_field('address', 'option');
									$address = str_replace('<br />', '', $address);
									$address = str_replace(' ', '+', $address);
									echo $address ?>" target="_blank" rel="nofollow">
									<?php the_field('address', 'option'); ?>
								</a>
							</div>
							<?php endif; ?>

						</div>
					</div>
					<div class="row" id="footer-row-2">
						<div class="copyrights-wrapper">

							<div class="copyrights">
								<p class="text">&copy;<?php _e('John Unwin Electrical Contractors Ltd. All rights reserved.', 'johnunwin'); ?></p>
							</div>

							<div class="developer">
								<p class="text nbsp-after"><?php _e('Developed by:', 'johnunwin'); ?></p>
								<a class="link" href="https://sem.lv/" target="_blank">
									<img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/sem-logo.svg" style="width: 61px; height: 24px;" alt="sem.lv Logo">
								</a>
							</div>

						</div>
						<div class="socials-wrapper">

							<?php if( get_field('twitter_link', 'option') ): ?>
							<a class="link" href="<?php the_field('twitter_link', 'option'); ?>" target="_blank" rel="nofollow">
								<img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/twitter.svg" alt="Twitter Logo">
							</a>
							<?php endif; ?>

							<?php if( get_field('facebook_link', 'option') ): ?>
							<a class="link" href="<?php the_field('facebook_link', 'option'); ?>" target="_blank" rel="nofollow">
								<img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/facebook.svg" alt="Facebook Logo">
							</a>
							<?php endif; ?>

							<?php if( get_field('yell_link', 'option') ): ?>
							<a class="link" href="<?php the_field('yell_link', 'option'); ?>" target="_blank" rel="nofollow">
								<img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/yell.svg" alt="Yell Logo">
							</a>
							<?php endif; ?>
						</div>
						<div class="sintec-wrapper">
							<a class="link" href="http://google.com" target="_blank" rel="nofollow">
								<img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/sintec.svg" alt="Sintec Logo">
							</a>
						</div>
					</div>
				</div>
			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>
	</body>
</html>
