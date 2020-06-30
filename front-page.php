<?php get_header(); ?>

<section class="c-home-hero js-hero-background">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 px-md-4">
                <?php $title = get_field('hero_title'); ?>
                <h1 class="h-color-white mb-5 pb-3">
                    <span class="d-sm-block"><?php echo $title['line_one']; ?></span>
                    <span class="d-sm-block"><?php echo $title['line_two']; ?></span>
                    <span class="h-weight-normal"><?php echo $title['line_three']; ?></span>
                </h1>
                <div class="d-flex justify-content-between align-items-end">
                    <div>
                        <p class="h-color-white mb-0"><?php echo get_field('text_for_list'); ?></p>
                        <?php 
                            if ( have_rows('links') ) :

                                $i = 1;

                                echo '<ul class="c-home-hero__links js-home-links">';
                            
                                    while( have_rows('links') ) : the_row();

                                        $active = $i === 2 ? ' class="active" ' : '';
                                
                                        echo '<li'.$active.'><a href="'.get_sub_field('link').'">'.get_sub_field('link_text').'</a></li>';

                                        $i++;
                                
                                    endwhile;

                                echo '</ul>';
                            
                            endif;
                        ?>
                    </div>
                    <a href="#anchor-solutions" class="text-center d-none d-sm-block h-no-decoration">
                        <img class="bounce animated infinite slow" src="<?php echo image('mouse-icon.svg'); ?>" alt="Mouse icon to indicate scroll down link" />
                        <p class="paragraph--small h-color-white my-2">Explore uTrack</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="c-clients">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-5"><?php echo get_field('clients_text'); ?></p>

                <div class="js-clients-slider h-faded-edges">
                    <?php 
                        if ( have_rows('clients') ) : 
                            while( have_rows('clients') ) : the_row(); 
                        
                                $logo = get_sub_field('logo');
                                if($logo) {

                                    echo '<div class="c-clients__logo d-block">';
                                        if($logo["mime_type"] == 'image/svg+xml') {
                                            echo file_get_contents($logo['url']);
                                        } else {
                                            echo '<img src="'.$logo['url'].'" alt="'.$logo['alt'].'" />';
                                        }                                  
                                    echo '</div>';
                                }
                        
                            endwhile; 
                        endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="c-home-solutions">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 px-md-4">
                <div id="anchor-solutions"></div>
                <h2 class="mb-4 pb-3"><?php echo get_field('solutions_title'); ?></h2>

                <div class="d-flex flex-wrap justify-content-between pt-4">
                    <?php
                        // Pulls in solutions based on what pages use the Solutions template
                        $args = array(
                            'post_type' => 'page',
                            'posts_per_page' => -1,
                            'meta_query' => array(
                                array(
                                    'key' => '_wp_page_template',
                                    'value' => 'page-templates/template-solutions.php'
                                )
                            )
                        );
                        $the_pages = new WP_Query( $args );

                        if( $the_pages->have_posts() ){
                            $count = 0;

                            while( $the_pages->have_posts() ){
                                $the_pages->the_post();
                                $icon = get_field('icon');
                                $color = get_field('color');
                                ?>
                                <div class="c-solutions-card fadeIn wow" data-wow-delay="<?php echo 0.5*$count; ?>s" style="border-color:<?php echo $color; ?>">
                                    <div class="c-solutions-card__icon">
                                        <?php echo file_get_contents($icon['url']); ?>
                                    </div>
                                    <h3 class="mb-2"><?php echo get_the_title(); ?></h3>
                                    <p class="c-solutions-card__overview"><?php echo get_field('overview_text'); ?></p>
                                    <a href="<?php echo get_the_permalink(); ?>" class="c-btn c-btn--white c-solutions-card__button mt-4">Find out more</a>
                                    <div class="c-solutions-card__hover" style="background-color:<?php echo $color; ?>"></div>
                                </div>
                                <?php
                                $count++;
                            }

                                
                        }
                        wp_reset_postdata();
                    ?>
                </div>
            </div>

            <div class="col-11 col-md-12">
                <?php get_template_part( 'template-parts/cta' ); ?>
            </div>
        </div>
    </div>
    
</section>

<?php get_template_part( 'template-parts/related-articles' ); ?>

<?php get_footer(); ?>