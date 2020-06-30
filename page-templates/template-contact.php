<?php
	/* Template Name: Contact */
	get_header();
?>

<div class="c-contact">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5 col-lg-6">
                <h2 class="h3 mb-0"><?php echo get_the_title(); ?></h2>
                <h1><?php echo get_field('title')['bold']; ?> <span class="d-block h-weight-normal"><?php echo get_field('title')['normal']; ?></span></h1>
                <p class="mb-0"><?php echo get_field('text')['grey']; ?></p>
                <p class="h-color-pink mb-0"><?php echo get_field('text')['pink']; ?></p>
                <div class="h-pink-divider my-5"></div>
                <?php
                    $offices = get_field('offices');

                    foreach($offices as $office) {
                        echo  '<a href="'.$office['link'].'" target="_blank" class="d-block h-color-blue h-bold h-underline h-bold mb-2">'.$office['text'].'</a>';
                    }
                ?>
                <ul class="c-socials mt-5">
                    <?php
                        $socials = get_field('socials', 'options');

                        foreach($socials as $icon => $value) {
                            if($value) {
                                echo '<li class="mr-3">';
                                    echo '<a href="'.$value.'" target="_blank">'.file_get_contents(image($icon.'.svg')).'</a>';
                                echo '</li>';
                            }
                        }
                    ?>
                </ul>
            </div>
            <div class="col-12 col-md-7 col-lg-6 mt-5 mt-md-0">
                <div class="c-contact__form fadeIn wow">
                    <h2 class="h3"><?php echo get_field('contact_form_intro_text'); ?></h2>
                    <?php echo do_shortcode(get_field('contact_form_shortcode')); ?>

                    <div class="c-contact__form-submit js-popup">
                        <?php the_field('contact_form_thank_you_message'); ?>
                        <div class="c-contact__popup-close js-popup-close">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>