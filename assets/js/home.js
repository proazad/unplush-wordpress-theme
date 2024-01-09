;
(function ($) {
    $(document).ready(function () {
        var $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            // layoutMode: 'fitRows',
        });
        $('.filter-nav button').on('click', function () {
            var value = $(this).attr('data-name');
            $grid.isotope({
                filter: value,
            });
        });

        /**
         *  Sticky Navbar 
         */
        window.onscroll = function () {
            myFunction()
        };

        const search = document.getElementById("search-form");
        const header = document.getElementById("navbar");
        const navlink = document.getElementById("navlink");

        const sticky = header.offsetTop;

        function myFunction() {
            console.log(scrollY);
            if (scrollY > sticky) {
                search.classList.add("d-flex");
                search.classList.remove("d-none");
                header.classList.add("sticky");
                // navlink.classList.add("d-none");
            } else {
                search.classList.add("d-none");
                header.classList.remove("sticky");
                // navlink.classList.remode("d-none");
            }
        }

    });
})(jQuery);