<div class="list-area">
        <div class="profile-photo">
          <a href="" class="profile-pic" style="display: flex; padding: 15px;">
            <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" width="70" height="70" class="" style="border-radius: 50%; margin: 0 auto;">
          </a>
          <div class="profile-name">
            <span>Hello {{ $user->first_name }}</span>
          </div>
          <div class="profile-email">
            {{ $user->email }}
          </div>
          <a href="{{ route('user.dashboard') }}" class="listStyle {{ Route::is('user.dashboard') ? 'active' : '' }}">
            <span><i class="fa fa-user-o icon" aria-hidden="true"></i></span>
           My Profile
         </a>
         <a href="{{ route('user.profile') }}" class="listStyle {{ Route::is('user.profile') ? 'active' : '' }}">
          <span><i class="fa fa-sliders" aria-hidden="true"></i></span>
           Account Setting
         </a>
         <a href="{{ route('wishlists') }}" class="listStyle {{ Route::is('wishlists') ? 'active' : '' }}">
            <span><i class="fa fa-heart-o" aria-hidden="true"></i></span>
           My wishlist
         </a>
         <a href="{{ route('carts') }}" class="listStyle {{ Route::is('carts') ? 'active' : '' }}">
            <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
           My Cart
         </a>
          <a href="{{ route('user.orders') }}" class="listStyle {{ Route::is('user.orders') ? 'active' : '' }}">
            <span><i class="fa fa-list-alt" aria-hidden="true"></i></span>
           My Orders
         </a>
         <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="listStyle">
            <span><i class="fa fa-toggle-off" aria-hidden="true"></i></span>
           Logout
         </a>
        </div>
      </div>
