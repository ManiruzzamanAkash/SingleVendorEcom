(function($) {   
    "use strict";
    var countDownDate = new Date("Apr 10, 2019 15:37:25").getTime();
    var x = setInterval(function() {

        var now = new Date().getTime();

        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("coming-timer").innerHTML = "<span>" + days + "<span class='padding-l'>:</span></span>" + "<span>" + hours + "<span class='padding-l'>:</span></span>"
                + "<span>" + minutes + "<span class='padding-l'>:</span></span>" + "<span>" + seconds + "</span> ";

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("coming-timer").innerHTML = "EXPIRED";
        }
    }, 1000);
})(jQuery)