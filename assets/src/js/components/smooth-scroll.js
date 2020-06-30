import $ from 'jquery';

const smoothScroll = () => {
    $('a[href*="#anchor-"]').click(function(event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') ==
                this.pathname.replace(/^\//, '') &&
            location.hostname == this.hostname
        ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length
                ? target
                : $('[name=' + this.hash.slice(1) + ']');

            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                var headerHeight = $('header').height();
                var scrollToPosition = target.offset().top - headerHeight;
                $('html, body').animate(
                    {
                        scrollTop: scrollToPosition, // minus 85 to allow for fixed header
                    },
                    1000
                );
            }
        }
    });
};

export default smoothScroll;
