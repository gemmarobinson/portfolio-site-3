import $ from 'jquery';

const emailValidation = () => {
    $('.wpcf7-submit').click(function() {
        function isValidEmailAddress(emailAddress) {
            var pattern = new RegExp(
                /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i
            );
            return pattern.test(emailAddress);
        }

        var email = $('.wpcf7-validates-as-email').val();
        if (!isValidEmailAddress(email)) {
            $('.wpcf7-validates-as-email').css('border-color', '#ff4441');
        }
    });
};

export default emailValidation;
