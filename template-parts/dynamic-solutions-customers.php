<div class="c-customers-how h-bg-grey">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 px-lg-5">
                <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row mb-5 z-index-1">
                    <h2 class="mb-0">How does it help</h2>
                    <div class="c-select">
                        <select class="pl-0 js-variable-width js-customer-select">
                            <?php
                                while( have_rows('customers') ) : the_row();
                                    $name = get_sub_field('name');
                                    echo '<option value="'.str_replace(' ', '-', strtolower($name)).'">'.strtolower($name).'?</option>';
                                endwhile; 
                            ?>
                        </select>
                    </div>
                </div>
                                
                <div class="position-relative">
                    <?php
                        $count = 1;
                        while( have_rows('customers') ) : the_row();
                            $name = strtolower(get_sub_field('name'));
                            $active = $count === 1 ? 'active' : '';
                            ?>
                            <div class="row justify-content-center c-customers-how__row js-customer js-<?php echo str_replace(' ', '-', $name).' '.$active; ?>">
                                <img class="zoomIn wow" src="<?php echo image('how-does-it-help-circles.svg'); ?>" alt="background circles" />
                                <?php
                                    while( have_rows('how') ) : the_row();
                                        ?>
                                        <div class="col-12 col-sm-6 col-lg-4 mb-4 mb-lg-0 px-5 px-sm-4">
                                            <?php $image = get_sub_field('image'); ?>
                                            <img class="h-width-full" src="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php echo $image['alt']; ?>" />
                                            <div class="h-grey-divider mt-4 mb-3"></div>
                                            <h3 class="h-color-blue h-doubleline mb-0"><?php echo get_sub_field('title'); ?></h3>
                                            <p><?php echo get_sub_field('text'); ?></p>
                                        </div>
                                        <?php
                                    endwhile; 
                                ?>
                            </div>
                            <?php
                            $count++;
                        endwhile; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="c-customers-features">
    <img class="c-customers-features__circles zoomIn wow" src="<?php echo image('customer-features-background.svg'); ?>" alt="dashed line circles as background pattern" />
    <div class="container">
        <div class="position-relative">
            <?php
                $count = 1;
                while( have_rows('customers') ) : the_row();
                    $name = get_sub_field('name');
                    $active = $count === 1 ? 'active' : '';
                    ?>
                    <div class="row justify-content-center c-customers-features__row js-customer js-<?php echo strtolower(str_replace(' ', '-', $name)).' '.$active; ?>">
                        <div class="col-lg-10">
                            <p class="h3 h-color-lightGrey mb-0 text-center"><?php echo get_the_title(); ?></p>
                            <h2 class="mb-0 text-center">Core features for <span class="d-block h-color-blue"><?php echo strtolower($name); ?></span></h2>
                            <div class="h-coral-divider mx-auto mt-2 mb-5"></div>

                            <div class="row align-items-center">
                                <div class="col-6 d-none d-md-block">
                                    <?php $image = get_sub_field('core_features_image'); ?>
                                    <div class="c-customers-features__image fadeIn wow">
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 px-5 px-md-3">
                                    <?php
                                        while( have_rows('core_features') ) : the_row();
                                            ?>
                                            <div class="c-core-feature">
                                                <div class="c-core-feature__icon">
                                                    <?php 
                                                        $image = get_sub_field('icon');
                                                        
                                                        if($image) {
                                                            echo file_get_contents($image['url']);
                                                        }
                                                    ?>
                                                </div>
                                                <p class="mb-0 h-color-black"><?php echo get_sub_field('text'); ?></p>
                                            </div>
                                            <?php
                                        endwhile; 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count++;
                endwhile; 
            ?>
        </div>
    </div>
</div>