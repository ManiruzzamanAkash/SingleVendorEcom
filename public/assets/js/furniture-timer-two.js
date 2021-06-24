(function($) {   
    "use strict";
/* Furniture Today’s Hot Deal timer two */
const second4 = 1000,
    minute4 = second4 * 60,
    hour4 = minute4 * 60,
    day4 = hour4 * 24;

    let countDown4 = new Date('Jun 07, 2019 00:00:00').getTime(),
    z = setInterval(function() {

    let now = new Date().getTime(),
    distance = countDown4 - now;

    document.getElementById('days-v2').innerText = Math.floor(distance / (day4)),
    document.getElementById('hours-v2').innerText = Math.floor((distance % (day4)) / (hour4)),
    document.getElementById('minutes-v2').innerText = Math.floor((distance % (hour4)) / (minute4)),
    document.getElementById('seconds-v2').innerText = Math.floor((distance % (minute4)) / second4);
  

}, second4);
})(jQuery)