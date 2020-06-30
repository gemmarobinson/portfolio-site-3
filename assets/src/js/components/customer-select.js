import $ from 'jquery';

const customerSelect = () => {
    $('.js-customer-select').change(function() {
        var selected = '.js-' + $(this).val();

        $('.js-customer').removeClass('active');
        $(selected).addClass('active');
    });
};

export default customerSelect;
