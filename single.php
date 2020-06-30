<?php get_header(); ?>
<?php
    if ( have_posts() ) {
        while ( have_posts() ) {the_post();  ?>
<div class="c-single">
    <div class="container">
        <div class="row align-items-center align-items-lg-start justify-content-center flex-column-reverse flex-lg-row">
            <div class="col-11 col-lg-3 pt-lg-3 d-flex flex-column-reverse align-items-center d-lg-block">
                <a href="<?php echo get_the_permalink(286); ?>" class="c-btn c-btn--white mt-5 mt-lg-0 mb-lg-3">Back to
                    news</a>
                <div class="d-none d-lg-block">
                    <div class="d-flex align-items-center mb-4 h-black-svg">
                        <p class="h-bold mb-0 h-color-black">
                            <?php echo get_the_terms(get_the_id(), 'post-type')[0]->name; ?></br>
                            <?php echo get_the_date('jS F, Y'); ?>
                        </p>
                    </div>
                    <div class="mb-4">
                        <p class="mb-0">Written by <?php echo get_the_author(); ?></p>
                        <?php
                            $cat = get_the_terms(get_the_id(), 'category');
                            if($cat[0]->name != 'Uncategorised') {
                                $permalink = get_bloginfo('url').'/news/?type=&category='.$cat[0]->slug.'#anchor-posts';
                                echo '<a class="mb-0 h-color-blue" href="'.$permalink.'">'.$cat[0]->name.'</a>';
                            }
                        ?>
                    </div>
                </div>
                <div>
                    <p class="h-color-black h-bold mb-2">Share this article</p>
                    <?php $title = str_replace(' ', '%20', get_the_title()); ?>
                    <ul class="c-socials">
                        <li class="mr-3">
                            <a href="https://www.linkedin.com/shareArticle?url=<?php echo get_the_permalink(); ?>"
                                target="_blank">
                                <?php echo file_get_contents(image('linked-in.svg')); ?>
                            </a>
                        </li>
                        <li class="mr-3">
                            <a href="https://twitter.com/intent/tweet?text=<?php echo $title.' Read more here: '.get_the_permalink(); ?>"
                                target="_blank">
                                <?php echo file_get_contents(image('twitter.svg')); ?>
                            </a>
                        </li>
                        <li>
                            <a href="https://facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>"
                                target="_blank">
                                <?php echo file_get_contents(image('fb.svg')); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-11 col-lg-8">
                <div class="c-single__content">
                    <h1 class="h-weight-normal h2"><?php echo get_the_title(); ?></h1>
                    <div class="d-block d-lg-none">
                        <p class="h-bold mb-0 h-color-black">
                            <?php echo get_the_terms(get_the_id(), 'post-type')[0]->name; ?>
                            <?php
                                $cat = get_the_terms(get_the_id(), 'category');
                                if($cat[0]->name != 'Uncategorised') {
                                    echo '- <span class="h-bold h-color-blue">'.$cat[0]->name.'</span>';
                                }
                            ?>
                        </p>
                        <p class="h-bold h-color-black mb-0"><?php echo get_the_date('jS F, Y'); ?></p>
                        <p class="h-bold h-color-black mb-4 mb-sm-5">Written by <?php echo get_the_author(); ?></p>
                    </div>
                    <?php
                        $postdate = get_the_date('Ymd');
                        //Check if post date is older than 11th January 2020 (legacy blog posts exported from old site)
                        if ($postdate > '20200111' ) {

                            $image = get_field('featured_image');
                            if($image) {
                                echo '<img src="'.$image['sizes']['medium_large'].'" alt="'.$image['alt'].'" />';
                            };
                        } else {

                            echo get_the_post_thumbnail( $post_id, 'medium_large');
                            
                        };
                    ?>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

        } 
    } 
?>

<?php get_template_part( 'template-parts/related-articles' ); ?>


<?php get_footer(); ?>