/**
 * Created by William on 2016/10/31.
 */

/* ----------------------------------------------------------------------------------------------------------------

 * ON SCROLL EVENTS *

 ----------------------------------------------------------------------------------------------------------------*/

// CHANGE NAV TO BLACK ON SCROLL. ----------------------------
(function scrollNavToGreen() {

    $(window).on('scroll', function () {

        if ( $(document).scrollTop() > 220 ) {

            $('#nav-home').addClass('nav-non-home', 400, 'easeInOutCubic');

        } else {

            $('#nav-home').removeClass('nav-non-home', 400, 'easeInOutCubic');

        }

    });

})();
