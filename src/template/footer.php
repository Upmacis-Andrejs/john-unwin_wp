			<!-- footer -->
			<?php if( have_rows('footer_style', 'option') ):
				while( have_rows('footer_style', 'option') ) : the_row();
					$footer_overlay_color = get_sub_field('overlay_color', 'option');
					$footer_bg_img = get_sub_field('bg_img', 'option');
			?>
			<footer class="footer z-99" id="site-footer"  style="background-image: url(<?php echo $footer_bg_img['url']; ?>);">
			
				<?php /* Set section overlay color */
					if( get_sub_field('overlay_color', 'option') == 'dark' ) {
						$overlay_class = 'dark';
					} elseif ( get_sub_field('overlay_color', 'option') == 'light' ) {
						$overlay_class = 'light';
					}
				?>
				<div class="section-overlay <?php echo $overlay_class; ?>"></div>
			<?php endwhile;
				endif; ?>

				<div class="container">
					<div class="row" id="footer-row-1">
						<div class="footer-row-wrapper flex">
							<?php if( have_rows('footer_menu', 'option') ): ?>
								<div class="footer-menu-wrapper">
									<ul class="footer-menu flex-vert-c flex-wrap">
										<?php while( have_rows('footer_menu', 'option') ) : the_row(); ?>
										<li>
											<a class="h6" href="<?php if( get_sub_field('footer_menu_item_file', 'option') ) {
												the_sub_field('footer_menu_item_file', 'option');
											} else {
												the_sub_field('footer_menu_item_link', 'option'); } ?>">
												<?php the_sub_field('footer_menu_item_text', 'option'); ?>
											</a>
										</li>
										<?php endwhile; ?>
									</ul>
								</div>
							<?php endif; ?>

							<div class="footer-contacts-wrapper flex">
								<?php if( get_field('phone', 'option') ): ?>
								<div class="block phone-block">
									<p class="title"><?php _e('Telephone', 'johnunwin'); ?></p>
	                                <a class="phone" href="tel:<?php $phone = get_field('phone', 'option'); echo str_replace(' ', '', $phone); ?>"><?php echo $phone; ?></a>
								</div>
								<?php endif; ?>

								<?php if( get_field('email', 'option') ): ?>
								<div class="block email-block">
									<p class="title"><?php _e('Email', 'johnunwin'); ?></p>
	                                <a class="email" href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>
								</div>
								<?php endif; ?>

								<?php if( get_field('address', 'option') ): ?>
								<div class="block address-block">
									<p class="title"><?php _e('Address', 'johnunwin'); ?></p>
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

							<div class="right-wrapper flex-vert-c">
								<div class="socials-wrapper">
									<?php if( get_field('twitter_link', 'option') ): ?>
									<a class="link" href="<?php the_field('twitter_link', 'option'); ?>" target="_blank" rel="nofollow">
										<img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/twitter.svg" alt="Twitter Logo">
									</a>
									<?php endif; ?>

									<?php if( get_field('facebook_link', 'option') ): ?>
									<a class="link" href="<?php the_field('facebook_link', 'option'); ?>" target="_blank" rel="nofollow">
										<img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/facebook.svg" alt="Facebook Logo">
									</a>
									<?php endif; ?>

									<?php if( get_field('yell_link', 'option') ): ?>
									<a class="link" href="<?php the_field('yell_link', 'option'); ?>" target="_blank" rel="nofollow">
										<img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/yell.svg" alt="Yell Logo">
									</a>
									<?php endif; ?>
								</div>
								<div class="sintec-wrapper">
									<a class="link" href="http://google.com" target="_blank" rel="nofollow">
										<img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/sintec.svg" style="width: 107px; height: 20px;" alt="Sintec Logo">
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row" id="footer-row-2">
						<div class="footer-row-wrapper flex-vert-c">
							<div class="left-wrapper flex">
								<div class="copyrights flex-vert-c">
									<h6 class="text">&copy;&nbsp;<?php _e('John Unwin Electrical Contractors Ltd. All rights reserved.', 'johnunwin'); ?></h6>
								</div>

								<div class="developer flex-vert-c">
									<h6 class="text nbsp-after"><?php _e('Developed by:', 'johnunwin'); ?></h6>
									<a class="link" href="https://sem.lv/" target="_blank">
										<img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/sem.svg" style="width: 61px; height: 24px;" alt="sem.lv Logo">
									</a>
								</div>
							</div>

							<div class="right-wrapper flex-vert-c">
								<div class="socials-wrapper">
									<?php if( get_field('twitter_link', 'option') ): ?>
									<a class="link" href="<?php the_field('twitter_link', 'option'); ?>" target="_blank" rel="nofollow">
										<img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/twitter.svg" alt="Twitter Logo">
									</a>
									<?php endif; ?>

									<?php if( get_field('facebook_link', 'option') ): ?>
									<a class="link" href="<?php the_field('facebook_link', 'option'); ?>" target="_blank" rel="nofollow">
										<img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/facebook.svg" alt="Facebook Logo">
									</a>
									<?php endif; ?>

									<?php if( get_field('yell_link', 'option') ): ?>
									<a class="link" href="<?php the_field('yell_link', 'option'); ?>" target="_blank" rel="nofollow">
										<img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/yell.svg" alt="Yell Logo">
									</a>
									<?php endif; ?>
								</div>
								<div class="sintec-wrapper">
									<a class="link" href="http://google.com" target="_blank" rel="nofollow">
										<img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/sintec.svg" style="width: 107px; height: 20px;" alt="Sintec Logo">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- /footer -->

			<?php /* Get a Quote Form */
				if( get_field('get_a_quote_form_shortcode', 'option') ): ?>

				<div class="get-a-quote-form-block popup-wrapper hidden">
					<div class="popup-table">
						<div class="popup-cell">
							<div class="get-a-quote-form-inner">
								<a id="close-quote-form" href="#"></a>
								<?php
									$get_a_quote_form_shortcode = get_field('get_a_quote_form_shortcode', 'option');
									echo do_shortcode($get_a_quote_form_shortcode, true);
								?>
								<div class="success-message hidden">
									<h4 class="title"><?php the_field('success_message_title', 'option'); ?></h4>
									<?php if( get_field('success_message_content', 'option') ): ?>
										<p class="text"><?php the_field('success_message_content', 'option'); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>

			<?php endif; ?>

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>
		<script>
			  // Google Maps API script
			/* -------------------------------------------------------------------------------------- */
			  /*
			  *  new_map
			  *
			  *  This function will render a Google Map onto the selected jQuery element
			  *
			  *  @type  function
			  *  @date  8/11/2013
			  *  @since 4.3.0
			  *
			  *  @param $el (jQuery element)
			  *  @return  n/a
			  */

			  function new_map( $el ) {
			    
			    // var
			    var $markers = $el.find('.marker');
			    
			    
			    // vars
			    var args = {
			      zoom    : 16,
			      center    : new google.maps.LatLng(0, 0),
			      mapTypeId : google.maps.MapTypeId.ROADMAP,
			      disableDefaultUI: true,
			      zoomControl: true,
			      // gestureHandling: 'greedy',
			      // gestureHandling: 'none',
			    };
			                
			    // create map
			    var map = new google.maps.Map( $el[0], args);
			    
			    
			    // add a markers reference
			    map.markers = [];
			    
			    
			    // add markers
			    $markers.each(function(){
			      
			        add_marker( $(this), map );
			      
			    });
			    
			    
			    // center map
			    center_map( map );
			    
			    
			    // return
			    return map;
			    
			  }

			  /*
			  *  center_map
			  *
			  *  This function will center the map, showing all markers attached to this map
			  *
			  *  @type  function
			  *  @date  8/11/2013
			  *  @since 4.3.0
			  *
			  *  @param map (Google Map object)
			  *  @return  n/a
			  */

			  function center_map( map ) {
			    // vars
			    var bounds = new google.maps.LatLngBounds();

			    // loop through all markers and create bounds
			    $.each( map.markers, function( i, marker ){

			      var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

			      bounds.extend( latlng );

			    });

			      // only 1 marker?
			      if( map.markers.length == 1 ) {
			        // set center of map
			          map.setCenter( bounds.getCenter() );
			          map.setZoom( 16 );
			      } else {
			        // fit to bounds
			        map.fitBounds( bounds );

			          google.maps.event.removeListener(listener); 
			      }

			  }

			  /*
			  *  add_marker
			  *
			  *  This function will add a marker to the selected Google Map
			  *
			  *  @type  function
			  *  @date  8/11/2013
			  *  @since 4.3.0
			  *
			  *  @param $marker (jQuery element)
			  *  @param map (Google Map object)
			  *  @return  n/a
			  */

			  function add_marker( $marker, map ) {

			    // var
			    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

			    // create marker
			    var marker = new google.maps.Marker({
			      position  : latlng,
			      map     : map,
			    });

			    // add to array
			    map.markers.push( marker );

			    // if marker contains HTML, add it to an infoWindow
			    if( $marker.html() )
			    {
			      // create info window
			      var infowindow = new google.maps.InfoWindow({
			        content   : $marker.html()
			      });

			      // show info window when marker is clicked
			      google.maps.event.addListener(marker, 'click', function() {

			        //infowindow.open( map, marker );
			        window.location.href = this.url;

			      });
			    }

			  }

			  /*
			  *  document ready
			  *
			  *  This function will render each map when the document is ready (page has loaded)
			  *
			  *  @type  function
			  *  @date  8/11/2013
			  *  @since 5.0.0
			  *
			  *  @param n/a
			  *  @return  n/a
			  */
			  // global var
			  var map = null;

			  function initMap() {
			    // create map
			      map = new_map( $('#acf-map') );
			  }

			/* -------------------------------------------------------------------------------------- */
			  // /Google Maps API script			  
		</script>
		<?php $google_maps_api_key = get_field('google_maps_api_key', 'option'); ?>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo $google_maps_api_key; ?>&callback=initMap"></script>
	</body>
</html>