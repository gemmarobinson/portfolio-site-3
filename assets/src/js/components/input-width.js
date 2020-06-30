import $ from 'jquery';

const inputWidth = () => {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf('MSIE ');

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
        // If Internet Explorer
    } else {
        $.fn.textWidth = function(text, font) {
            if (!$.fn.textWidth.fakeEl)
                $.fn.textWidth.fakeEl = $('<span>')
                    .hide()
                    .appendTo(document.body);

            $.fn.textWidth.fakeEl
                .text(
                    text ||
                        this.val() ||
                        this.text() ||
                        this.attr('placeholder')
                )
                .css('font', font || this.css('font'));

            return $.fn.textWidth.fakeEl.width();
        };

        $('.js-variable-width')
            .on('input', function() {
                var inputWidth = $(this).textWidth() + 40;
                $(this).css({
                    width: inputWidth,
                });
            })
            .trigger('input');

        function inputWidth(elem, minW, maxW) {
            elem = $(this);
        }

        var targetElem = $('.js-variable-width');

        inputWidth(targetElem);
    }
};

export default inputWidth;
