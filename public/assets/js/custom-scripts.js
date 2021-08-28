flag = true;
(function ($) {
    "use strict";

    function top_banner() {
        if (flag) {
            if (localStorage.getItem('visited') !== true) {
                $('.top-banner').show();
                sessionStorage.setItem('visited', false);
            } else {
                $('.top-banner').hide();
                sessionStorage.setItem('visited', true);
            }
            $(".close-button").on("click", function () {
                $(this).fadeOut(100);
                $('.top-banner').slideUp(1000);
                localStorage.setItem('visited', false);
            });
            $(window).on('beforeunload', function () {
                localStorage.removeItem('visited');
            });
        }
    }

    $(document).ready(function () {
        top_banner();
    });

    //--------top banner toggle-------------------//

    // $(window).scroll(function() {
    //         var scroll = $(window).scrollTop();
    //         if (scroll >= 10) {
    //             $(".mega-page-width").css('position', 'absolute');
    //         } else {
    //             $(".navbar").removeClass("darkHeader");
    //         }
    //     });

    /*----------------------------------------
        GO to Home
    ----------------------------------------*/
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 200) {
            $('.tap-top').fadeIn();
        } else {
            $('.tap-top').fadeOut();
        }
    });
    $('.tap-top').on('click', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 50);
        return false;
    });

    /*----------------------------------------
         Pre Loader
    ----------------------------------------*/
    $(window).on('load', function () {
        $('#loader-wrapper').fadeOut('slow');
        $('#loader-wrapper').remove('slow');
    });

    /*--------------------------
    blog scripts
    ----------------------------*/
    // $('.slide-1').slick({
    //     infinite: true,
    //     margin: 1
    // });

    // $('.slide-2').slick({
    //     infinite: true,
    //     slidesToShow: 2,
    //     slidesToScroll: 2,
    //     margin: 15,
    //     responsive: [{
    //         breakpoint: 991,
    //         settings: {
    //             slidesToShow: 1,
    //             slidesToScroll: 1
    //                 // margin:0
    //         }
    //     }]
    // });

    // $('.slide-3').slick({
    //     infinite: true,
    //     speed: 300,
    //     slidesToShow: 3,
    //     slidesToScroll: 1,
    //     nav: true,
    //     margin: 15,
    //     responsive: [{
    //             breakpoint: 1220,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 2
    //             }
    //         },
    //         {
    //             breakpoint: 1210,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 3,
    //                 autoplay: true,
    //                 autoplaySpeed: 2000
    //             }
    //         },
    //         {
    //             breakpoint: 992,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 3,
    //                 autoplay: true,
    //                 autoplaySpeed: 2000
    //             }
    //         },
    //         {
    //             breakpoint: 768,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 2,
    //                 autoplay: true,
    //                 autoplaySpeed: 2000
    //             }
    //         },
    //         {
    //             breakpoint: 576,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1,
    //                 autoplay: true,
    //                 autoplaySpeed: 2000
    //             }
    //         },
    //         {
    //             breakpoint: 480,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1,
    //                 autoplay: true,
    //                 autoplaySpeed: 2000
    //             }
    //         }

    //     ]
    // });

    // $('.slide-4').slick({
    //     infinite: true,
    //     speed: 300,
    //     slidesToShow: 4,
    //     slidesToScroll: 1,
    //     autoplay: true,
    //     autoplaySpeed: 3000,
    //     responsive: [{
    //             breakpoint: 1200,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 3
    //             }
    //         },
    //         {
    //             breakpoint: 991,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 2,
    //                 autoplay: true,
    //                 autoplaySpeed: 2000
    //             }
    //         },
    //         {
    //             breakpoint: 586,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1,
    //                 margin: 0,
    //                 autoplay: true,
    //                 autoplaySpeed: 2000
    //             }
    //         }
    //     ]
    // });

    // $('.team-4').slick({
    //     infinite: true,
    //     speed: 300,
    //     slidesToShow: 4,
    //     slidesToScroll: 1,
    //     autoplay: true,
    //     autoplaySpeed: 3000,
    //     margin: 15,
    //     responsive: [{
    //             breakpoint: 1200,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 3,
    //             }
    //         },
    //         {
    //             breakpoint: 991,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 2,
    //                 autoplay: true,
    //                 autoplaySpeed: 2000
    //             }
    //         },
    //         {
    //             breakpoint: 586,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1,
    //                 autoplay: true,
    //                 autoplaySpeed: 2000
    //             }
    //         }
    //     ]
    // });

    // $('.slide-5').slick({
    //     dots: false,
    //     infinite: true,
    //     speed: 300,
    //     slidesToShow: 5,
    //     slidesToScroll: 5,
    //     responsive: [{
    //             breakpoint: 1367,
    //             settings: {
    //                 slidesToShow: 4,
    //                 slidesToScroll: 4
    //             }
    //         },
    //         {
    //             breakpoint: 1024,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 3,
    //                 infinite: true,
    //                 autoplay: true,
    //                 autoplaySpeed: 2000
    //             }
    //         },
    //         {
    //             breakpoint: 600,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 3,
    //                 autoplay: true,
    //                 autoplaySpeed: 2000
    //             }
    //         },
    //         {
    //             breakpoint: 480,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 3,
    //                 autoplay: true,
    //                 autoplaySpeed: 2000
    //             }
    //         }
    //     ]
    // });

    // $('.slide-6').slick({
    //     dots: false,
    //     infinite: true,
    //     speed: 300,
    //     slidesToShow: 5,
    //     slidesToScroll: 5,
    //     responsive: [{
    //             breakpoint: 1367,
    //             settings: {
    //                 slidesToShow: 5,
    //                 slidesToScroll: 1,
    //                 loop: false,
    //                 infinite: true
    //             }
    //         },
    //         {
    //             breakpoint: 1200,
    //             settings: {
    //                 slidesToShow: 4,
    //                 slidesToScroll: 4,
    //                 infinite: true
    //             }
    //         },
    //         {
    //             breakpoint: 768,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 2,
    //                 infinite: true
    //             }
    //         },
    //         {
    //             breakpoint: 420,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 2,
    //                 margin: 0,
    //                 autoplay: true,
    //                 autoplaySpeed: 2000
    //             }
    //         }

    //     ]
    // });

    // $('.slide-7').slick({
    //     dots: false,
    //     infinite: true,
    //     speed: 300,
    //     slidesToShow: 7,
    //     slidesToScroll: 7,
    //     responsive: [{
    //             breakpoint: 1367,
    //             settings: {
    //                 slidesToShow: 6,
    //                 slidesToScroll: 6
    //             }
    //         },
    //         {
    //             breakpoint: 1024,
    //             settings: {
    //                 slidesToShow: 5,
    //                 slidesToScroll: 5,
    //                 infinite: true
    //             }
    //         },
    //         {
    //             breakpoint: 600,
    //             settings: {
    //                 slidesToShow: 4,
    //                 slidesToScroll: 4,
    //                 autoplay: true,
    //                 autoplaySpeed: 2000
    //             }
    //         },
    //         {
    //             breakpoint: 480,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 3,
    //                 autoplay: true,
    //                 autoplaySpeed: 2000
    //             }
    //         }
    //     ]
    // });

    // $('.slide-8').slick({
    //     infinite: true,
    //     slidesToShow: 8,
    //     slidesToScroll: 8,
    //     responsive: [{
    //         breakpoint: 1200,
    //         settings: {
    //             slidesToShow: 6,
    //             slidesToScroll: 6
    //         }
    //     }]
    // });

    // $('.product-slick').slick({
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     arrows: true,
    //     fade: true,
    //     asNavFor: '.slider-nav'
    // });

    // $('.slider-nav').slick({
    //     vertical: false,
    //     slidesToShow: 3,
    //     slidesToScroll: 1,
    //     asNavFor: '.product-slick',
    //     arrows: false,
    //     dots: false,
    //     focusOnSelect: true
    // });

    $("#tab-1").css("display", "Block");
    $(".default").css("display", "Block");

    $(".tabs li a").on('click', function (event) {
        event.preventDefault();
        // $('.tab_product_slider').slick('unslick');
        // $('.product-4').slick('unslick');
        // $('.product-2').slick('unslick');
        // $('.product-6').slick('unslick');
        // $('.tab-slide-3').slick('unslick');
        $(this).parent().parent().find("li").removeClass("current");
        $(this).parent().addClass("current");
        var currunt_href = $(this).attr("href");
        $('#' + currunt_href).show();
        $(this).parent().parent().parent().find(".tab-content").not('#' + currunt_href).css("display", "none");
        var slider_class = $(this).parent().parent().parent().find(".tab-content").children().attr("class").split(' ').pop();

        // $(".product-4").slick({
        //     arrows: true,
        //     dots: false,
        //     infinite: false,
        //     speed: 300,
        //     slidesToShow: 4,
        //     slidesToScroll: 1,
        //     responsive: [{
        //             breakpoint: 1200,
        //             settings: {
        //                 slidesToShow: 3,
        //                 slidesToScroll: 3
        //             }
        //         },
        //         {
        //             breakpoint: 991,
        //             settings: {
        //                 slidesToShow: 2,
        //                 slidesToScroll: 2
        //             }
        //         },
        //         {
        //             breakpoint: 420,
        //             settings: {
        //                 slidesToShow: 1,
        //                 slidesToScroll: 1
        //             }
        //         }
        //     ]
        // });

        // $('.tab-slide-3').slick({
        //     infinite: true,
        //     speed: 300,
        //     slidesToShow: 3,
        //     slidesToScroll: 1,
        //     nav: true,
        //     margin: 15,
        //     responsive: [{
        //             breakpoint: 1200,
        //             settings: {
        //                 slidesToShow: 2,
        //                 slidesToScroll: 2
        //             }
        //         },
        //         {
        //             breakpoint: 1199,
        //             settings: {
        //                 slidesToShow: 2,
        //                 slidesToScroll: 2,
        //                 margin: 0
        //             }
        //         },
        //         {
        //             breakpoint: 992,
        //             settings: {
        //                 slidesToShow: 2,
        //                 slidesToScroll: 2
        //             }
        //         },
        //         {
        //             breakpoint: 768,
        //             settings: {
        //                 slidesToShow: 2,
        //                 slidesToScroll: 2
        //             }
        //         },
        //         {
        //             breakpoint: 480,
        //             settings: {
        //                 slidesToShow: 1,
        //                 slidesToScroll: 1
        //             }
        //         }

        //     ]
        // });

    });

    // $('.product-4').slick({
    //     infinite: true,
    //     speed: 300,
    //     slidesToShow: 4,
    //     slidesToScroll: 4,
    //     autoplay: true,
    //     autoplaySpeed: 3000,
    //     responsive: [{
    //             breakpoint: 1200,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 3
    //             }
    //         },
    //         {
    //             breakpoint: 991,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 2
    //             }
    //         },
    //         {
    //             breakpoint: 420,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1
    //             }
    //         }
    //     ]
    // });

    // $('.tab-slide-3').slick({
    //     infinite: true,
    //     speed: 300,
    //     slidesToShow: 3,
    //     slidesToScroll: 1,
    //     nav: true,
    //     margin: 15,
    //     responsive: [{
    //             breakpoint: 1200,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 2
    //             }
    //         },
    //         {
    //             breakpoint: 1199,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1,
    //                 margin: 0
    //             }
    //         },
    //         {
    //             breakpoint: 992,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 3
    //             }
    //         },
    //         {
    //             breakpoint: 768,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 2
    //             }
    //         },
    //         {
    //             breakpoint: 480,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 2
    //             }
    //         }

    //     ]
    // });

    /* Collection banner */

    $('.tabs li:first-child a').trigger("click");

    //toggle menu
    $(".toggle-nav").on('click', function () {
        $('nav .sm-horizontal').css("right", "0px");
    });
    $(".back-btn").on('click', function () {
        $('nav .sm-horizontal').css("right", "-300px");
    });

    var contentwidth = jQuery(window).width();
    if ((contentwidth) < '1183') {
        jQuery('.tgl-sm h5').append('<span class="according-menu"></span>');
        jQuery('.tgl-sm').on('click', function () {
            jQuery('.tgl-sm').removeClass('active');
            jQuery('.menu-content').slideUp('normal');
            if (jQuery(this).next().is(':hidden') == true) {
                // console.log(this);
                jQuery(this).addClass('active');
                jQuery(this).next().slideDown('normal');
            }
        });
        jQuery('.menu-content').hide();
    } else {
        jQuery('.menu-content').show();
    }
    $('.category-dropdown .transparant').on('click', function (e) {
        $('.category-list.show').css("left", "0px");
    });


    /*----------------------------
    Footer
    ------------------------------*/
    var contentwidth = $(window).width();
    if ((contentwidth) <= '750') {
        $('.footer-title h4').append('<span class="according-menu"></span>');
        $('.footer-title').click(function () {
            $('.footer-title').removeClass('active');
            $('.footer-contant').slideUp('normal');
            if ($(this).next().is(':hidden') == true) {
                $(this).addClass('active');
                $(this).next().slideDown('normal');
            }
        });
        $('.footer-contant').hide();
    } else {
        $('.footer-contant').show();
    }


    /*=====================
     12 .category page
     ==========================*/
    $('.collapse-block-title').on('click', function (e) {
        e.preventDefault;
        var speed = 300;
        var thisItem = $(this).parent(),
            nextLevel = $(this).next('.collection-collapse-block-content');
        if (thisItem.hasClass('open')) {
            thisItem.removeClass('open');
            nextLevel.slideUp(speed);
        } else {
            thisItem.addClass('open');
            nextLevel.slideDown(speed);
        }
    });
    $('.color-selector li').on('click', function (e) {
        $(".color-selector li").removeClass("active");
        $(this).addClass("active");
    });
    //list layout view
    $('.list-layout-view').on('click', function (e) {
        $('.collection-grid-view').css('opacity', '0');
        $(".product-wrapper-grid").css("opacity", "0.2");
        $('.shop-cart-ajax-loader').css("display", "block");
        $('.product-wrapper-grid').addClass("list-view");
        $(".product-wrapper-grid").children().children().children().removeClass();
        $(".product-wrapper-grid").children().children().children().addClass("col-lg-12");
        setTimeout(function () {
            $(".product-wrapper-grid").css("opacity", "1");
            $('.shop-cart-ajax-loader').css("display", "none");
        }, 500);
    });
    //grid layout view
    $('.grid-layout-view').on('click', function (e) {
        $('.collection-grid-view').css('opacity', '1');
        $('.product-wrapper-grid').removeClass("list-view");
        $(".product-wrapper-grid").children().children().children().removeClass();
        $(".product-wrapper-grid").children().children().children().addClass("col-lg-3");

    });
    $('.product-2-layout-view').on('click', function (e) {
        if ($('.product-wrapper-grid').hasClass("list-view")) {} else {
            $(".product-wrapper-grid").children().children().children().removeClass();
            $(".product-wrapper-grid").children().children().children().addClass("col-lg-6");
        }
    });
    $('.product-3-layout-view').on('click', function (e) {
        if ($('.product-wrapper-grid').hasClass("list-view")) {} else {
            $(".product-wrapper-grid").children().children().children().removeClass();
            $(".product-wrapper-grid").children().children().children().addClass("col-lg-4");
        }
    });
    $('.product-4-layout-view').on('click', function (e) {
        if ($('.product-wrapper-grid').hasClass("list-view")) {} else {
            $(".product-wrapper-grid").children().children().children().removeClass();
            $(".product-wrapper-grid").children().children().children().addClass("col-lg-3");
        }
    });
    $('.product-6-layout-view').on('click', function (e) {
        if ($('.product-wrapper-grid').hasClass("list-view")) {} else {
            $(".product-wrapper-grid").children().children().children().removeClass();
            $(".product-wrapper-grid").children().children().children().addClass("col-lg-2");
        }
    });



    /*=====================
     13.filter js
     ==========================*/
    $('.filter-btn').on('click', function (e) {
        $('.collection-filter').css("left", "-15px");
    });
    $('.filter-back').on('click', function (e) {
        $('.collection-filter').css("left", "-365px");
    });
    // sidebar popup
    $('.sidebar-popup').on('click', function (e) {
        $('.open-popup').toggleClass('open');
        $('.collection-filter').css("left", "-15px");
    });
    $('.filter-back').on('click', function (e) {
        $('.collection-filter').css("left", "-365px");
        $('.sidebar-popup').trigger('click');
    });

    $('.account-sidebar').on('click', function (e) {
        $('.dashboard-left').css("left", "0");
    });
    $('.filter-back').on('click', function (e) {
        $('.dashboard-left').css("left", "-365px");
    });

    // $('.product-right-slick').slick({
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     arrows: true,
    //     fade: true,
    //     asNavFor: '.slider-right-nav'
    // });
    // if ($(window).width() > 575) {
    //     $('.slider-right-nav').slick({
    //         vertical: true,
    //         verticalSwiping: true,
    //         slidesToShow: 3,
    //         slidesToScroll: 1,
    //         asNavFor: '.product-right-slick',
    //         arrows: false,
    //         infinite: true,
    //         dots: false,
    //         centerMode: false,
    //         focusOnSelect: true
    //     });
    // } else {
    //     $('.slider-right-nav').slick({
    //         vertical: false,
    //         verticalSwiping: false,
    //         slidesToShow: 3,
    //         slidesToScroll: 1,
    //         asNavFor: '.product-right-slick',
    //         arrows: false,
    //         infinite: true,
    //         centerMode: false,
    //         dots: false,
    //         focusOnSelect: true,
    //         responsive: [{
    //             breakpoint: 576,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 1
    //             }
    //         }]
    //     });
    // }

    /*=====================
     Quantity Counter
    ==========================*/
    $('.quantity-right-plus').on('click', function () {
        var $qty = $('.qty-box .input-number');
        var currentVal = parseInt($qty.val(), 10);
        if (!isNaN(currentVal)) {
            $qty.val(currentVal + 1);
        }
    });
    $('.quantity-left-minus').on('click', function () {
        var $qty = $('.qty-box .input-number');
        var currentVal = parseInt($qty.val(), 10);
        if (!isNaN(currentVal) && currentVal > 1) {
            $qty.val(currentVal - 1);
        }
    });

    $('#main-menu').smartmenus({
        subMenusSubOffsetX: 1,
        subMenusSubOffsetY: -8
    });
    $('#main-menu2').smartmenus({
        subMenusSubOffsetX: 1,
        subMenusSubOffsetY: -8
    });
    $('#sub-menu').smartmenus({
        subMenusSubOffsetX: 1,
        subMenusSubOffsetY: -8
    });


    /* Electronics two dropdown js*/
    // if ( $(window).width() >= 1400) {
    $('.elec-cat-show-btn').on('click', function (e) {
        $('.electric-cat-show, .category-list').slideToggle("slow");
        $('.elec-cat-show-btn').toggleClass('active');
    });
    // }

    /* image to background */
    // jQuery('.img-to-bg').each(function() {
    //   var el = $(this),
    //     src = el.attr('src'),
    //     parent = el.parent();
    //     parent.css({
    //     'background-image': 'url(' + src + ')',
    //     'background-size': 'cover',
    //     'background-position': 'center'
    // });
    // el.hide();
    // });

    /*====================================
        Images background to js
    ====================================*/
    /*=====================
     05. Image to background js
     ==========================*/
    $(".bg-top").parent().addClass('b-top');
    $(".bg-bottom").parent().addClass('b-bottom');
    $(".bg-center").parent().addClass('b-center');
    $(".bg-right").parent().addClass('b-right');
    $(".bg-left").parent().addClass('b-left');
    $(".bg-size-content").parent().addClass('b_size_content');
    $(".img-to-bg").parent().addClass('bg-size');
    $(".img-to-bg.blur-up").parent().addClass('blur-up lazyload');

    jQuery('.img-to-bg').each(function () {

        var el = $(this),
            src = el.attr('src'),
            parent = el.parent();

        parent.css({
            'background-image': 'url(' + src + ')',
            'background-size': 'cover',
            'background-position': 'center',
            'background-repeat': 'no-repeat',
            'display': 'block'
        });

        el.hide();
    });

    /*=====================
     18.Add to cart
     ==========================*/
    // $('.product-box button .icon-bag').on('click', function () {
    //     $.notify({
    //         icon: 'fa fa-check',
    //         title: 'Success!',
    //         message: 'Item Successfully added to your cart'
    //     },{
    //         element: 'body',
    //         position: null,
    //         type: "success",
    //         allow_dismiss: true,
    //         newest_on_top: false,
    //         showProgressbar: true,
    //         placement: {
    //             from: "top",
    //             align: "right"
    //         },
    //         offset: 20,
    //         spacing: 10,
    //         z_index: 1031,
    //         delay: 5000,
    //         animate: {
    //             enter: 'animated fadeInDown',
    //             exit: 'animated fadeOutUp'
    //         },
    //         icon_type: 'class',
    //         template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
    //         '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
    //         '<span data-notify="icon"></span> ' +
    //         '<span data-notify="title">{1}</span> ' +
    //         '<span data-notify="message">{2}</span>' +
    //         '<a href="{3}" target="{4}" data-notify="url"></a>' +
    //         '</div>'
    //     });
    // });


    /*=====================
     19.Add to wishlist
     ==========================*/
    $('.product-box i.icon-heart').on('click', function () {

        $.notify({
            icon: 'fa fa-check',
            title: 'Success!',
            message: 'Item Successfully added in wishlist'
        }, {
            element: 'body',
            position: null,
            type: "info",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });
    });

})(jQuery);

function openSearch() {
    document.getElementById("search-overlay").style.display = "block";
}

function closeSearch() {
    document.getElementById("search-overlay").style.display = "none";
}

function openNav() {
    document.getElementById("mySidenav").classList.add('open-side');
}

function closeNav() {
    document.getElementById("mySidenav").classList.remove('open-side');
}

function openSidebarNav() {
    document.getElementById("mySidebarnav").classList.add('open-side');
}

function closebarNav() {
    document.getElementById("mySidebarnav").classList.remove('open-side');
}

function openCart() {
    console.log("GeeksforGeeks");
    document.getElementById("cart_side").classList.add('open-side');
}

function closeCart() {
    document.getElementById("cart_side").classList.remove('open-side');
}

/*=====================
     10. Add to cart quantity Counter
==========================*/

$("button.add-button").click(function () {
    $(this).next().addClass("open");
    $(".qty-input").val('1');
});
$('.quantity-right-plus').on('click', function () {
    var $qty = $(this).siblings(".qty-input");
    var currentVal = parseInt($qty.val());
    if (!isNaN(currentVal)) {
        $qty.val(currentVal + 1);
    }
});
$('.quantity-left-minus').on('click', function () {
    var $qty = $(this).siblings(".qty-input");
    var _val = $($qty).val();
    if (_val == '1') {
        var _removeCls = $(this).parents('.cart_qty');
        $(_removeCls).removeClass("open");
    }
    var currentVal = parseInt($qty.val());
    if (!isNaN(currentVal) && currentVal > 0) {
        $qty.val(currentVal - 1);
    }
});

/********************************** Masonary portfolio ****************************************/

jQuery(document).ready(function ($) {

    var myTheme = window.myTheme || {},
        $win = $(window);

    myTheme.Isotope = function () {

        // 4 column layout
        var isotopeContainer = $('.isotopeContainer');
        if (!isotopeContainer.length || !jQuery().isotope) return;
        $win.on('load', function () {
            isotopeContainer.isotope({
                itemSelector: '.isotopeSelector'
            });
            $('.isotopeFilters').on('click', 'a', function (e) {
                $('.isotopeFilters').find('.active').removeClass('active');
                $(this).parent().addClass('active');
                var filterValue = $(this).attr('data-filter');
                isotopeContainer.isotope({
                    filter: filterValue
                });
                e.preventDefault();
            });
        });

        // 3 column layout
        var isotopeContainer2 = $('.isotopeContainer2');
        if (!isotopeContainer2.length || !jQuery().isotope) return;
        $win.on('load', function () {
            isotopeContainer2.isotope({
                itemSelector: '.isotopeSelector'
            });
            $('.isotopeFilters2').on('click', 'a', function (e) {
                $('.isotopeFilters2').find('.active').removeClass('active');
                $(this).parent().addClass('active');
                var filterValue = $(this).attr('data-filter');
                isotopeContainer2.isotope({
                    filter: filterValue
                });
                e.preventDefault();
            });
        });

        // 2 column layout
        var isotopeContainer3 = $('.isotopeContainer3');
        if (!isotopeContainer3.length || !jQuery().isotope) return;
        $win.on('load', function () {
            isotopeContainer3.isotope({
                itemSelector: '.isotopeSelector'
            });
            $('.isotopeFilters3').on('click', 'a', function (e) {
                $('.isotopeFilters3').find('.active').removeClass('active');
                $(this).parent().addClass('active');
                var filterValue = $(this).attr('data-filter');
                isotopeContainer3.isotope({
                    filter: filterValue
                });
                e.preventDefault();
            });
        });

        // 1 column layout
        var isotopeContainer4 = $('.isotopeContainer4');
        if (!isotopeContainer4.length || !jQuery().isotope) return;
        $win.on('load', function () {
            isotopeContainer4.isotope({
                itemSelector: '.isotopeSelector'
            });
            $('.isotopeFilters4').on('click', 'a', function (e) {
                $('.isotopeFilters4').find('.active').removeClass('active');
                $(this).parent().addClass('active');
                var filterValue = $(this).attr('data-filter');
                isotopeContainer4.isotope({
                    filter: filterValue
                });
                e.preventDefault();
            });
        });

    };


    myTheme.Isotope();
    // myTheme.Fancybox();
});

/******************************* Scroll to fixed header *************************************/


// Recommended Product Carousel
$(".recommended-product-carousel").owlCarousel({
    loop: true,
    margin: 60,
    nav: true,
    dots: true,
    autoplay: false,
    navText: [
        '<span class="nav-icon">&#10094</span>',
        '<span class="nav-icon">&#10095</span>',
    ],
    responsive: {
        0: {
            items: 1,
            margin: 0,
        },
        600: {
            items: 2,
            margin: 10,
        },
        1000: {
            items: 3,
            margin: 20,
        },
        1200: {
            items: 3,
            margin: 20,
        },
        1600: {
            items: 3
        },
    },
});

$(document).on('scroll', function () {
    if ($(this).scrollTop() > 80) {
        $('header').addClass('fixed');
    } else {
        $('header').removeClass('fixed');
    }
});

$(function () {
    var scrollButton = $('#scroll-top');
    $(window).scroll(function () {
        $(this).scrollTop() >= 50 ? scrollButton.show() : scrollButton.hide();
    });
    scrollButton.click(function () {
        $('html,body').animate({
            scrollTop: 0
        }, 500);
        return false
    });
});

/*!
 * Bootstrap 4 multi dropdown navbar ( https://bootstrapthemes.co/demo/resource/bootstrap-4-multi-dropdown-navbar/ )
 * Copyright 2017.
 * Licensed under the GPL license
 */


$(document).ready(function () {
    $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
        var $el = $(this);
        var $parent = $(this).offsetParent(".dropdown-menu");
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');

        $(this).parent("li").toggleClass('show');

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
            $('.dropdown-menu .show').removeClass("show");
        });

        if (!$parent.parent().hasClass('navbar-nav')) {
            $el.next().css({
                "top": $el[0].offsetTop,
                "left": $parent.outerWidth() - 4
            });
        }

        return false;
    });

    $('#search-input-button').on('click', function (e) {
        $(".sidenav").css({
            width: 250,
            display: 'block'
        });
    });

    $('#search-close-nav').on('click', function (e) {
        $(".sidenav").css({
            width: 0,
            display: 'none'
        });
    });
});