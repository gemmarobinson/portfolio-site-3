import $ from 'jquery';

const formLabels = () => {
    $('.wpcf7-form input, .wpcf7-form textarea').on(
        'change keyup keydown paste cut',
        function() {
            var value = $(this).val();
            if (value == '') {
                $(this)
                    .parent()
                    .removeClass('has-value');
            } else {
                $(this)
                    .parent()
                    .addClass('has-value');
            }
        }
    );
};

export default formLabels;
