const emailObfuscate = () => {
    ('use strict');
    Object.defineProperty(exports, '__esModule', {
        value: true,
    });
    exports.default = void 0;
    var emailObfuscate = function emailObfuscate() {
        var emailDomain = atob('c2l4dGhzdG9yeS5jb20='); //encode email domain (e.g. sixthstory.com) into base64 and add here. https://www.base64encode.org
        var emailLinks = document.querySelectorAll('[data-hide-email]');
        emailLinks.forEach(function(link) {
            var emailUser = link.getAttribute('data-user');
            link.onmouseover = link.ontouchstart = link.onfocus = function() {
                return link.setAttribute(
                    'href',
                    'mailto:' + emailUser + '@' + emailDomain
                );
            };
        });
    }; // Example usage: <a href="#" target="_blank" data-hide-email data-user="tom">Email Me!</a>
    var _default = emailObfuscate;
    exports.default = _default;
};

export default emailObfuscate;
