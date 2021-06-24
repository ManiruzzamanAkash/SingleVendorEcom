(function($) {   
    "use strict";
    const second2 = 1000,
    minute2 = second2 * 60,
    hour2 = minute2 * 60,
    day2 = hour2 * 24;

    let countDown2 = new Date('Jun 12, 2019 00:00:00').getTime(),
    a = setInterval(function() {

    let now = new Date().getTime(),
    distance = countDown2 - now;

    document.getElementById('days').innerText = Math.floor(distance / (day2)),
    document.getElementById('hours').innerText = Math.floor((distance % (day2)) / (hour2)),
    document.getElementById('minutes').innerText = Math.floor((distance % (hour2)) / (minute2)),
    document.getElementById('seconds').innerText = Math.floor((distance % (minute2)) / second2);
  
}, second2);

})(jQuery)