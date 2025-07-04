$(function() {
    'use strict'

    // ______________ PAGE LOADING
    $("#global-loader").fadeOut("slow");

    // ______________ Card
    const DIV_CARD = 'div.card';

    // ______________ Function for remove card
    $(document).on('click', '[data-toggle="card-remove"]', function(e) {
        let $card = $(this).closest(DIV_CARD);
        $card.remove();
        e.preventDefault();
        return false;
    });

    // ______________ Functions for collapsed card
    $(document).on('click', '[data-toggle="card-collapse"]', function(e) {
        let $card = $(this).closest(DIV_CARD);
        $card.toggleClass('card-collapsed');
        e.preventDefault();
        return false;
    });

    // ______________ Card full screen
    $(document).on('click', '[data-toggle="card-fullscreen"]', function(e) {
        let $card = $(this).closest(DIV_CARD);
        $card.toggleClass('card-fullscreen').removeClass('card-collapsed');
        e.preventDefault();
        return false;
    });

    // ______________Main-navbar
    if (window.matchMedia('(min-width: 992px)').matches) {
        $('.main-navbar .active').removeClass('show');
        $('.main-header-menu .active').removeClass('show');
    }
    $('.main-header .dropdown > a').on('click', function(e) {
        e.preventDefault();
        $(this).parent().toggleClass('show');
        $(this).parent().siblings().removeClass('show');
    });
    $('.mobile-main-header .dropdown > a').on('click', function(e) {
        e.preventDefault();
        $(this).parent().toggleClass('show');
        $(this).parent().siblings().removeClass('show');
    });
    $('.main-navbar .with-sub').on('click', function(e) {
        e.preventDefault();
        $(this).parent().toggleClass('show');
        $(this).parent().siblings().removeClass('show');
    });
    $('.dropdown-menu .main-header-arrow').on('click', function(e) {
        e.preventDefault();
        $(this).closest('.dropdown').removeClass('show');
    });
    $('#mainNavShow').on('click', function(e) {
        e.preventDefault();
        $('body').toggleClass('main-navbar-show');
    });
    $('#mainContentLeftShow').on('click touch', function(e) {
        e.preventDefault();
        $('body').addClass('main-content-left-show');
    });
    $('#mainContentLeftHide').on('click touch', function(e) {
        e.preventDefault();
        $('body').removeClass('main-content-left-show');
    });
    $('#mainContentBodyHide').on('click touch', function(e) {
        e.preventDefault();
        $('body').removeClass('main-content-body-show');
    })
    $('body').append('<div class="main-navbar-backdrop"></div>');
    $('.main-navbar-backdrop').on('click touchstart', function() {
        $('body').removeClass('main-navbar-show');
    });


    // ______________Dropdown menu
    $(document).on('click touchstart', function(e) {
        e.stopPropagation();
        var dropTarg = $(e.target).closest('.main-header .dropdown').length;
        if (!dropTarg) {
            $('.main-header .dropdown').removeClass('show');
        }
        if (window.matchMedia('(min-width: 992px)').matches) {
            var navTarg = $(e.target).closest('.main-navbar .nav-item').length;
            if (!navTarg) {
                $('.main-navbar .show').removeClass('show');
            }
            var menuTarg = $(e.target).closest('.main-header-menu .nav-item').length;
            if (!menuTarg) {
                $('.main-header-menu .show').removeClass('show');
            }
            if ($(e.target).hasClass('main-menu-sub-mega')) {
                $('.main-header-menu .show').removeClass('show');
            }
        } else {
            if (!$(e.target).closest('#mainMenuShow').length) {
                var hm = $(e.target).closest('.main-header-menu').length;
                if (!hm) {
                    $('body').removeClass('main-header-menu-show');
                }
            }
        }
    });

    // ______________MainMenuShow
    $('#mainMenuShow').on('click', function(e) {
        e.preventDefault();
        $('body').toggleClass('main-header-menu-show');
    })
    $('.main-header-menu .with-sub').on('click', function(e) {
        e.preventDefault();
        $(this).parent().toggleClass('show');
        $(this).parent().siblings().removeClass('show');
    })
    $('.main-header-menu-header .close').on('click', function(e) {
        e.preventDefault();
        $('body').removeClass('main-header-menu-show');
    })

    // ______________Tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // ______________Toast
    $(".toast").toast();

    // ______________Back-top-button
    $(window).on("scroll", function(e) {
        if ($(this).scrollTop() > 0) {
            $('#back-to-top').fadeIn('slow');
        } else {
            $('#back-to-top').fadeOut('slow');
        }
    });
    $(document).on("click", "#back-to-top", function(e) {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    // ______________Full screen
    $(document).on("click", ".fullscreen-button", function toggleFullScreen() {
        $('html').addClass('fullscreen');
        if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
            if (document.documentElement.requestFullScreen) {
                document.documentElement.requestFullScreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullScreen) {
                document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            }
        } else {
            $('html').removeClass('fullscreen');
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
    })

    // ______________Cover Image
    $(".cover-image").each(function() {
        var attr = $(this).attr('data-image-src');
        if (typeof attr !== typeof undefined && attr !== false) {
            $(this).css('background', 'url(' + attr + ') center center');
        }
    });


    // ______________Select2-Search
    $('.select2-no-search').select2({
        minimumResultsForSearch: Infinity,
        placeholder: 'All categories',
        width: '100%'
    });

    // ______________Horizontal-menu Active Class
    function addActiveClass(element) {
        if (current === "") {
            if (element.attr('href').indexOf("#") !== -1) {
                element.parents('.main-navbar .nav-item').last().removeClass('active');
                if (element.parents('.main-navbar .nav-sub').length) {
                    element.parents('.main-navbar .nav-sub-item').last().removeClass('active');
                }
                element.parents('.main-navbar .nav-sub-item .nav-sub-link.with-sub').last().removeClass('active');
                if (element.parents('.main-navbar .nav-sub .nav-sub-item  .nav-sub').length) {
                    element.parents('.main-navbar .nav-sub-item .nav-sub-item').last().removeClass('active');
                }
            }
        } else {
            if (element.attr('href').indexOf(current) !== -1) {
                element.parents('.main-navbar .nav-item').last().addClass('active');
                if (element.parents('.main-navbar .nav-sub').length) {
                    element.parents('.main-navbar .nav-sub-item').last().addClass('active');
                }
                element.parents('.main-navbar .nav-sub-item .nav-sub-link.with-sub').last().addClass('active');
                if (element.parents('.main-navbar .nav-sub .nav-sub-item  .nav-sub').length) {
                    element.parents('.main-navbar .nav-sub-item .nav-sub-item').last().addClass('active');
                }
                element.parents('.main-navbar .nav-sub-item .nav-sub-link.with-sub .nav-sub-link.with-sub').last().addClass('active');
                if (element.parents('.main-navbar .nav-sub  .nav-sub  .nav-sub').length) {
                    element.parents('.main-navbar .nav-sub-item .nav-sub-item .nav-sub-item').last().addClass('active');
                }
            }
        }
    }
    var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
    $('.main-navbar .nav li a').each(function() {
        var $this = $(this);
        addActiveClass($this);
    })


    // ______________ SWITCHER-toggle ______________//

    $(document).on("click", '#myonoffswitch51', function () {
        if (this.checked) {
            $('body').addClass('icon-style');
            $('body').removeClass('light-leftmenu');
            $('body').removeClass('dark-leftmenu');
            $('body').removeClass('color-leftmenu');
            $('body').removeClass('light-header');
            $('body').removeClass('color-header');
            $('body').removeClass('header-dark');
            localStorage.setItem("icon-style", "True");
        }
        else {
            $('body').removeClass('icon-style');
            localStorage.setItem("icon-style", "false");
        }
    });

    $(document).on("click", '#myonoffswitch52', function () {
        if (this.checked) {
            $('body').addClass('theme-style');;
            $('body').removeClass('light-leftmenu');
            $('body').removeClass('dark-leftmenu');
            $('body').removeClass('color-leftmenu');
            $('body').removeClass('light-header');
            $('body').removeClass('color-header');
            $('body').removeClass('header-dark');
        }
        else {
            $('body').removeClass('theme-style');
            localStorage.setItem("theme-style", "false");
        }
    });



    $('#background1').on('click', function() {
        $('body').addClass('color-leftmenu');
        $('body').removeClass('light-leftmenu');
        $('body').removeClass('dark-leftmenu');
        $('body').removeClass('light-header');
        $('body').removeClass('color-header');
        $('body').removeClass('header-dark');
        return false;
    });

    $('#background2').on('click', function() {
        $('body').addClass('light-leftmenu');
        $('body').removeClass('color-leftmenu');
        $('body').removeClass('dark-leftmenu');
        $('body').removeClass('light-header');
        $('body').removeClass('color-header');
        $('body').removeClass('header-dark');
        return false;
    });


    $('#background3').on('click', function() {
        $('body').addClass('header-dark');
        $('body').removeClass('light-horizontal');
        $('body').removeClass('color-leftmenu');
        $('body').removeClass('light-leftmenu');
        $('body').removeClass('color-horizontal');
        $('body').removeClass('color-header');
        return false;
    });

    $('#background4').on('click', function() {
        $('body').addClass('color-header');
        $('body').removeClass('light-horizontal');
        $('body').removeClass('color-leftmenu');
        $('body').removeClass('light-leftmenu');
        $('body').removeClass('color-horizontal');
        $('body').removeClass('header-dark');
        return false;
    });

    $('#background5').on('click', function() {
        $('body').addClass('dark-theme');
        $('body').removeClass('light-theme');
        $('body').removeClass('light-leftmenu');
        $('body').removeClass('light-horizontal');
        $('body').removeClass('color-header');
        $('body').removeClass('header-dark');
        $('body').removeClass('color-leftmenu');
        return false;
    });

    $('#background6').on('click', function() {
        $('body').addClass('light-theme');
        $('body').removeClass('light-leftmenu');
        $('body').removeClass('light-horizontal');
        $('body').removeClass('color-header');
        $('body').removeClass('header-dark');
        $('body').removeClass('color-leftmenu');
        $('body').removeClass('dark-theme');
        return false;
    });

    $('#background7').on('click', function() {
        $('body').addClass('color-horizontal');
        $('body').removeClass('light-horizontal');
        $('body').removeClass('header-dark');
        $('body').removeClass('color-header');
        return false;
    });

    $('#background8').on('click', function() {
        $('body').addClass('light-horizontal');
        $('body').removeClass('color-horizontal');
        $('body').removeClass('header-dark');
        $('body').removeClass('color-header');
        return false;
    });


    $("a[data-theme]").click(function() {
        $("head link#theme").attr("href", $(this).data("theme"));
        $(this).toggleClass('active').siblings().removeClass('active');
    });

});