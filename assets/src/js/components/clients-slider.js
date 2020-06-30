import $ from 'jquery';
import '../vendor/slick';

const clientsSlider = () => {
    $('.js-clients-slider').slick({
        arrows: false,
        speed: 10000,
        autoplay: true,
        autoplaySpeed: 0,
        cssEase: 'linear',
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: true,
    });
};

export default clientsSlider;
