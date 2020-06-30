import $ from 'jquery';

const timelineSlider = () => {
    $('.js-timeline-slider').slick({
        appendArrows: '.js-arrows',
        prevArrow: '<div class="c-timeline-arrows__single"></div>',
        nextArrow: '<div class="c-timeline-arrows__single"></div>',
        fade: true,
        infinite: false,
        responsive: [
            {
                breakpoint: 400,
                settings: {
                    adaptiveHeight: true,
                },
            },
        ],
    });
};

export default timelineSlider;
