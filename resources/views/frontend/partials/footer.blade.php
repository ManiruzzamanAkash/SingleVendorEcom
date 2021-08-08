<footer id="footer">
    <div class="container">
        <div class="row">
            <!-- About Us Section Start -->
            <div class="col-3">
                <h4 class="secName">About</h4>
                <div class="footer-links"><a href="#">Contect Us</a></div>
                <div class="footer-links"><a href="#">About Us</a></div>
                <div class="footer-links"><a href="#">Report us</a></div>
            </div>
            <div class="col-3">
                <h4 class="secName">Policy</h4>
                <div class="footer-links"><a href="#">Security</a></div>
                <div class="footer-links"><a href="#">Privacy</a></div>
                <div class="footer-links"><a href="#">Shipping</a></div>
                <div class="footer-links"><a href="#">Payments</a></div>
            </div>
            <div class="col-3">
                <h4 class="secName">Help</h4>
                <div class="footer-links"><a href="#">How to shop?</a></div>
                <div class="footer-links"><a href="#">Terms & Conditions</a></div>
                <div class="footer-links"><a href="#">Coupon?</a></div>
            </div>
            <div class="col-3">
                <h4 class="secName">Shop by</h4>
                <div class="footer-links"><a href="#">Sitemap</a></div>
                <div class="footer-links"><a href="#">Brands</a></div>
            </div>
        </div>
        <div class="pull-right">
            <div class="social-body pt-3">
                {{-- <label class="d-block text-white">Social follow</label> --}}
                <a href="{{ $settings->website->social->facebook }}" target="_blank" ><i class="fab fa-facebook-square"></i></a>
                <a href="{{ $settings->website->social->instagram }}" target="_blank" ><i class="fab fa-instagram"></i></a>
                <a href="{{ $settings->website->social->twitter }}" target="_blank" ><i class="fab fa-twitter"></i></a>
                <a href="{{ $settings->website->social->youtube }}" target="_blank" ><i class="fab fa-youtube"></i></a>    
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</footer>
<div class="copyright">
    
    <div class="footer-logo">
        <a href="{{ route('index') }}">
            <img src="{{ asset('images/logo.png') }}" style="height: 60px;">
        </a> 
        <p class="text-white text-uppercase">
            {{ config('app.name') }}
        </p>   
    </div>
    <div class="text-center text-white">
        {{ $settings->website_footer_text }}
    </div>
</div>
<a href="#" id="scroll-top">
    <i class="fa fa-chevron-up"></i>
</a>