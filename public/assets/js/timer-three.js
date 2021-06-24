(function($) {   
    "use strict";
    const secondv2 = 1000,
        minutev2 = secondv2 * 60,
        hourv2 = minutev2 * 60,
        dayv2 = hourv2 * 24;

        let countDownv2 = new Date('Aug 15, 2019 00:00:00').getTime(),
        x = setInterval(function() {

        let now = new Date().getTime(),
        distance = countDownv2 - now;

        document.getElementById('days-v2').innerText = Math.floor(distance / (dayv2)),
        document.getElementById('hours-v2').innerText = Math.floor((distance % (dayv2)) / (hourv2)),
        document.getElementById('minutes-v2').innerText = Math.floor((distance % (hourv2)) / (minutev2)),
        document.getElementById('seconds-v2').innerText = Math.floor((distance % (minutev2)) / secondv2);
    }, secondv2);

})(jQuery)