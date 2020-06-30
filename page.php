<?php get_header(); ?>

<div class="c-default">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11">
                <h1 class="h-color-pink"><?php echo get_the_title(); ?></h1>
                <?php
                    if ( have_rows('sections') ) :

                        while( have_rows('sections') ) : the_row();
                            ?>
                            <div class="c-default__block">
                                <h2><?php echo section_count().'. '.get_sub_field('section_header'); ?></h2>
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

                <ul class="c-socials justify-content-center">
                    <?php
                        $socials = get_field('socials', 'options');

                        foreach($socials as $icon => $value) {
                            if($value) {
                                echo '<li class="mx-2">';
                                    echo '<a href="'.$value.'" target="_blank">'.file_get_contents(image($icon.'.svg')).'</a>';
                                echo '</li>';
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>