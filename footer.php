		<footer class="c-footer">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-11 px-md-4">
						<h3 class="h-color-white h-border-bottom h-border-blue pb-3">Solutions</h3>
						<?php
							$args = array(
								'post_type' => 'page',
								'posts_per_page' => -1,
								'order' => 'ASC',
								'meta_query' => array(
									array(
										'key' => '_wp_page_template',
										'value' => 'page-templates/template-solutions.php'
									)
								)
							);
							$the_pages = new WP_Query( $args );

							if( $the_pages->have_posts() ){
								echo '<ul class="c-footer-solutions">';
									while( $the_pages->have_posts() ){
										$the_pages->the_post();
										$icon = get_field('icon');
										$color = get_field('color');
										?>
										<li class="h-color-white">
											<a class="h-color-white" href="<?php echo get_the_permalink(); ?>">
												<div class="c-footer-solutions__icon">
													<?php echo file_get_contents($icon['url']); ?>
												</div>
												<?php echo get_the_title(); ?>
											</a>
										</li>
										<?php
									}
								echo '</ul>';
							}
							wp_reset_postdata();
						?>
						<?php
							wp_nav_menu([
								'menu'              => 'Footer Menu',
								'theme_location'    => 'Footer Menu',
								'container_class' 	=> 'c-footer-menu',
								'depth' 			=> 1,
								'walker' 			=> new SixthStory_Walker()
							]);
						?>

						<div class="d-flex justify-content-between align-items-end h-border-bottom h-border-blue mb-3">
							<h3 class="h-color-white mb-3">Offices</h3>
							
							<ul class="c-socials c-socials--footer mb-3">
								<?php
									$socials = get_field('socials', 'options');

									foreach($socials as $icon => $value) {
										if($value) {
											echo '<li class="ml-3">';
												echo '<a href="'.$value.'" target="_blank">'.file_get_contents(image($icon.'-alt.svg')).'</a>';
											echo '</li>';
										}
									}
								?>
							</ul>
						</div>
						
						<div class="c-offices">
							<?php 
								if ( have_rows('offices', 'options') ) :
									while( have_rows('offices', 'options') ) : the_row();
										$tel = get_sub_field('telephone');
										?>
										<div class="c-offices__single">
											<p class="h-color-white h4 mb-0 h-line-height-large"><?php echo get_sub_field('name'); ?></p>
											<a class="h-color-white mb-0 h-line-height-large" href="tel:<?php echo str_replace(' ', '', $tel); ?>"><?php echo $tel; ?></a>
											<address class="h-color-white mb-0 h-line-height-large"><?php echo get_sub_field('address'); ?></address>
										</div>
										<?php
									endwhile;
								endif; 
							?>
						</div>

						<div class="d-lg-flex justify-content-lg-between align-items-lg-center">
							<div class="d-lg-flex align-items-lg-center">
								<img class="c-footer__logo mb-3 mb-lg-0" src="<?php echo image('utrack-icon.svg'); ?>" alt="uTrack logo icon" />
								<div>
									<p class="h-color-white mb-3 mb-lg-0 ml-lg-3"><?php echo get_field('copyright_text', 'options'); ?> &copy; <?php echo date("Y"); ?> uTrack Software Solutions</p>
									<p class="h-color-white h-bold ml-lg-3 mb-0">ISO 27001 Certified</p>
								</div>
							</div>
							<a class="h-color-white h4 mb-0 h-bold" href="https://sixthstory.co.uk" target="_blank">Website by Sixth Story</a>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<div id="js-cookie-banner" class="c-cookie-banner fadeIn wow">
			<a class="c-cookie-banner__close" id="js-agree"><i class="fa fa-times-circle"></i></a>
			<p class="h3 mb-2">We use cookies.</p>
			<p class="mb-0">By continuing to use this website you are giving consent to cookies being used as detailed in our Cookie Policy. For more information on the cookies we place and how to disable them <a id="js-close" href="<?php echo get_bloginfo('url'); ?>/cookie-policy/">click here</a>.</p>
		</div>

		<?php wp_footer(); ?>
	</body>
</html>
