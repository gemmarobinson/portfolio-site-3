import $ from 'jquery';

const mobileMenu = () => {
    const $menuToggle = $('.js-mobile-menu-toggle'),
        $menu = $('.js-mobile-menu');

    $menuToggle.on('click', function(e) {
        e.preventDefault();
        $(this)
            .add($menu)
            .toggleClass('menu-open');
        $('html').toggleClass('fixed');
        $('body').toggleClass('fixed');
        $('.js-mobile-menu.menu-open').height(window.innerHeight);
    });
};

export default mobileMenu;
