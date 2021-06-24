(function($) {   
    "use strict";
/*--------------------------
         Timer Top layout 2 in fashion
    ---------------------------*/

    var countDownDate = new Date("Apr 10, 2019 15:37:25").getTime();
    var x = setInterval(function() {

        var now = new Date().getTime();

        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("top-timer").innerHTML = "<span>" + days + "<span class='padding-l'>:</span></span>" + "<span>" + hours + "<span class='padding-l'>:</span></span>"
                + "<span>" + minutes + "<span class='padding-l'>:</span></span>" + "<span>" + seconds + "</span> ";

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("top-timer").innerHTML = "EXPIRED";
        }
    }, 1000);



    /*--------------------------
        Deal-timer layout 2
    ---------------------------*/

    var countDownDate2 = new Date("Aug 12, 2019 15:37:25").getTime();

    var as = setInterval(function() {

        var now = new Date().getTime();

        var distance = countDownDate2 - now;

        var days2 = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours2 = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes2 = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds2 = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("deal-timer").innerHTML = "<span>" + days2 + "<span class='padding-l'>:</span></span>" + "<span>" + hours2 + "<span class='padding-l'>:</span></span>"
                + "<span>" + minutes2 + "<span class='padding-l'>:</span></span>" + "<span>" + seconds2 + "</span> ";

        if (distance < 0) {
            clearInterval(as);
            document.getElementById("deal-timer").innerHTML = "EXPIRED";
        }
    }, 1000);

    /* Deal timer tow layout 2*/

    
    var countDownDate = new Date("Oct 12, 2019 15:37:25").getTime();

    var x = setInterval(function() {

        var now = new Date().getTime();

        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("deal-timer-two").innerHTML = "<span>" + days + "<span class='padding-l'>:</span></span>" + "<span>" + hours + "<span class='padding-l'>:</span></span>"
                + "<span>" + minutes + "<span class='padding-l'>:</span></span>" + "<span>" + seconds + "</span> ";

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("deal-timer-two").innerHTML = "EXPIRED";
        }
    }, 1000);
})(jQuery)