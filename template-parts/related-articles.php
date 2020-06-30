<section class="c-blue-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 px-md-4 d-md-flex justify-content-md-between align-items-md-end mb-4 pb-2">
                <?php 
                    if(is_single()) {
                        ?>
                        <h2 class="mb-4 mb-md-0">Related articles</h2>
                        <a href="<?php echo get_the_permalink(286); ?>" class="c-btn">View all</a>
                        <?php
                    } else {
                        ?>
                        <h2 class="mb-4 mb-md-0">
                            <?php 
                                $title = get_field('news_title');
                                if ($title) {
                                    if(str_word_count($title) >= 3) {
                                        echo splitByNumber($title, 2); 
                                    } else {
                                        echo $title;
                                    }
                                } else {
                                    echo 'Related articles';
                                }
                            ?>
                        </h2>
                        <?php 
                            $link = get_field('news_button'); 
                            if($link) {
                                ?>
                                <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="c-btn"><?php echo $link['title']; ?></a>
                                <?php                                
                            } else {
                                ?>
                                <a href="<?php echo get_the_permalink(286); ?>" class="c-btn">View all</a>
                                <?php
                            }
                        ?>
                        <?php
                    }
                ?>
            </div>
            <div class="col-11">
                <div class="row no-gutters">
                    <?php
                        $type_objects = get_terms( array('taxonomy' => 'post-type','hide_empty' => false));
                        $types = array_map(function($arr) { return $arr->slug;}, $type_objects);

                        $count = 0;

                        foreach($types as $type) {
                            ?>
                            <div class="col-12 col-lg-4">
                                <?php
                                    $args = array (
                                        'post_type' => 'post',
                                        'posts_per_page' => 1,
                                        'tax_query' => array(
                                            'relation' => 'AND',
                                            array(
                                                'taxonomy' => 'post-type',
                                                'field' => 'slug',
                                                'terms' => array( $type ),
                                            )
                                        )
                                    );

                                    $wp_query = new WP_Query( $args );

                                    if ( $wp_query->have_posts() ) {

                                        while( $wp_query->have_posts() ) {
                                            $wp_query->the_post();
                                            $image = get_field('featured_image');
                                            $icon = $type.'-icon.svg';

                                            ?>
                                            <a href="<?php echo get_the_permalink(); ?>" class="c-news-card fadeIn wow" data-wow-delay="<?php echo 0.5*$count; ?>s">
                                                <div class="c-news-card__image js-object-fit-image">
                                                    <?php
                                                        if($image) {
                                                            echo '<img src="'.$image['sizes']['medium_large'].'" alt="'.$image['alt'].'" />';
                                                        } else {
                                                            echo '<img src="'.image('utrack-placeholder.png').'" alt="Default featured image" />';
                                                        }
                                                    ?>
                                                </div>
                                                <div class="d-flex c-news-card__icon">
                                                    <div>
                                                        <?php echo file_get_contents(image($icon)); ?>
                                                    </div>
                                                    <h3 class="h4 mb-0"><?php echo ucfirst($type); ?></h3>
                                                </div>
                                                <p class="pr-3"><?php echo get_the_title(); ?></p>
                                                <p class="c-news-card__read mb-0">Read</p>
                                            </a>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                            <?php
                            $count++;
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>