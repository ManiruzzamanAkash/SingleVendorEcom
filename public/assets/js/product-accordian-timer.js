(function($) {   
    "use strict";
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

        let countDown = new Date('Dec, 1, 2019 00:00:00').getTime(),
        a = setInterval(function() {

        let now = new Date().getTime(),
        distance = countDown - now;

        document.getElementById('pro-days').innerText = Math.floor(distance / (day)),
        document.getElementById('pro-hours').innerText = Math.floor((distance % (day)) / (hour)),
        document.getElementById('pro-minutes').innerText = Math.floor((distance % (hour)) / (minute)),
        document.getElementById('pro-seconds').innerText = Math.floor((distance % (minute)) / second);
      
    }, second);
})(jQuery)