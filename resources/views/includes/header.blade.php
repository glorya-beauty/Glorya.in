<!-- header -->
<header class="header-area header-three">  
    <div id="header-sticky" class="menu-area">
        <div class="container">
            <div class="second-menu">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('images/logo/logo.png') }}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                      
                        <div class="main-menu text-right text-xl-right">
                            <nav id="mobile-menu" style="display: block;">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ url('/about') }}">Milestones</a></li>
                                    <li class="has-sub"> 
                                      <a href="{{ url('/services') }}">Services</a>
                
                                    </li>
                                    <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                                    <li><a href="{{ url('/blog') }}">Media</a></li>
                                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                                    @if(Auth::check())
                                        <li class="has-sub">
                                            <a href="#"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
                                            <ul>
                                                @if(Auth::user()->is_admin)
                                                    <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Admin Dashboard</a></li>
                                                    <li><a href="{{ route('admin.bookings') }}"><i class="fas fa-list"></i> Manage Bookings</a></li>
                                                @endif
                                                <li><a href="{{ route('booking.my') }}">My Bookings</a></li>
                                                <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                            </ul>
                                        </li>
                                    @else
                                        <li><a href="#" data-toggle="modal" data-target="#loginModal"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#registerModal"><i class="fas fa-user-plus"></i> Register</a></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>   
                    <div class="col-xl-2 col-lg-2 text-right d-none d-xl-block mt-30 mb-30">
                        @if(Auth::check())
                            <a href="{{ route('cart.index') }}" class="btn ss-btn cart-icon" style="padding: 8px 20px; font-size: 14px; position: relative;">
                                <i class="fas fa-shopping-cart"></i> Cart
                                <span class="cart-count" style="position: absolute; top: -8px; right: -8px; background: #ff4757; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: bold;">{{ App\Models\CartItem::whereHas('cart', function($query) { $query->where('user_id', Auth::id()); })->sum('quantity') }}</span>
                            </a>
                        @else
                            <a href="#" class="btn ss-btn active" style="padding: 8px 20px; font-size: 14px;" data-toggle="modal" data-target="#loginModal">
                                <i class="fas fa-sign-in-alt"></i> Download App
                            </a>
                        @endif
                    </div>
                  
                    
                        <div class="col-12">
                            <div class="mobile-menu"></div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-end -->

@if(Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endif
