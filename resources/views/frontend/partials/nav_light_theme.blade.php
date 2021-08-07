<div class="sticky" id="theme-light-nav-area">
    <div class="header-top">
        <div class="">
            <div class="">
                <div class="logo-area">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('images/logo.png') }}" class="logo-main">
                        <br>
                        <h2>The KINGS MAN</h2>
                    </a>
                </div>
            </div>
            <div class="header-right-icons">
                <a href="{{ route('carts') }}" class="header-right-icon"><i class="fa fa-shopping-cart"></i> 0</a>
                <a href="{{ route('login') }}" class="header-right-icon"><i class="fa fa-user"></i> SIGN IN</a>
                <a href="#" class="header-right-icon"><i class="fa fa-search"></i> Search</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="main-menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        @foreach (App\Models\Category::orderBy('id', 'asc')->where('parent_id', null)->get() as $parent)
                            <li class="nav-item">
                                <a href="{!! route('categories.show', $parent->slug) !!}" class="nav-link">{{ $parent->sub_header }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
