/*global $, jQuery, alert, console, document, window, html, userLang, mobile, android, androidWebView, ios, customScrollbarGlobal, stopTransitionResize, preventSwipe, openPageTransition, pageTransition, closePageTransition  */

(function ($) {

    'use strict';

    /*!document ready functions */
    $(function () {

        /*! header nav */
        $(document).on('click', '.header-nav > button', function () {
            $('.header-nav ul').toggleClass('open');
        });

    });

}(jQuery));
