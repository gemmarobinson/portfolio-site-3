import $ from 'jquery';

const homeLinks = () => {
    $('.js-home-links li').hover(function() {
        $('.js-home-links li').removeClass('active');
        $(this).addClass('active');
    });

    $('.js-home-links li').click(function() {
        $('.js-home-links li').removeClass('active');
        $(this).addClass('active');
    });
};

export default homeLinks;
