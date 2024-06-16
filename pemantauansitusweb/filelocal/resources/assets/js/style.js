(function($) {

    "use strict";

    /*================================
    Preloader
    ==================================*/
  
    var preloader = $('#preloader');
    $(window).on('load', function() {
        setTimeout(function() {
          preloader.fadeOut('slow', function() { $(this).remove(); });
        }, 300);
    });
  
    /*================================
    Sidebar Collapsing
    ==================================*/
  
    if (window.innerWidth <= 1364) {
        $('.page-container').addClass('sbar_collapsed');
    }
    $('.nav-btn').on('click', function() {
        $('.page-container').toggleClass('sbar_collapsed');
    });
  
    /*================================
    Start Footer Resizer
    ==================================*/
  
    var event = function() {
        var event = (window.innerHeight > 0 ? window.innerHeight : this.screen.height) - 5;
        (event -= 67) < 1 && (event = 1), event > 67 && $(".main-content").css("min-height", event + "px")
    };
    $(window).ready(event), $(window).on("resize", event);
  
    /*================================
    Sidebar Menu
    ==================================*/
  
    $("#menu").metisMenu();
  
    /*================================
    Slimscroll Activation
    ==================================*/
  
    $('.menu-inner').slimScroll({
        height: 'auto'
    });
    $('.nofity-list').slimScroll({
        height: '435px'
    });
    $('.timeline-area').slimScroll({
        height: '500px'
    });
    $('.recent-activity').slimScroll({
        height: 'calc(100vh - 114px)'
    });
    $('.settings-list').slimScroll({
        height: 'calc(100vh - 158px)'
    });
  
    /*================================
    Stickey Header
    ==================================*/
  
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop(),
            mainheader = $('#sticky-header'),
            mainheaderheight = mainheader.innerHeight();
        if (scroll > 1) {
            $("#sticky-header").addClass("sticky-menu");
        } else {
            $("#sticky-header").removeClass("sticky-menu");
        }
    });
  
    /*================================
    Form Bootstrap Validation
    ==================================*/
  
    $('[data-toggle="popover"]').popover()
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
  
    /*================================
    Slicknav Mobile Menu
    ==================================*/
  
    $('ul#nav_menu').slicknav({
        prependTo: "#mobilemenu"
    });
  
    /*================================
    Login Form
    ==================================*/
  
    $('.form-gp input').on('focus', function() {
        $(this).parent('.form-gp').addClass('focused');
    });
    $('.form-gp input').on('focusout', function() {
        if ($(this).val().length === 0) {
            $(this).parent('.form-gp').removeClass('focused');
        }
    });
  
    /*================================
    Slider Area Background Setting
    ==================================*/
  
    $('.settings-btn, .offset-close').on('click', function() {
        $('.offset-area').toggleClass('show_hide');
        $('.settings-btn').toggleClass('active');
    });
  
    /*================================
    Owl Carousel
    ==================================*/
  
    function slider_area() {
        var owl = $('.testimonial-carousel').owlCarousel({
            margin: 50,
            loop: true,
            autoplay: false,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                450: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 2
                },
                1360: {
                    items: 1
                },
                1600: {
                    items: 2
                }
            }
        });
    }
    slider_area();
  
    /*================================
    Fullscreen Page
    ==================================*/
  
    if ($('#full-view').length) {
  
        var RequestFullscreen = function(event) {
            if (event.RequestFullscreen) {
                event.RequestFullscreen();
            } else if (event.webkitRequestFullscreen) {
                event.webkitRequestFullscreen();
            } else if (event.mozRequestFullScreen) {
                event.mozRequestFullScreen();
            } else if (event.msRequestFullscreen) {
                event.msRequestFullscreen();
            } else {
                console.log('Fullscreen API is not supported.');
            }
        };
  
        var ExitFullscreen = function() {
            if (document.ExitFullscreen) {
                document.ExitFullscreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else {
                console.log('Fullscreen API is not supported.');
            }
        };
  
        var fsdocbutton = document.getElementById('full-view');
        var fsexitdocbutton = document.getElementById('full-view-exit');
  
        fsdocbutton.addEventListener('click', function(event) {
            event.preventDefault();
            RequestFullscreen(document.documentElement);
            $('body').addClass('expanded');
        });
  
        fsexitdocbutton.addEventListener('click', function(event) {
            event.preventDefault();
            ExitFullscreen();
            $('body').removeClass('expanded');
        });
    }
  
})(jQuery);