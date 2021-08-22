
$(".product-carousel").owlCarousel({
  loop: true,
  margin: 60,
  nav: true,
  dots: false,
  autoplay: true,
  navText: [
   
      '<span class=""><img  class="brand-icon prev" src="/design/img/circleright-arrow.png" style="padding: 9px" /></span>',
      '<span><img class="brand-icon next" src="/design/img/circleleft-arrow.png" style="padding: 9px" /></span>',
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
          items: 4,
          margin: 20,
      },
      1600: {
          items: 4
      },
  },
});


// counter start
jQuery(function($){
    var i = 1000;
    $('#retroclockbox1').flipcountdown();
    var i = 1;
    $('#retroclockbox_counter').flipcountdown({
        tick:function(){
            return i++;
        }
    });
    $('#retroclockbox2').flipcountdown({showHour:false,showMinute:false,showSecond:true});
    $('#retroclockbox3').flipcountdown({tzoneOffset:3,showSecond:false});
    $('#retroclockbox4').flipcountdown({am:true});
    $('#retroclockbox5').flipcountdown({speedFlip:50});
    $('#retroclockbox6').flipcountdown({tick:function(){
        return new Date('5/10/2012 12:34:23');
    }});
});

// stick-navbar
document.addEventListener("DOMContentLoaded", function(){
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
          document.getElementById('navbar_top').classList.add('fixed-top');
          // add padding top to show content behind navbar
          navbar_height = document.querySelector('.nav-text').offsetHeight;
          document.body.style.paddingTop = navbar_height + 'px';
        } else {
          document.getElementById('navbar_top').classList.remove('fixed-top');
           // remove padding top from body
          document.body.style.paddingTop = '0';
        } 
    });
  }); 
// end stickey nav
// active menu start

