import $ from 'jquery';

const newsFilter = () => {
    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(
            /[?&]+([^=&]+)=([^&]*)/gi,
            function(m, key, value) {
                vars[key] = value;
            }
        );
        return vars;
    }

    $('.js-news-select').change(e => {
        var select = $(e.target).attr('name');
        var value = $(e.target).val();

        var type = '';
        var category = '';

        if (getUrlVars()['type']) {
            type = getUrlVars()['type'].split('#')[0];
        }

        if (getUrlVars()['category']) {
            category = getUrlVars()['category'].split('#')[0];
        }

        if (select == 'type') {
            type = value;
        }

        if (select == 'category') {
            category = value;
        }

        var url = location.href.substring(0, location.href.lastIndexOf('page'));

        var replace =
            url + '?type=' + type + '&category=' + category + '#anchor-posts';

        location.replace(replace);
    });
};
export default newsFilter;
