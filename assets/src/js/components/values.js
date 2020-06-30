import $ from 'jquery';

const valuesToggle = () => {
    $('.js-value-square').click(function(event) {
        var clicked = $(this);

        if (!clicked.hasClass('active')) {
            var value = clicked.attr('data-value');

            $('.js-value-square').removeClass('active');
            $('.js-value-square[data-value="' + value + '"]').addClass(
                'active'
            );

            $('.js-value-info')
                .removeClass('active')
                .fadeOut();
            $('.js-value-info[data-value="' + value + '"]').fadeIn();
        }
    });
};

export default valuesToggle;
