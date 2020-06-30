<div class="c-cta h-overflow-hidden">
    <div class="c-cta__image slideInLeft wow">
        <?php $image = get_field('cta_image'); ?>
        <img src="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php echo $image['sizes']; ?>" />
    </div>
    <div class="c-cta__text js-cta-background">
        <?php $title = get_field('cta_title'); ?>
        <h2 class="h-color-white mb-4 pb-1 fadeIn wow"><?php echo $title['normal']; ?> <span class="h-weight-normal fadeIn wow" data-wow-delay="0.5s"><?php echo $title['light']; ?></span></h2>
        <p class="h-color-white mb-4 pb-3"><?php echo get_field('cta_text'); ?></p>
        <?php $link = get_field('cta_button'); ?>
        <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="c-btn"><?php echo $link['title']; ?></a>
    </div>
</div>