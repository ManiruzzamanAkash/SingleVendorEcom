<nav class="bg-dark sticky-top">
    <div class="container text-center text-light">
        <div class="pull-left">
            <a href="{{ route('search') }}?search=&offer=50" style="font-size: 12px; color: #fff">
                Extra 50% off Sale, prices as marked | Get the sale right now !!
            </a>
        </div>
        <div class="pull-right">
            @if (!Auth::check())
                <a href="{{ route('login') }}" class="text-white mr-2" style="font-size: 12px; color: #fff">
                    Sign In
                </a>
                <a href="{{ route('register') }}" class="text-white mr-2" style="font-size: 12px; color: #fff">
                    Sign Up
                </a>
            @endif
        </div>
        <div class="clearfix"></div>
    </div> 
</nav>