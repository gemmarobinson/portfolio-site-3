import $ from 'jquery';

const headerScroll = () => {
    if ($(window).scrollTop() >= 10) {
        $('.js-header').addClass('stuck');
    } else {
        $('.js-header').removeClass('stuck');
    }
};

export default headerScroll;
