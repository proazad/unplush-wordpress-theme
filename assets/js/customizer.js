;
(function ($) {
    wp.customize('pexels_banner_heading', function (value) {
        value.bind(function (newvalue) {
            $('.author-name').html(newvalue);
        });
    });
    wp.customize('pexels_banner_subheading', function (value) {
        value.bind(function (newvalue) {
            $('.author-designation').html(newvalue);
        });
    });
})(jQuery);