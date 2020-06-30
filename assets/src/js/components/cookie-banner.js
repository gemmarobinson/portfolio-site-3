const cookieBanner = () => {
    // Cookie Banner logic
    var $class = {
        show_lightbox: function() {
            document.getElementById('js-cookie-banner').style.display = 'block';
            document.getElementById('js-cookie-banner').style.visibility =
                'visible';
        },
        hide_lightbox: function() {
            document.getElementById('js-cookie-banner').style.display = 'none';
            document.getElementById('js-cookie-banner').style.visibility =
                'hidden';
        },
        set_cookie: function() {
            var date = new Date(Date.now() + 30 * 24 * 60 * 60 * 1000);
            var expiry = date.toUTCString();
            document.cookie =
                'userAgreement=YES; expires=' + expiry + '; path=/';
        },
    };

    // Check whether agreement cookie is set and display if not
    window.onload = function checkCookie() {
        var cookies = document.cookie.split(';');

        // removing all spaces from array values
        cookies = cookies.map(function(el) {
            return el.trim();
        });

        if (cookies.indexOf('userAgreement=YES') === -1) {
            $class.show_lightbox();
        }
    };

    // Add On Click Event
    document.getElementById('js-agree').addEventListener(
        'click',
        function(e) {
            $class.hide_lightbox();
            $class.set_cookie();
        },
        false
    );

    document.getElementById('js-close').addEventListener(
        'click',
        function(e) {
            $class.hide_lightbox();
            $class.set_cookie();
        },
        false
    );
};

export default cookieBanner;
