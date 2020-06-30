<?php
	/* Template Name: About */
	get_header();
?>

<div class="c-about-hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 position-relative">
                <span class="h3 h-color-charcoal"><?php echo get_field('page_title'); ?></span>
                <h1 class="h-color-white"><?php echo get_field('main_title'); ?></h1>
                <p class="h3 h-color-white h-width-115">
                    <?php $text = get_field('intro'); ?>
                    <?php echo $text['white_text']; ?>
                    <span class="d-block h-color-pink"><?php echo $text['pink_text']; ?></span>
                </p>
                <a href="#anchor-mission" class="d-none d-lg-flex align-items-lg-center h-no-decoration mt-4 mt-sm-5">
                    <img class="bounce slow animated infinite" src="<?php echo image('mouse-icon.svg'); ?>" alt="Mouse icon symbolising scroll link" />
                    <p class="paragraph--small h-color-white pl-2 mb-0">Explore uTrack</p>
                </a>
                <div class="c-about-hero__play" style="background-image: url('<?php echo get_field('header_image')['sizes']['large']; ?>')">
                    <span class="js-video-button">
                        <img src="<?php echo image('play-icon-black.svg'); ?>" alt="Play icon" />
                        <div class="watch-text">Watch our video</div>
                    </span>
                </div>
                <div class="c-video-popup js-video-popup">
                    <div class="c-video-popup__video">
                        <?php 
                            $iframe = get_field('video'); 

                            // Use preg_match to find iframe src.
                            preg_match('/src="(.+?)"/', $iframe, $matches);
                            $src = $matches[1];
                        ?>
                        <iframe 
                            id="main-video" 
                            class="js-video-iframe"
                            src=""
                            data-source="<?php echo $src; ?>"
                            frameborder="0" 
                            allow="autoplay; fullscreen"
                            height="420"
                            allowfullscreen
                        ></iframe>
                    </div>
                    <div class="c-video-popup__close">
                        <i class="far fa-times"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-about-hero__image fadeInRight wow">
        <img src="<?php echo get_field('header_image')['sizes']['large']; ?>" alt="<?php echo get_field('header_image')['alt']; ?>" />
    </div>
</div>

<div id="anchor-mission"></div>

<div class="c-mission">
    <div class="container">
        <div class="row position-relative">
            <div class="c-mission__square"><?php echo file_get_contents(image('mission-square.svg')); ?></div>
            <div class="c-mission__circle"><?php echo file_get_contents(image('mission-circle.svg')); ?></div>
            <div class="col-12 h-offset-left position-relative">
                <div class="c-mission__image zoomIn wow">
                    <img src="<?php echo get_field('mission_image')['sizes']['medium_large']; ?>" alt="<?php echo get_field('mission_image')['alt']; ?>" />
                </div>
                <div class="c-mission__block">
                    <h2 class="h-color-lightGrey h3"><?php echo get_field('mission_label'); ?></h2>
                    <h3 class="h2"><?php echo get_field('mission_title'); ?></h3>
                    <p><?php echo get_field('mission_text'); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="c-values">
    <div class="container">
        <div class="row">
            <div class="col-12 h-offset-left">
                <h2 class="mb-4 pb-3">Our core values</h2>
                <div class="row">
                    <div class="col-6 d-none d-lg-block">
                        <div class="d-flex flex-wrap">
                            <?php
                                $count = 1;
                                while( have_rows('values') ) : the_row();
                                    $arr = explode(' ',trim(get_sub_field('title')));
                                    $value = strtolower($arr[0]);
                                    $delay = $count*0.3;
                                    if ($count === 1) {
                                        echo '<div class="c-values__icon js-value-square fadeIn wow active" data-value="'.$value.'">';
                                    } else {
                                        echo '<div class="c-values__icon js-value-square fadeIn wow" data-wow-delay="'.$delay.'s" data-value="'.$value.'">';
                                    }
                                    echo file_get_contents( get_sub_field('icon')['url'] );
                                    ?>
                                    </div>
                                    <?php
                                    $count++;
                                endwhile;
                            ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 pl-lg-5">
                        <div class="position-relative">
                            <?php 
                                $count = 1;
                                while( have_rows('values') ) : the_row();
                                    $arr = explode(' ',trim(get_sub_field('title')));
                                    $value = strtolower($arr[0]);
                                    if ($count === 1) {
                                        echo '<div class="c-values__info js-value-info active" data-value="'.$value.'">';
                                    } else {
                                        echo '<div class="c-values__info js-value-info" data-value="'.$value.'">';
                                    }
                                    ?>
                                        <div><?php echo file_get_contents( get_sub_field('icon')['url'] ); ?></div>
                                        <div>
                                            <h3 class="h2 h-color-pink mb-2 mt-1"><?php echo get_sub_field('title'); ?></h3>
                                            <p><?php echo get_sub_field('text'); ?></p>
                                        </div>
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
    </div>
</div>

<div class="c-about">
    <div class="c-about__background">
        <img src="<?php echo image('dashed-circles.svg'); ?>" alt="" />
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 h-offset-left">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h2><?php echo get_field('history_title'); ?></h2>
                    </div>
                    <div class="col-12 c-timeline-background">
                        <div class="c-timeline js-timeline-slider">
                            <?php 
                                while( have_rows('timeline') ) : the_row();
                                    ?>
                                    <div>
                                        <div class="d-lg-flex justify-content-lg-between align-items-lg-center">
                                            <div class="c-timeline-image">
                                                <img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>" />
                                            </div>
                                            <div class="c-timeline-card">
                                                <div class="c-timeline-card__year">
                                                    <p class="h3 mb-0"><?php echo get_sub_field('year'); ?></p>
                                                </div>
                                                <p><?php echo get_sub_field('text'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                            ?>
                        </div>
                        <div class="c-timeline-arrows js-arrows"></div>
                    </div>
                </div>
            </div>

            <div class="col-11">
                <h2 class="mb-5"><?php echo get_field('about_title'); ?></h2>
                <div class="c-text-block">
                    <?php 
                        while( have_rows('text_block') ) : the_row();
                            ?>
                            <div class="c-text-block__single">
                                <h3 class="mb-1"><?php echo get_sub_field('title'); ?></h3>
                                <?php the_sub_field('text'); ?>
                            </div>
                            <?php
                        endwhile;
                    ?>
                </div>

                <div class="h-pink-divider mt-5"></div>
            </div>

            <div class="col-11">
                <div class="c-benefits-section">
                    <h2 class="h3 c-benefits-section__title"><?php echo get_field('benefits_title'); ?></h2>
                    <div class="c-benefits-section__left">

                        <?php                
                            while( have_rows('benefits') ) : the_row();
                                ?>
                                <div class="c-benefit">
                                    <div class="c-benefit__image">
                                        <?php $icon = get_sub_field('icon'); ?>
                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
                                    </div>
                                    <p class="h-color-black mb-0"><?php echo get_sub_field('text'); ?></p>
                                </div>
                                <?php
                            endwhile;
                        ?>
                    </div> 
                    <div class="c-benefits-section__right">
                        <img src="<?php echo get_field('benefits_image')['url']; ?>" alt="<?php echo get_field('benefits_image')['alt']; ?>" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="c-team-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2><?php echo get_field('team_title'); ?></h2>
                <p class="h-width-191 mx-auto"><?php echo get_field('team_introduction'); ?></p>
                <div class="c-team fadeInLeft wow">
                    <?php
                        $count = 1;
                        $total = count(get_field('team_members'));
                        while( have_rows('team_members') ) : the_row();
                            ?>
                            <div class="c-team__member">
                                <div class="c-team__image js-object-fit-image-contain">
                                    <?php $image = get_sub_field('image'); ?>
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                                </div>
                                <div class="c-team__info">
                                    <p class="h3 mb-0 text-center"><?php echo get_sub_field('full_name'); ?></p>
                                    <p class="mb-0 mx-auto text-center"><?php echo get_sub_field('job_title'); ?></p>
                                </div>
                            </div>
                            <?php
                            if($count % 4 == 0 && $count != $total) {
                                echo '</div><div class="c-team fadeInLeft wow">';
                            }

                            $count++; 
                        endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>