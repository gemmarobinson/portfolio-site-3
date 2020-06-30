<?php
	/* Template Name: Careers */
	get_header();
?>

<div class="h-bg-cover" style="background-image: url('<?php echo get_field('hero_background')['url']; ?>');">
    <div class="h-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="c-solutions-hero">
                    <?php 
                        if (get_field('icon')) {
                            echo file_get_contents(get_field('icon')['url']); 
                        }
                    ?>
                    <h1 class="text-center h-color-white mb-2 fadeIn wow"><?php echo get_field('page_title'); ?></h1>
                    <h2 class="h3 h-weight-normal h-color-white fadeIn wow mb-0 text-center h-width-114">
                        <?php echo get_field('page_intro')['normal']; ?></h2>
                    <h2 class="h3 h-color-pink mb-0 text-center fadeIn wow">
                        <?php echo get_field('page_intro')['bold']; ?></h2>
                    <img class="c-solutions-hero__bg-shape" src="<?php echo image('solutions-hero-shape.svg'); ?>"
                        alt="Solutions hero background shapes" />
                    <a href="#anchor-start" class="c-solutions-hero__anchor h-color-white paragraph--small">
                        <img class="bounce infinite slow animated" src="<?php echo image('mouse-icon.svg'); ?>"
                            alt="Mouse icon symbolising scroll down" />
                        <span class="d-block my-2">Explore</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="c-careers-text-block">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="h-width-191 text-center mx-auto">
                    <h2 class="h-color-pink"><?php echo get_field('text_block_title'); ?></h2>
                    <?php the_field('text'); ?>
                    <div class="h-pink-divider h-pink-divider--short mx-auto mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="anchor-start">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                    $args = array (
                        'post_type' => 'careers',
                        'posts_per_page' => -1,
                    );

                    $wp_query = new WP_Query( $args );

                    if ( $wp_query->have_posts() ) {
                        while( $wp_query->have_posts() ) {
                            $wp_query->the_post();

                            $location = get_field('location');
                            ?>

                <div class="c-careers-card fadeInLeft wow c-careers-card--<?php echo strtolower($location); ?>">
                    <h3 class="c-careers-card__location mb-2"><?php echo $location; ?> Office</h3>
                    <h2 class="c-careers-card__title"><?php echo get_the_title(); ?></h2>
                    <?php the_field('overview'); ?>
                    <a class="c-btn mt-3" href="<?php echo get_the_permalink(); ?>">See details</a>
                </div>

                <?php
                        } wp_reset_query();
                    } else {

                        echo '<h2 class="h-text-large">Sorry, there are currently no job openings</h2>';

                    }
                ?>
                <div class="pb-5 mb-md-5">
                    <div class="h-lightgrey-divider mb-5"></div>
                    <p class="h2 h-text-large text-center pt-md-5">You can find us on</p>
                    <a href="https://www.glassdoor.co.uk/Overview/Working-at-uTrack-Software-EI_IE2351148.11,26.htm?countryRedirect=true"
                        class="d-block text-center" target="_blank">
                        <img class="h-width-47" src="<?php echo image('glassdoor-logo.svg'); ?>" alt="Glassdoor logo" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_template_part( 'template-parts/related-articles' ); ?>

<?php get_footer(); ?>