@section('stylesheets')

@endsection

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top  btco-hover-menu">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="{{ asset('images/logo.png') }}" style="height: 60px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            All Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (App\Models\Category::orderBy('id', 'asc')->where('parent_id', NULL)->get() as $parent)
                            <li><a class="dropdown-item" href="{!! route('categories.show', $parent->slug) !!}">{{ $parent->name }}</a></li>
                            @php
                            $subCategories = App\Models\Category::orderBy('id', 'asc')->where('parent_id', $parent->id)->get();
                            @endphp

                            @if (count($subCategories) > 0)
                            @foreach ($subCategories as $child)
                            <li class="">
                                <a class="dropdown-item" href="{!! route('categories.show', $parent->slug) !!}">{{ $child->name }}</a>
                            </li>
                            @endforeach
                            @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>

                <ul class="navbar-nav navbar-right ml-auto mt-2 mt-lg-0">
                    <form class="form-inline my-2 my-lg-0  ml-4" action="{!! route('search') !!}" method="get">
                        <div class="form-group">
                            <input type="text" class="navbar-form search float-left" name="search" placeholder="Search Products" required="required">
                            <button type="submit" class="btn searchBtn  float-left">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>

                    {{-- <search-category-component url="{{ url('/') }}"></search-category-component> --}}

                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1">
                            <div class="crtArea commoner" onclick="location.href='{{ route('carts') }}'">
                                <i class="fa fa-shopping-cart text-secondary"></i>
                                <span class="badge counter">
                                    <cart-total-item url="{{ url('/') }}"></cart-total-item>
                                </span>
                            </div>
                        </a>
                    </li>

                    @if (Auth::check())
                        <li class="nav-item dropdown mt-2 mr-5">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Account
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a href="{{ route('user.dashboard') }}" class="dropdown-item">
                                        <i class="fa fa-user icon" aria-hidden="true"></i>
                                        My Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.profile') }}" class="dropdown-item">
                                        <i class="fa fa-cogs icon" aria-hidden="true"></i>
                                        My Account
                                    </a>
                                </li>
                                <li class="cartArea">
                                    <a href="{{ route('carts') }}" class="dropdown-item">
                                        <i class="fa fa-shopping-cart icon" aria-hidden="true"></i>
                                        My Cart
                                        <span class="badge">
                                            <cart-total-item url="{{ url('/') }}"></cart-total-item>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('wishlists') }}" class="dropdown-item">
                                        <i class="fa fa-heart icon" aria-hidden="true"></i>
                                        My wishlist
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.orders') }}" class="dropdown-item">
                                        <i class="fa fa-th-list icon" aria-hidden="true"></i>
                                        My Orders
                                    </a>
                                </li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();" class="dropdown-item">
                                        <i class="fa fa-toggle-on icon" aria-hidden="true"></i>
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


{{-- Temporary fix, @todo - Maintain with DB in  next phase --}}
@if (1 !== 1) 
    <div class="subheader">
        <div class="container holder main-menu-links">
            <ul>
                @foreach (App\Models\Category::orderBy('id', 'asc')->where('parent_id', NULL)->get() as $parent)
                <li class="">
                    <a href="{!! route('categories.show', $parent->id) !!}" class="nav-single-menu">{{ $parent->sub_header }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif