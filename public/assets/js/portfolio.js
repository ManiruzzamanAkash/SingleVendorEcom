(function($) {   
    "use strict";
    /*------------------------------
    Portfolio 
    -------------------------------*/
    $(document).ready(function() {
        $('.zoom-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function(item) {
                    return item.el.attr('title') + ' &middot;';
                }
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300, // don't foget to change the duration also in CSS
                opener: function(element) {
                    return element.find('img');
                }
            }
        });
    });

    $(".b-top" ).parent().addClass('bg-top');
    $(".b-bottom" ).parent().addClass('bg-bottom');
    $(".b-center" ).parent().addClass('bg-center');

    $(document).ready(function(){

            $(".filter-button").click(function(){
                $(this).addClass('active').siblings('.active').removeClass('active');
                var value = $(this).attr('data-filter');
                if(value == "all")
                {
                    $('.filter').show('1000');
                }
                else
                {
                    $(".filter").not('.'+value).hide('3000');
                    $('.filter').filter('.'+value).show('3000');
                }
            });

            $("#formButton").click(function(){
                $("#form1").toggle();
            });
    });

})(jQuery)