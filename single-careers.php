<?php get_header(); ?>

<div class="c-default">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11">
                <h1 class="h-color-pink"><?php echo splitByNumber(get_the_title(), 2); ?></h1>
                <p class="h3 h-color-blue mt-5">Posted on <?php echo get_the_date('jS F Y'); ?></p>
    
                <div class="c-default__block">
                    <h2 class="mb-3">Overview</h2>
                    <?php the_field('overview'); ?>
                </div>
                
                <?php
                    if ( have_rows('sections') ) :

                        while( have_rows('sections') ) : the_row();
                            ?>
                            <div class="c-default__block">
                                <h2 class="mb-3"><?php echo get_sub_field('section_header'); ?></h2>
                                <?php the_sub_field('content'); ?>
                            </div>
                            <?php
                        endwhile;

                    else :

                        while ( have_posts() ) :the_post();
                            
                            the_content();

                        endwhile;    

                    endif; 
                ?>
                
                <div class="d-flex justify-content-center pt-md-5 mt-5">
                 <a href="<?php echo get_the_permalink(439); ?>" class="c-btn d-flex ">Back to all careers</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>