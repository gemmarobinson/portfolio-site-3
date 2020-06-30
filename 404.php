<?php get_header(); ?>

<div class="c-four-oh-four">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11">
                <h1 class="h-color-pink c-four-oh-four__title">404</h1>
                <h2 class="h-color-white c-four-oh-four__subtitle mb-md-2">Uh-oh!</h2>
                <p class="c-four-oh-four__text h-color-white mb-0">We can't find this page.</p>
                <p class="c-four-oh-four__text h-color-white mb-0">Don't worry, let's make a U-Turn.</p>
                <a href="<?php echo get_bloginfo('url'); ?>" class="c-btn mt-5">Home</a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>