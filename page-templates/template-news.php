<?php
	/* Template Name: News */
    get_header();
    
    // URL Parameters
    $filter_type = (isset($_GET['type']) && $_GET['type'] != 'all') ? $_GET['type'] : '' ;
    $filter_category = (isset($_GET['category']) && $_GET['category'] != 'all') ? $_GET['category'] : '' ;
?>

<div class="c-news">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-11">
                <h2 class="h3 h-color-charcoal mb-0">News</h2>
                <h1 class="mb-0"><?php echo get_field('title')['bold']; ?> <span
                        class="h-weight-normal"><?php echo get_field('title')['normal']; ?></span></h1>
                <p class="mb-3 pb-4"><?php echo get_field('intro_text'); ?></p>
                <?php
                    $args = array (
                        'post_type'      	=> 'post',
                        'posts_per_page' 	=> 1,
                    );
                    $wp_query = new WP_Query( $args );

                    if ($wp_query->have_posts()) {
                        while ( $wp_query->have_posts() ) : $wp_query->the_post();
                            ?>
                            <div class="c-latest h-border-bottom h-border--spanish-grey pb-4">
                                <div class="position-relative">
                                    <?php
                                        if(get_field('featured_image')) {
                                            $image = get_field('featured_image');
                                            echo '<div class="c-latest__image js-object-fit-image">';
                                                echo '<img src="'.$image['sizes']['1536x1536'].'" alt="'.$image['alt'].'" />';
                                            echo '</div>';
                                        } else {
                                            echo '<div class="c-latest__image c-latest__image--default js-object-fit-image">';
                                                echo '<img src="'.image('default-featured-image.png').'" alt="Default featured image" />';
                                            echo '</div>';
                                        }
                                    ?>
                                    <div class="c-latest__date c-latest__date--absolute">
                                        <p class="h-color-white mb-n2 text-center">
                                            <?php echo get_the_date('jS F'); ?>
                                        </p>
                                        <p class="h2 h-color-white mb-0 text-center">
                                            <?php echo get_the_date('Y'); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-md-flex align-items-center" id="anchor-posts">
                                    <div class="c-latest__title">
                                        <h2 class="mb-0 h-color-pink h-bold h-text-large">Latest Article</h2>
                                        <h3 class="mb-2 h2 h-weight-normal h-text-large"><?php echo get_the_title(); ?></h3>
                                        <p>Written by <?php echo get_the_author(); ?></p>
                                    </div>
                                    <div class="flex-grow-1 text-md-right my-4 my-md-0">
                                        <a class="c-btn c-btn--white" href="<?php echo get_the_permalink(); ?>">Read</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;  wp_reset_postdata();
                    }
                ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-11 mt-5">
                <?php 
                    $terms = get_terms( array(
                        'taxonomy' => 'post-type',
                        'hide_empty' => true,
                    ) );

                    if($terms) {
                        ?>
                        <div class="d-flex align-items-center justify-content-start">
                            <p class="h-text-large h3 mb-0 h-weight-normal h-color-slate-grey">Filter by</p>
                            <div class="c-select c-select--pink c-select--news mb-1 ml-2">
                                <select class="js-variable-width h-text-large js-news-select" name="type">
                                    <option value="all">All</option>
                                    <?php
                                        foreach($terms as $term) {
                                            if($filter_type === $term->slug) {
                                                echo '<option selected value="'.$term->slug.'">'.$term->name.'</option>';
                                            } else {
                                                echo '<option value="'.$term->slug.'">'.$term->name.'</option>';

                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php
                    }
                ?>
                <?php
                    $categories = get_terms( array(
                        'taxonomy' => 'category',
                        'hide_empty' => true,
                        'exclude' => array(1),
                    ) );
                    
                    if($categories) {
                        ?>
                        <div class="d-flex align-items-center justify-content-start mt-2">
                            <p class="mb-0 h-color-slate-grey">Categorise by</p>
                            <div class="c-select c-select--pink c-select--news ml-1">
                                <select class="js-variable-width h-text-normal js-news-select" name="category">
                                    <option value="all">All</option>
                                    <?php
                                        foreach($categories as $cat) {
                                            if($filter_category === $cat->slug) {
                                                echo '<option selected value="'.$cat->slug.'">'.$cat->name.'</option>';
                                            } else {
                                                echo '<option value="'.$cat->slug.'">'.$cat->name.'</option>';

                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php 
                    }
                ?>
            </div>

            <div class="col-11 my-5">
                <div class="d-flex flex-wrap justify-content-start">
                    <?php 
                        $args = array (
                            'post_type'      	=> 'post',
                            'posts_per_page' 	=> 1,
                        );
                        $query = new WP_Query( $args );

                        if ( $query->have_posts() ) {    
                            while( $query->have_posts() ) {
                                $query->the_post();
                                $exclude = get_the_id();
                            } wp_reset_postdata();
                        }
                            
                        $args = array (
                            'post_type' => 'post',
                            'posts_per_page' => 12,
                            'paged' => $paged,
                            'post_status' => array('publish'),
                            'post__not_in' => array($exclude),
                            'tax_query' => array(
                                'relation' => 'AND',
                            ),
                        );

                        
                        if ($filter_category) {
                            $args['tax_query'][] = array (    
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => array( $filter_category ),
                                'include_children' => true,
                                'operator' => 'IN'
                            );
                        }
                        
                        if($filter_type) {
                            $args['tax_query'][] = array (
                                'taxonomy' => 'post-type',
                                'field' => 'slug',
                                'terms' => array( $filter_type ),
                                'include_children' => true,
                                'operator' => 'IN'
                            );
                        }

                        $wp_query = new WP_Query( $args );

                        if ( $wp_query->have_posts() ) {

                            while ( $wp_query->have_posts() ) {
                                $wp_query->the_post();

                                $cat = get_the_terms(get_the_id(), 'category');
                                if($cat[0]->name != 'Uncategorised' && $cat[0]->name) {
                                    $category = $cat[0]->name;
                                } else {
                                    $category = '';
                                }

                                $image = get_field('featured_image');
                                if ($image) {
                                    
                                    $image_src = $image['sizes']['large'];
                                    $image_alt = $image['alt'];

                                } else if (get_the_post_thumbnail_url( $post->ID, 'large')) {

                                    $image_src = get_the_post_thumbnail_url( $post->ID, 'large');
                                    $image_alt = get_post_meta ( $post->ID, '_wp_attachment_image_alt', true );
                                    
                                } else {

                                    $image_src = image('utrack-placeholder.png');
                                    $image_alt = 'Default news card image';
                                    
                                }

                                $post_type = get_the_terms(get_the_id(), 'post-type') 
                                    ? array_map(function($arr) { return $arr->name; }, get_the_terms(get_the_id(), 'post-type'))
                                    : [];
                                
                                ?>

                                <a href="<?php echo get_the_permalink(); ?>" class="c-post-card fadeIn animated">
                                    <div class="c-post-card__image js-object-fit-image">
                                        <img src="<?php echo $image_src; ?>" alt="<?php echo $image_alt; ?>" />
                                    </div>
                                    <div class="c-post-card__info">
                                        <p class="h-bold h-color-pink mb-2"><?php echo implode(', ', $post_type); ?></p>
                                        <h3 class="h6 mb-1"><?php echo get_the_title(); ?></h3>
                                        <p class="mb-2">
                                            <?php 
                                                if($category) {
                                                    echo $category.'. ';
                                                };

                                                echo get_the_date('jS F, Y'); 
                                            ?>
                                        </p>
                                        <p class="mb-0 c-post-card__read">Read</p>
                                    </div>
                                </a>

                                <?php
                            }
                        } else {
                            echo '<p class="h3">There are no posts matching this criteria. Please try again.</p>';
                        }
                    ?>
                </div>
                <div class="c-pagination js-pagination">
                    <?php			
                        global $wp_query;
                        $big = 999999999;

                        echo paginate_links([
                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'prev_text' => __(file_get_contents(image('pagination-arrow.svg'))),
                            'next_text' => __(file_get_contents(image('pagination-arrow.svg'))),
                            'total' => $wp_query->max_num_pages
                        ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>