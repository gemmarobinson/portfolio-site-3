import $ from 'jquery';

const contactFormPopup = () => {
    $('.wpcf7').on('wpcf7mailsent', function() {
        $('.js-popup').addClass('active');
    });

    $('.js-popup-close').click(function() {
        $('.js-popup').removeClass('active');
        $('.has-value').removeClass('has-value');
    });
};

export default contactFormPopup;
