/*!
 Frog Framework JS, Alpha 1.0
 Created by Ahmet Emin Yuce for the Frog Framework, http://www.frogframework.com/
 MIT License: http://en.wikipedia.org/wiki/MIT_License
*/

/*!Customize your settings: */
var
    baseUrl = '', // your base URL (optional)
    cdnUrl = '', // your CDN URL (optional)
    cdnVersion = '', // your URL version (optional)

    //auto import ffc- components
    componentImporter = true,
    cssPath = '',
    jsPath = '',

    //images
    imgPath = '',
    spriteImages = '', // single example: icons.png // multiple example: icons.png,logos.png
    spriteImageSizes = '', // single example: 640x140 // multiple example: 640x140,1000x600
    loadNonRetinaSprites = true, // if you embed your images before set false
    enableRetinaSprites = true,

    //forms
    placeHoldersforIE9 = true,

    //transitions
    transitionEffects = true,
    transitionsPreload = true,
    androidTansitionEffects = false,
    easeTime = 150,

    //page loader
    showPageLoader = true,
    pageLoaderClasses = 'rounded theme-youtestify ui-dark', // single example: rounded // multiple example: circle theme-red ui-dark

    //scroll top button
    showScrollTopButton = true,
    scrollTopButtonClasses = 'rounded',
    scrollTopIcon = 'icon xx-light fa-2x fa fa-angle-up',
    scrollTopButtonTarget = ''; // example: .my-div // if left blank default: body tag


/*global $, jQuery, alert, console, document, window */
var html, userLang, mobile = false, android = false, androidWebView = false, ios = false, customScrollbarGlobal = false, stopTransitionResize, preventSwipe, openPageTransition, pageTransition, closePageTransition, orderStaticGrids;

if (typeof jQuery === 'undefined') {
    throw new Error('Frog Framework requires jQuery');
}

(function ($) {

    'use strict';

    var
        version = $.fn.jquery.split(' ')[0].split('.'), orientationFnc,
        isMSIE = /*@cc_on!@*/false, ua = navigator.userAgent.toLowerCase();

    if ((version[0] < 2 && version[1] < 9) || (version[0] === 1 && version[1] === 9 && version[2] < 1) || (version[0] > 2)) {
        throw new Error('Frog Framework requires jQuery version 1.9.1 or higher.');
    }

    html = $('html');

    /*!user agents */
    userLang = (navigator.language || navigator.userLanguage).split('-')[0];

    if (ua.indexOf('firefox') > -1) { html.addClass('firefox'); }
    if (ua.indexOf('safari') > -1) { html.addClass('safari'); }
    if (ua.indexOf('chrome') > -1) { html.addClass('chrome').removeClass('safari'); }
    if (ua.indexOf('opera') > -1 || ua.indexOf('opr') > -1) { html.addClass('opera').removeClass('safari chrome'); }

    if (isMSIE || !!document.documentMode || ua.indexOf('edge') > -1) {
        html.addClass('ie');
        html.removeClass('chrome');
    }
    if (ua.indexOf('msie 9') > -1) { html.addClass('ie ie9'); }

    if (ua.indexOf('apple') > -1) { html.addClass('ios'); ios = true; }
    if (ua.indexOf('android') > -1) {

        if ((ua.indexOf('mozilla/5.0') > -1 && ua.indexOf('applewebkit') > -1) && (ua.indexOf('chrome') === -1)) {
            html.addClass('android-browser');
            androidWebView = true;
        }

        html.addClass('android').removeClass('ios');
        android = true;
    }

    if (ua.indexOf('mobile') > -1 || (html.hasClass('chrome android'))) {

        html.addClass('mobile').removeClass('safari');
        mobile = true;

        // orientation change event
        $(document).on('orientation.portrait');
        $(document).on('orientation.landscape');

        orientationFnc = function () {
            if (window.matchMedia('(orientation: portrait)').matches) {
                html.removeClass('landscape').addClass('portrait');
                $(document).trigger('orientation.portrait'); // set custom event
            }
            if (window.matchMedia('(orientation: landscape)').matches) {
                html.removeClass('portrait').addClass('landscape');
                $(document).trigger('orientation.landscape'); // set custom event
            }
        };

        orientationFnc();
        $(window).on('resize', orientationFnc);

    } else { html.removeClass('ios'); }

    if (navigator.appVersion.indexOf('Win') !== -1) { html.addClass('windows'); }
    if (navigator.appVersion.indexOf('Mac') !== -1) { html.addClass('mac'); }

    // transitions
    if (html.hasClass('ie9')) { transitionEffects = false; }
    if (mobile && !androidTansitionEffects && (android || androidWebView)) { transitionEffects = false; }
    if (!transitionEffects) { html.addClass('no-transitions-all'); }

    if (transitionEffects) {

        // wait page preload to start effects
        if (transitionsPreload) {
            html.addClass('no-transitions-all');
            setTimeout(function () { html.removeClass('no-transitions-all'); }, (easeTime * 2));
        }

        // close transitions on window resize
        $(window).on('resize', function () {

            clearTimeout(stopTransitionResize);
            html.addClass('no-transitions-all');
            stopTransitionResize = setTimeout(function () { html.removeClass('no-transitions-all'); });

        });

    } else { easeTime = 0; }

    /*!document ready functions */
    $(function () {

        /*! fcc- importer */
        function loadStyle(url) {

            var body, style, re;

            if ($('#ffc-styles').length === 0) {
                body = document.getElementsByTagName('body')[0];
                style = document.createElement('style');
                style.id = 'ffc-styles';
                body.appendChild(style);

            } else { style = document.getElementById('ffc-styles'); }

            re = new RegExp(url, 'g');
            if (style.innerHTML.match(re) === null) {
                style.innerHTML += '@import url("' + cdnUrl + cssPath + url + '.css' + cdnVersion + '");';
            }

        }

        function loadScript(url) {

            if ($('#' + url).length === 0) {

                var script = document.createElement('script');
                script.src = cdnUrl + jsPath + url + '.js' + cdnVersion;
                script.id = url;
                document.getElementsByTagName('body')[0].appendChild(script);

            }

        }

        if (componentImporter) {

            var i, className = [];
            $('[class*="ffc-"]').each(function () {

                className = $(this).attr('class').split(' ');

                for (i = 0; i < className.length; i += 1) {
                    if (className[i].match(/ffc-/g) !== null) {

                        loadStyle(className[i]);
                        if ($(this).attr('data-script') === 'true') { loadScript(className[i]); }

                    }
                }

            });

        }

        /*!retina images */
        (function () {

            var retinaCheck = window.devicePixelRatio > 1, splitSpriteImages = spriteImages.split(','), splitSpriteImageSizes = spriteImageSizes.split(','),
                style, i, sName, sSize;

            if (retinaCheck) {

                $('.retina').each(function () {
                    var highres = $(this).attr('src').replace(/\.(png|js|jpeg|jpg)$/g, '@2x.$1');
                    $(this).attr('src', highres);
                });

            }

            if (spriteImages.length > 0 && $('.sprite').length > 0) {

                for (i = 0; i < splitSpriteImages.length; i += 1) {

                    sName = splitSpriteImages[i].split('.');
                    sSize = splitSpriteImageSizes[i].split('x');

                    if ($('.sprite[class*="' + sName[i] + '-"]').length > 0) {

                        if (enableRetinaSprites && retinaCheck) {
                            style = '<style>.sprite[class*="' + sName[0] + '-"]{background-image:url(' + cdnUrl + imgPath + sName[0] + '@2x.' + sName[1] + cdnVersion + ');background-size:' + sSize[0] + 'px ' + sSize[1] + 'px}</style>';

                        } else if (loadNonRetinaSprites) {
                            style = '<style>.sprite[class*="' + splitSpriteImages[i].split('.')[0] + '-"]{background-image:url(' + cdnUrl + imgPath + splitSpriteImages[i] + cdnVersion + ');background-size:' + sSize[0] + 'px ' + sSize[1] + 'px}</style>';
                        }
                        $('head').append(style);


                    }
                }

            }

        }());

        /*!order static grids*/
        orderStaticGrids = (function () {

            var screenW, fnc1, fnc2, p, siblings, i;

            if ($('[class*="static-"][class*="order-"]').length > 0) {

                fnc1 = function () {

                    screenW = $(window).width();

                    fnc2 = function (classType, size) {

                        if (size) {

                            $('[class*="order-' + classType + '-"]').each(function () {

                                p = $(this).parent();
                                siblings = $('> *', p);
                                i = siblings.index(this);

                                if ($(this).hasClass('order-' + classType + '-first') && i !== 0) { $(this).detach().prependTo(p).attr('data-ordered-from', i); }
                                if ($(this).hasClass('order-' + classType + '-last') && i !== (siblings.length - 1)) { $(this).detach().appendTo(p).attr('data-ordered-from', i); }

                            });

                        } else {

                            $('[class*="order-' + classType + '-"][data-ordered-from]').each(function () {

                                var o = parseInt($(this).attr('data-ordered-from'), 10), siblings = $('> *', $(this).parent());

                                if ($(this).hasClass('order-' + classType + '-first')) { siblings.eq(o).after($(this).detach()); } else { siblings.eq(o).before($(this).detach()); }
                                siblings.removeAttr('data-ordered-from');

                            });

                        }

                    };

                    fnc2('xs', screenW < 481);
                    fnc2('sm', screenW > 480 && screenW < 768);
                    fnc2('md', screenW > 767 && screenW < 960);
                    fnc2('lg', screenW > 1199);

                };

                $(window).on('resize', fnc1);
                fnc1();

            }

        }());

        /*!forms */
        (function () {

            // ie9 placeholders
            if (placeHoldersforIE9) {

                $('.ie9 [placeholder]').each(function () { $(this).parent().attr('data-placeholder', $(this).attr('placeholder')); });
                $(document).on('mousedown', '.ie9 [data-placeholder]', function () { $('[placeholder]', $(this)).focus(); });

                $(document).on({

                    keydown: function () { setTimeout(function () { if ($(this).val().length > 0) { $(this).parent().addClass('hide-placeholder'); } else { $(this).parent().removeClass('hide-placeholder'); } }, 10); },
                    blur: function () { if ($(this).val().length === 0) { $(this).parent().removeClass('hide-placeholder'); } }

                }, '.ie9 [data-placeholder] [placeholder]');

            }

            // mobile keyboard event
            $(document).on('mobilekeyboard.opened');
            $(document).on('mobilekeyboard.closed');

            // form focus color
            $(document).on({

                focus : function () {
                    if (mobile) {
                        html.addClass('mobile-keyboard');
                        $(window).trigger('mobilekeyboard.opened'); // set custom event
                    }
                    $(this).parent().addClass('form-focus');
                },
                blur : function () {
                    if (mobile) {
                        html.removeClass('mobile-keyboard');
                        $(window).trigger('mobilekeyboard.closed'); // set custom event
                    }
                    $(this).parent().removeClass('form-focus');
                }

            }, '.text > input, .select select, .select-multi select, .textarea textarea');

            // fix: buttons not clicked on form focus at mobile devices
            if (mobile) {
                $(document).on('mousedown', '.text-icon > button.icon,.text-icon > button.sprite', function (event) {

                    event.stopPropagation();
                    $(this).trigger('click');

                });
            }

            // number textbox
            $(document).on('keypress', '.text > .number', function (event) {

                var charCode;
                if (event.which) { charCode = event.which; } else { charCode = event.keyCode; }

                if (charCode !== 8 && charCode !== 46 && charCode !== 9 && charCode !== 116 && charCode !== 37 && charCode !== 39 && (charCode < 48 || charCode > 57)) { return false; }
                return true;

            });

            // file inputs
            $(document).on('change', '.file input', function () { $('span', $(this).parent()).text($(this).val()); });

            // submit form with keydown enter
            $(document).on('keydown', '.text.submit-enter', function (event) {

                var charCode;
                if (event.which) { charCode = event.which; } else { charCode = event.keyCode; }
                if (charCode === 13) { $(this).parents('form').submit(); }

            });

            $(document).on('click', '.text > .submit-icon', function (event) { $(this).parents('form').submit(); });

            // textarea counter
            $(document).on('keyup', '.textarea[data-counter] textarea', function () {

                var v = $(this).val(), total = $(this).parent().attr('data-counter'), length = (total - v.length);

                if (length <= 0) {
                    $(this).parent().attr('data-change', '0');
                    $(this).val(v.substring(0, total));
                }
                $(this).parent().addClass('change').attr('data-change', length);
                return false;

            });

            // mobile multi select
            function androidMultiSelects() {

                var titleText;
                if (userLang === 'tr') { titleText = 'ÃƒÅ“ye'; } else { titleText = 'Item(s)'; }

                if ($('.android .select-multi').length > 0) {
                    $('.android .select-multi').each(function () { $('option', $(this)).eq(0).before('<option selected disabled>' + $('option:selected', $(this)).length + ' ' + titleText + '</option>'); });
                }

                $(document).on('change', '.android .select-multi select', function () {
                    $('option', $(this)).eq(0).text(($('option:selected', $(this)).length - 1) + ' ' + titleText);
                    $(this).trigger('blur');
                });

                $(document).on('reset', '.android form', function () { $('.select-multi', $(this)).each(function () { $('option', $(this)).eq(0).text('0 ' + titleText); }); });

            }

        }());

        /*!buttons */
        (function () {

            // passive buttons
            $(document).on('click', '.btn-passive', function (event) { event.preventDefault(); event.stopPropagation(); });

            // button dropdown
            $(document).on('click', '.btn-dropdown:not(.open) > .btn', function (event) {

                event.preventDefault();
                event.stopPropagation();

                var t = $(this).parent();

                if (!t.hasClass('open')) {

                    $('.btn-dropdown.open').removeClass('open-ease');
                    setTimeout(function () {

                        $('.btn-dropdown.open').removeClass('open');
                        t.addClass('open');
                        setTimeout(function () { t.addClass('open-ease'); }, 50);

                    }, 0); // don't remove timer

                    $(document).one('click', function () {
                        t.removeClass('open-ease');
                        setTimeout(function () { t.removeClass('open'); }, easeTime);
                    });

                }

            });

            // tab buttons
            $(document).on('click', '.btn-tabs .btn-tab', function (event) {

                event.preventDefault();
                var t = $(this), target, p = $(this).parents('.btn-tabs'), classes = p.attr('data-classes'), content = $('.tab-content', p), v, h = [];

                if ($(this).is('[data-href]')) { target =  $(this).attr('data-href'); } else { target =  $(this).attr('href'); }

                $('.active', p).removeClass('active ' + classes);
                $(this).addClass('active ' + classes);
                content.css('opacity', '0');

                p.css('height', 'auto');
                h.parent = p.height();
                h.noContent = (p.height() - $('.tab-content.open', p).height());
                p.addClass('ease-height').css('height', h.parent + 'px');

                setTimeout(function () {

                    content.removeClass('open ease-opacity');
                    if (typeof target === 'undefined') { v = content.eq($('.btn-tab', p).index(t)); } else { v = $(target); }

                    v.addClass('open ease-opacity');
                    setTimeout(function () { v.css('opacity', '1'); }, easeTime);
                    h.content = v.height();

                    p.css('height', (h.noContent + h.content) + 'px');
                    setTimeout(function () { p.removeClass('ease-height'); }, easeTime);

                }, easeTime);

            });

            // portlet close button
            $(document).on('click', '.portlet-close', function () {

                var t = $(this).parent();

                t.addClass('portlet-closing ease-close-portlet');
                setTimeout(function () { t.remove(); }, (easeTime * 1.5));

            });

            // scroll top button
            if (showScrollTopButton) {

                var t, titleText, targetClick, targetScroll, btnShow, btnHide;

                if (userLang === 'tr') { titleText = 'YukarÃ„Â± DÃƒÂ¶n!'; } else { titleText = 'Back To Top!'; }
                $('body').append('<button class="scroll-top ' + scrollTopButtonClasses + ' ease-opacity" title="' + titleText + '"><i class="' + scrollTopIcon + ' ease-margin-top"></i></button>');
                t = $('.scroll-top');

                btnShow = function () {
                    if (!t.hasClass('open')) {
                        t.addClass('open');
                        setTimeout(function () { t.addClass('open-ease'); }, easeTime);
                    }
                };

                btnHide = function () {
                    if (t.hasClass('open')) {
                        t.removeClass('open-ease');
                        setTimeout(function () { t.removeClass('open'); }, easeTime);
                    }
                };

                if (scrollTopButtonTarget === '') {
                    targetClick = $('html:not(:animated),body:not(:animated)');
                    targetScroll = $(window);

                } else {
                    targetClick = $(scrollTopButtonTarget);
                    targetScroll = $(scrollTopButtonTarget + ':not(:animated)');
                }

                $('.scroll-top').on('click', function () { targetClick.stop().animate({scrollTop: '0'}, 400); });
                targetScroll.on('scroll', function () { if ($(this).scrollTop() > 50) { btnShow(); } else { btnHide(); } });

            }

        }());

        /*!page loader*/
        (function () {

            if (showPageLoader) {

                $('body').append('<div class="page-loader ' + pageLoaderClasses + ' ui-text open"></div>');

                var p = $('.page-loader'), pageLoaderInt, intCount = 0;
                if (localStorage.pageLoaderCount) { intCount = localStorage.getItem('pageLoaderCount'); }
                p.css('width', intCount + '%');

                $(window).on('load', function (event) {

                    setTimeout(function () {

                        p.addClass('ease-width');
                        p.css('width', '100%');

                        setTimeout(function () {

                            p.removeClass('ease-width');
                            p.addClass('ease-opacity ease-slow');
                            p.removeClass('open ease-opacity');
                            setTimeout(function () {

                                p.removeClass('ease-opacity ease-slow');
                                p.css('width', '0');
                                intCount = 0;
                                localStorage.setItem('pageLoaderCount', 0);

                            }, (easeTime * 2));

                        }, (easeTime * 2));

                    }, easeTime);

                });

                $(window).on('beforeunload', function (event) {

                    p.addClass('ease-width open');
                    pageLoaderInt = setInterval(function () {

                        intCount += 10;
                        p.css('width', intCount + '%');
                        localStorage.setItem('pageLoaderCount', intCount);
                        if (intCount >= 90) { intCount = 90; clearInterval(pageLoaderInt); }
                        p.css('width', intCount + '%');

                    }, 150);

                });

            }

        }());

        /*!page transitions */
        openPageTransition = function (target) {
            html.addClass(target + ' ' + target + '-opened');
        };

        pageTransition = function (target, time) {

            if (typeof time === 'undefined') { time = easeTime; }
            time += 50; // absorb time

            if (!html.hasClass(target)) {
                html.addClass(target + ' ' + target + '-opened');

            } else {
                html.removeClass(target);
                html.addClass(target + '-close');

                setTimeout(function () {
                    html.removeClass(target + '-opened ' + target + '-close');
                }, time);
            }

        };

        closePageTransition = function (target, time) {

            if (typeof time === 'undefined') { time = easeTime; }
            time += 50; // absorb time

            html.removeClass(target);
            html.addClass(target + '-close');

            setTimeout(function () {
                html.removeClass(target + '-opened ' + target + '-close');
            }, time);

        };

        /*!swatches */
        $(document).on({

            mouseenter: function () {

                var currentColor = $(this).css('background-color'), r, g, b, hoverColor = (currentColor.slice(currentColor.indexOf('(') + 1, currentColor.indexOf(')')).split(','));

                if ($(this).is('[style]')) { $(this).attr('data-style', $(this).attr('style')); }

                r = parseInt(hoverColor[0], 10);
                g = parseInt(hoverColor[1], 10);
                b = parseInt(hoverColor[2], 10);

                $(this).css('background-color', 'rgba(' + (r - 11) + ',' + (g - 11) + ',' + (b - 11) + ',.65)');

            },
            mouseleave: function () {

                if ($(this).is('[data-style]')) {

                    $(this).attr('style', $(this).attr('data-style'));
                    $(this).removeAttr('data-style');

                } else { $(this).removeAttr('style'); }

            }

        }, '[class*="theme-"] .ui-hover,[class*="theme-"].ui-hover,a[class*="ui-"]:not(.ui-text),.btn[class*="ui-"],.ui-button');

        /*!prevent swipe events on scrollbars */
        (function () {

            var preventInt;
            $('.table-responsive,.h-scroll').on('scroll', function () {

                clearTimeout(preventInt);
                preventSwipe = true;
                preventInt = setTimeout(function () { preventSwipe = false; }, 300);

            });

        }());

        /*!plugins */

        // custom events plugin
        $.fn.customEvents = function (options) {

            var touchStartx, touchStarty, tapClicked,
                settings = $.extend({
                    swipeLeft: function () {},
                    swipeRight: function () {},
                    tap: function () {}
                }, options);

            tapClicked = false;

            this.on('touchstart', function (event) {

                tapClicked = true;
                touchStartx = event.originalEvent.changedTouches[0].pageX;
                touchStarty = event.originalEvent.changedTouches[0].pageY;

            });

            function direction(event, swipeSize) {

                var touches = event.originalEvent.changedTouches[0], touchX = touches.pageX;
                if (Math.abs(touchStarty - touches.pageY) > 10 || preventSwipe) { return false; }
                if (touchX < touchStartx && (touchStartx - touchX) > swipeSize) { settings.swipeLeft.call(); }
                if (touchX > touchStartx && (touchX - touchStartx) > swipeSize) { settings.swipeRight.call(); }

            }

            this.on('touchmove', function (event) {

                tapClicked = false;

                // swipe support for android
                if (android) { direction(event, 15); }

                // swipe support for android web view
                if (androidWebView) { direction(event, 5); }

            });

            this.on('touchend', function () {
                if (tapClicked) {
                    tapClicked = false;
                    settings.tap.call();
                }
            });

            this.on('touchend touchcancel', function (event) {
                direction(event, 30);
            });

            return this;

        };

        // custom scrollbars plugin
        if (!mobile && (html.hasClass('ie') || html.hasClass('firefox'))) { html.addClass('scrollbar-js'); }

        $.fn.customScrollbar = function () {

            if (html.hasClass('scrollbar-js')) {

                var trackWidthStart, scrollThumb = function (t) {

                    var h = t[0].offsetHeight, s = t[0].scrollHeight, r = (h / s), st = $('.scrollbar-thumb', t.parent()), stHeight;

                    if ((h * r) > 8) { stHeight = (h * r); } else { stHeight = 8; }
                    st.css({'height': stHeight, 'top': (t.scrollTop() * r) + 'px'});
                    if (h === s) { st.addClass('hidden'); } else { st.removeClass('hidden'); }

                };

                if (!this.hasClass('custom-scrollbar')) { this.addClass('custom-scrollbar'); }

                this.each(function () {

                    if ($(this).hasClass('v-scroll')) {

                        trackWidthStart = $(this).width();

                        if (!$(this).parent().hasClass('custom-scrollbar-holder')) {
                            $(this).wrap('<div class="custom-scrollbar-holder"></div>');
                            $(this).parent().append('<span class="scrollbar-thumb ease-bg"></span>');

                            if ($(this).hasClass('hide-track')) {
                                $(this).removeClass('hide-track').parent().addClass('hide-track');
                                $(this).css({'padding-right': '+=17px'});

                            } else if ($(this).hasClass('large-track')) {
                                $(this).removeClass('large-track').parent().addClass('large-track');
                                $(this).css({'padding-right': '+=12px'});

                            } else { $(this).css({'padding-right': '+=8px'}); }

                        }

                        scrollThumb($(this));

                    }

                });

                this.on('scroll', function () { if (!html.hasClass('no-user-select')) { scrollThumb($(this)); } });

                if (!customScrollbarGlobal) { // loaded once a time

                    customScrollbarGlobal = true;
                    $(window).on('resize', function () { $('.custom-scrollbar').each(function () { scrollThumb($(this)); }); });

                    $(document).on('mousedown', '.scrollbar-thumb', function (event) {

                        var t = $(this), s = $('.custom-scrollbar', t.parent()), h = s[0].offsetHeight,
                            yPos = s.offset().top, mouseYmax = (h - t.height()), mouseStartY = (t.offset().top - event.pageY), mouseStartX = event.pageX;

                        html.addClass('no-user-select');
                        $('body').append('<div class="document-holder"></div>');

                        $(document).on('mousemove.customScrollThumb', function (event) {
                            event.preventDefault();
                            if (Math.abs(mouseStartX - event.pageX, 10) < 140) {

                                if ((event.pageY + mouseStartY) > (mouseYmax + yPos)) { t.css('top', mouseYmax + 'px'); } else if ((event.pageY + mouseStartY) < yPos) { t.css('top', '0'); } else { t.css('top', ((event.pageY + mouseStartY) - yPos) + 'px'); }
                                s.scrollTop(parseInt(t.css('top'), 10) / (h / s[0].scrollHeight));

                            } else { t.css('top', '0'); s.scrollTop(0); }

                        });

                        $(document).one('mouseup', function (event) {

                            $(document).off('mousemove.customScrollThumb');
                            html.removeClass('no-user-select');
                            $('.document-holder').remove();

                        });

                    });

                }

            }

            return this;

        };

    });

}(jQuery));
