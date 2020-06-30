<?php
	/* Template Name: Solutions */
	get_header();
?>

<div class="h-bg-cover" style="background-image: url('<?php echo get_field('hero_background')['url']; ?>');">
	<div class="h-overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="c-solutions-hero">
					<div class="fadeIn wow">
						<?php 
							if(get_field('icon')) {
								echo file_get_contents(get_field('icon')['url']); 
							}
						?>
					</div>
					<h1 class="text-center h-color-white fadeIn wow"><?php echo get_field('page_title'); ?></h1>
					<img class="c-solutions-hero__bg-shape" src="<?php echo image('solutions-hero-shape.svg'); ?>" alt="Solutions hero background shapes" />
					<a href="#anchor-start" class="c-solutions-hero__anchor h-color-white paragraph--small">
						<img class="bounce slow infinite animated" src="<?php echo image('mouse-icon.svg'); ?>" alt="Mouse icon symbolising scroll down" />
						<span class="d-block my-2">Explore solution</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="anchor-start"></div>

<div class="c-solution-intro">
	<div class="container">
		<div class="row no-gutters flex-column-reverse flex-lg-row">
			<div class="col-12 col-lg-6 pr-lg-5 d-flex">
				<div class="ml-xl-n5 fadeInLeft wow">
					<?php $image = get_field('solutions_image'); ?>
					<div class="js-object-fit-image h-border-right h-border--thick h-width-full h-100" style="border-color: <?php echo get_field('color'); ?>">
						<img class="h-object-cover h-width-full h-100" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6 pl-lg-5 mb-4 mb-lg-0">
				<div class="h-width-165">
					<p class="h3 h-color-lightGrey mb-0">Solution</p>
					<h2><?php echo get_the_title(); ?></h2>
					<?php the_field('introduction'); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="c-solutions-clients">
	<img class="c-solutions-clients__lines d-none d-xl-block" src="<?php echo image('solutions-clients-lines.svg'); ?>" alt="clients lines shape background" />
	<img class="c-solutions-clients__circles" src="<?php echo image('solutions-clients-circles.svg'); ?>" alt="clients circle shape background" />
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center mb-0"><?php echo get_field('clients_title'); ?></h2>
				<div class="h-coral-divider mx-auto mt-3 mb-4"></div>
				<div class="d-flex flex-wrap justify-content-around align-items-center">
                    <?php 
						if ( have_rows('clients') ) : 
							$count = 0;

							while( have_rows('clients') ) : the_row(); 
							
								$delay = 0.3*$count;
                        
                                echo '<div class="c-clients__logo d-block fadeIn slow wow" data-wow-delay="'.$delay.'s">';
                                    echo '<img class="px-5 px-sm-0 mx-sm-5 mb-5" src="'.get_sub_field('logo')['url'].'" alt="'.get_sub_field('name').' logo" />';
                                echo '</div>';

								$count++;
                            endwhile; 
                        endif; 
                    ?>
                </div>
			</div>
		</div>
	</div>
</div>

<div class="c-solutions-benefits">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-12 col-lg-5 col-xl-6 d-flex justify-content-center justify-content-lg-end pl-5">
				<div class="h-width-165">
					<p class="h3 h-color-lightGrey mb-0"><?php echo get_field('benefits_label'); ?></p>
					<h2 class="mb-5 mb-xl-4"><?php echo splitByNumber(get_field('benefits_title'), 2); ?></h2>
					<div class="d-none d-lg-flex flex-wrap">
						<?php
							$count = 1;
							while( have_rows('benefits') ) : the_row();
								$delay = 0.3*$count;

								if ($count === 1) {
									echo '<div class="c-solutions-benefits__icon js-value-square fadeIn wow active" data-value="'.$count.'">';
								} else {
									echo '<div class="c-solutions-benefits__icon js-value-square fadeIn wow" data-wow-delay="'.$delay.'s" data-value="'.$count.'">';
								}
								if (get_sub_field('icon')) {
									echo file_get_contents( get_sub_field('icon')['url'] );
								}
								?>
								</div>
								<?php
								$count++;
							endwhile;
						?>
					</div>
					<div class="c-solutions-benefits__info position-relative">
						<?php 
							$count = 1;
							while( have_rows('benefits') ) : the_row();
								if ($count === 1) {
									echo '<div class="js-value-info align-items-center pr-5 active" data-value="'.$count.'">';
								} else {
									echo '<div class="js-value-info align-items-center pr-5" data-value="'.$count.'">';
								}
								?>
									<div class="d-lg-none mr-5 mr-lg-0 mb-3 mb-sm-0">
										<?php 
											if(get_sub_field('icon')) {
												echo file_get_contents( get_sub_field('icon')['url'] ); 
											}
										?>
									</div>
									<div>
										<h3 class="h-color-pink mb-2 mt-1"><?php echo get_sub_field('benefit_title'); ?></h3>
										<p class="mb-0"><?php echo get_sub_field('benefit_text'); ?></p>
									</div>
								</div>
								<?php
								$count++;
							endwhile;
						?>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-7 col-xl-6 pl-lg-5 d-flex mb-5 my-md-5 my-lg-0">
				<div class="mr-xl-n5 fadeInRight wow">
					<?php $image = get_field('benefits_image'); ?>
					<img class="h-object-cover h-border-left h-border--thick h-width-full" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" style="border-color: <?php echo get_field('color'); ?>" />
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_template_part( 'template-parts/dynamic-solutions-customers' ); ?>

<div class="container h-pb-44">
	<div class="row justify-content-center">
		<div class="col-11 col-md-12">
			<?php get_template_part( 'template-parts/cta' ); ?>
		</div>
	</div>
</div>
<?php get_template_part( 'template-parts/related-articles' ); ?>

<?php get_footer(); ?>