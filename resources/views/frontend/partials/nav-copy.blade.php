<!-- Header -->
<header class="sm-top-space">
    <div class="header-three mobile-fix-option"></div>
    <div class="top-header theme-primary-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-12 t-hdr-cntr xs-none">
                    <div class="header-contact">
                        <ul>
                            <li>Welcome to our store</li>
                            <li class="lg-d-none">Extra 50% discount for your first order</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-6 col-12 t-hdr-cntr text-sm-center">
                    <ul class="header-dropdown">
                        <li class="mobile-wishlist"><a href="{{ route('user.dashboard') }}"><i class="fa fa-user" aria-hidden="true"></i> <span>My Account</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="theme-header theme-bg main-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-12">
                    <div class="theme-menu xs-space-tb">
                        <div class="brand-logo">
                            <a href="{{ route('index') }}"> <img src="{{ asset('public/assets/images/logo.png') }}" class="img-fluid" alt=""></a>
                        </div>
                        <div class="theme-searcbar">
                           {{--  <form class="theme-form-two d-none d-xl-block right-space">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputPassword2" placeholder="Search a Products" required="required">
                                    <button type="submit" class="btn btn-theme in-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </form> --}}

                            <search-component url="{{ url('/') }}"></search-component>

                            <div class="icon-nav-cart dark-theme-icon box-icon">
                                <ul class="header-three">
                                    <li class="fix-top searchbox">
                                        <div class="searchbox-md d-xl-none" title="Quick Search">
                                            <i class="flaticon flaticon-search" onclick="openSearch()"></i>
                                        </div>
                                    </li>
                                    <li class="fix-top toggle-nav">
                                        <div>
                                            <i class="flaticon flaticon-menu"></i>
                                        </div>
                                    </li>
                                    <li class="fix-top wishlist">
                                        <a href="{{ route('wishlists') }}" title="Add to wishlist">
                                            <i class="flaticon flaticon-favorite-heart-button"></i>
                                        </a>
                                    </li>
                                    <li class="fix-top onhover-div mobile-cart">
                                        <div title="Go To Cart" class="cart-icon" onclick="location.href='{{ route('carts') }}'">
                                            <i class="flaticon flaticon-shopping-bag"></i>
                                            <span class="cart-add">
                                                <cart-total-item></cart-total-item>
                                            </span>                                                    
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="bg-light-menu">
            <div class="container">
                <div class="row">                        
                    <div class="col-sm-12">
                        <div class="menu-classic d-flex col-side-btn">
                            <div class="dropdown category-dropdown theme-header-two sm-space-tb">
                                <button class="btn transparant" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Shop by Category <i class="fa fa-bars d-inline-block" aria-hidden="true"></i></span> <i class="fa fa-bars sidebar-bar"></i></button>
                                <div class="dropdown-menu category-list header-two" aria-labelledby="dropdownMenuButton">
                                    <ul id="sub-menu" class="sm pixelstrap sm-vertical home-header sm-horizontal">
                                        <li class="main-menu-hover d-md-none">
                                            <div>
                                                <div class="sidebar-back text-left">
                                                    <i class="fa fa-angle-left pr-2" aria-hidden="true"></i> Back
                                                </div>
                                            </div>
                                        </li>
                                        <li class="drop-dwn-menu">
                                            <a href="#" >Fashion</a>
                                            <ul class="sub-drop-menu">
                                                <li><a href="#">Man</a>
                                                    <ul>
                                                        <li><a href="#">Cloths</a></li>
                                                        <li><a href="#">Shoes</a></li>
                                                        <li><a href="#">Whatches</a></li>
                                                        <li><a href="#">Top , T-Shirts & Shirts</a></li>
                                                        <li><a href="#">Accessories</a></li>
                                                        <li><a href="#">Uniforms</a></li>
                                                        <li><a href="#">Big & tall</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Woman</a>
                                                    <ul>
                                                        <li><a href="#">Cloths</a></li>
                                                        <li><a href="#">Shoes</a></li>
                                                        <li><a href="#">Jewelry</a></li>
                                                        <li><a href="#">Accessories</a></li>
                                                        <li><a href="#">watches</a></li>
                                                        <li><a href="#">Handbag</a></li>
                                                        <li><a href="#">plusesize</a></li>
                                                        <li><a href="#">Top , T-Shirts & Shirts</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Kid's Clothing</a></li>    
                                                <li><a href="#">Shoe</a></li>
                                                <li><a href="#">Footwear</a></li>
                                                <li><a href="#">Accessories</a></li>
                                            </ul>
                                        </li>
                                        <li class="main-menu-hover">
                                            <a href="#" class="menu-title">Electronoics</a>
                                            <ul class="mega-menu full-mega-menu mega-page-width space-left">
                                                <li>
                                                    <div class="container">
                                                        <div class="row space-top">
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="menu-title">
                                                                        <h5>Electronics</h5>
                                                                    </div> 
                                                                    <ul class="submenu-header-show">
                                                                        <li><a href="#">Mobile</a></li>
                                                                        <li><a href="#">Gaming Accessories</a></li>
                                                                        <li><a href="#">Tablets</a></li>
                                                                        <li><a href="#">Network Components</a></li>
                                                                        <li><a href="#">Featured Products</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="menu-title">
                                                                        <h5>Computers</h5>
                                                                    </div>
                                                                    <ul>
                                                                        <li><a href="#">External Hard Disks</a></li>
                                                                        <li><a href="#">Pendrives</a></li>
                                                                        <li><a href="#">Laptop Skins & Decals</a></li>
                                                                        <li><a href="#">Laptop Bags</a></li>
                                                                        <li><a href="#">Mouse</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="menu-title">
                                                                        <h5>Camera</h5>
                                                                    </div>
                                                                    <ul>
                                                                        <li><a href="#">DSLR</a></li>
                                                                        <li><a href="#">Syber shot camera</a></li>
                                                                        <li><a href="#">IP camera</a></li>
                                                                        <li><a href="#">Sport and action </a></li>
                                                                        <li><a href="#">Instant camera</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="menu-title">
                                                                        <h5>Lights</h5>
                                                                    </div>
                                                                    <ul>
                                                                        <li><a href="#">Smart lights</a></li>
                                                                        <li><a href="#">LED lights</a></li>
                                                                        <li><a href="#">Decorative Lights</a></li>
                                                                        <li><a href="#">Emergency Lights</a></li>
                                                                        <li><a href="#">Interior Lights</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>                                                                                 
                                        <li class="drop-dwn-menu">
                                            <a href="#" >Footwear</a>
                                            <ul class="sub-drop-menu">
                                                <li><a href="#">Sport shoes</a></li>
                                                <li><a href="#">Casual shoes</a></li>
                                                <li><a href="#">Formal shoes</a></li>
                                                <li><a href="#">Sandels shoes</a></li>
                                                <li><a href="#">Flip Flops shoes</a></li>
                                            </ul>
                                        </li>
                                        <li class="main-menu-hover">
                                            <a href="#" class="menu-title">Accessories</a>
                                            <ul class="mega-menu full-mega-menu mega-page-width space-left">
                                                <li>
                                                    <div class="container">
                                                        <div class="row space-top">
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="menu-title">
                                                                        <h5>Books</h5>
                                                                    </div>
                                                                    <ul class="submenu-header-show">
                                                                        <li><a href="#">Academic</a></li>
                                                                        <li><a href="#">Indian Writing</a></li>
                                                                        <li><a href="#">Children</a></li>
                                                                        <li><a href="#">Non-Fiction</a></li>
                                                                        <li><a href="#">Literature & Fiction</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="menu-title">
                                                                        <h5>Sports</h5>
                                                                    </div>
                                                                    <ul>
                                                                        <li><a href="#">Cricket</a></li>
                                                                        <li><a href="#">Swimming</a></li>
                                                                        <li><a href="#">Football</a></li>
                                                                        <li><a href="#">Skating</a></li>
                                                                        <li><a href="#">Camping & Hiking</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="menu-title">
                                                                        <h5>Music</h5>
                                                                    </div>
                                                                    <ul>
                                                                        <li><a href="#">International Music</a></li>
                                                                        <li><a href="#">Bollywood Music</a></li>
                                                                        <li><a href="#">Guitar Music</a></li>
                                                                        <li><a href="#">Piano Music</a></li>
                                                                        <li><a href="#">All Music</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="menu-title">
                                                                        <h5>Stationery</h5>
                                                                    </div>
                                                                    <ul>
                                                                        <li><a href="#">Pen , Pencil</a></li>
                                                                        <li><a href="#">Diaries</a></li>
                                                                        <li><a href="#">Calculators</a></li>
                                                                        <li><a href="#">Key chaines</a></li>
                                                                        <li><a href="#">Gum , Stikers</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="drop-dwn-menu"><a href="#">Home, Kitchen, Pets</a></li>
                                        <li class="drop-dwn-menu"><a href="#">Appliances, Electronics</a></li>
                                        <li class="drop-dwn-menu"><a href="#">Toys, Baby Products</a></li>
                                        <li class="drop-dwn-menu"><a href="#">Car, Motorbike, Industrial</a></li>
                                        <li class="drop-dwn-menu"><a href="#">mobiles, computers</a></li>
                                        <li class="drop-dwn-menu"><a href="#">Art's</a></li>
                                        <li class="drop-dwn-menu"><a href="#"><b>More Menu</b></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lg-left left-space-menu">
                                <nav class="theme-home-menu lg-left-0 header-three-style sub-mega-menu-fix">
                                    <ul id="main-menu" class="sm pixelstrap home-header  sm-horizontal home-2">
                                        <li class="main-menu-hover">
                                            <div class="mobile-back text-right back-btn">
                                                Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i>
                                            </div>
                                        </li>
                                        <li class="drop-dwn-menu">
                                            <a href="{{ route('index') }}" class="has-submenu">Home</a>
                                        </li>   

                                        <li class="drop-dwn-menu">
                                            <a href="{{ route('products') }}" class="has-submenu">All Products</a>
                                        </li>    
                                        <li class="main-menu-hover">
                                            <a href="#" class="menu-title">Brands</a>
                                            <ul class="mega-menu full-mega-menu mega-page-width space-left">
                                                <li>
                                                    <div class="container">
                                                        <div class="row space-top">
                                                            @foreach (App\Models\Brand::all() as $br)
                                                                <div class="col mega-box">
                                                                    <div class="link-section">
                                                                        <div class="menu-content">
                                                                            <ul class="submenu-header-show">
                                                                                <li><a href="{{ route('brands.show', $br->slug) }}">{{ $br->name }}</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>                                                                         
                                        {{-- <li class="drop-dwn-menu">
                                            <a href="#" class="">More</a>
                                            <ul class="sub-drop-menu">
                                                <li><a href="about.html">about us</a></li>
                                                <li><a href="login.html">login</a></li>
                                                <li><a href="register.html">register</a></li>
                                                <li><a href="forget-pass.html">forget password</a></li>
                                                <li><a href="contact.html">contact</a></li>
                                                <li><a href="404.html">404</a></li>
                                                <li><a href="error.html">error</a></li>
                                                <li><a href="#">Portfolio</a>
                                                    <ul>
                                                        <li><a href="grid-2-col.html">Grid 2 Col</a></li>
                                                        <li><a href="grid-3-col.html">Grid 3 Col</a></li>
                                                        <li><a href="masonry.html">Masonry</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="faq.html">FAQ</a></li>
                                            </ul>
                                        </li> --}}
                                        
                                        <li class="drop-dwn-menu">
                                            <a href="{{ route('contact') }}" class="has-submenu">contact</a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="ml-md-4 d-none d-md-block dark-theme-icon">

                                    @if (!Auth::check())
                                    <a href="{{ route('login') }}" class="btn btn-info btn-login">
                                        Login
                                    </a>
                                    <a href="{{ route('register') }}" class="btn btn-warning btn-login">
                                        Create Account
                                    </a>
                                    @else
                                    <nav class="theme-home-menu lg-left-0 header-three-style sub-mega-menu-fix">
                                        <ul id="main-menu2" class="sm pixelstrap home-header  sm-horizontal home-2">
                                            <li class="drop-dwn-menu">
                                                <a href="#" class="">Account</a>
                                                <ul class="sub-drop-menu">
                                                    <li><a href="{{ route('user.profile') }}">My Profile</a></li>
                                                    <li><a href="{{ route('user.dashboard') }}">My Account</a></li>
                                                    <li><a href="{{ route('logout') }}"
                                                      onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">Logout</a>
                                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                          @csrf
                                                      </form>
                                                  </li>
                                              </ul>
                                          </li>
                                      </ul>
                                  </nav>
                                  
                                  @endif
                                  
                              </div>                                    
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</header>
<!-- Header End -->