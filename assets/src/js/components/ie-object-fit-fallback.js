import $ from 'jquery';

const newsFilter = () => {
    if ('objectFit' in document.documentElement.style === false) {
        $('.js-object-fit-image').each(function() {
            var $container = $(this),
                imgUrl = $container.find('img').prop('src');
            if (imgUrl) {
                $container
                    .css('background-image', 'url(' + imgUrl + ')')
                    .addClass('h-alt-object-fit');
            }
        });

        $('.js-object-fit-image-contain').each(function() {
            var $container = $(this),
                imgUrl = $container.find('img').prop('src');
            if (imgUrl) {
                $container
                    .css('background-image', 'url(' + imgUrl + ')')
                    .addClass('h-alt-object-fit-contain');
            }
        });
    }
};
export default newsFilter;
