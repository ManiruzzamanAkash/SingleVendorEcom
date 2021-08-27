<!-- Vue App JS -->
<script src="{{ asset('public/js/app.js') }}?v={{ config('constants.asset_version') }}"></script>


<!-- latest jquery-->
{{--  <script src="{{ asset('public/assets/js/jquery-3.3.1.min.js') }}" ></script> --}}

{{--  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  --}}


<!-- popper js-->
<script src="{{ asset('public/assets/js/popper.min.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('public/assets/js/bootstrap.js') }}"></script>

<!-- slick js-->
<script src="{{ asset('public/assets/js/slick.js') }}"></script>

<!-- Lazy Load js -->
<script src="{{ asset('public/assets/js/lazysizes.js') }}"></script>

<script src="{{ asset('public/assets/js/menu.js') }}"></script>

<!-- bootstrap-notify js -->
<script src="{{ asset('public/assets/js/bootstrap-notify.min.js') }}"></script>
<!-- Custome scripts js -->


<script src="{{ asset('public/assets/js/custom-scripts.js') }}?v={{ config('constants.asset_version') }}"></script>
{{-- <script src="{{ asset('public/assets/js/timer-two.js') }}" ></script> --}}

{{-- sticky navber start --}}
<script> 
    window.onscroll = function(){navSticky()};
    var navbar = document.getElementById("navbarSticky");
    var sticky = navbar.offsetTop;
    function navSticky() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("nav-sticky")
        } else {
            navbar.classList.remove("nav-sticky");
        }
    }
</script>
{{-- sticky navber end --}}
{{-- single product slider start --}}
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
{{-- owl carousel --}}
<script>

$(".product-carousel").owlCarousel({
    loop: true,
    margin: 60,
    nav: true,
    dots: false,
    autoplay: false,
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
</script>
  