<!-- header -->
<header class="header-area header-three">  
    <div id="header-sticky" class="menu-area">
        <div class="container">
            <div class="second-menu">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo">
                            <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('images/logo/logo.png')); ?>" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                      
                        <div class="main-menu text-right text-xl-right">
                            <nav id="mobile-menu" style="display: block;">
                                <ul>
                                    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                    <li><a href="<?php echo e(url('/about')); ?>">Milestones</a></li>
                                    <li class="has-sub"> 
                                      <a href="<?php echo e(url('/services')); ?>">Services</a>
                
                                    </li>
                                    <li><a href="<?php echo e(url('/gallery')); ?>">Gallery</a></li>
                                    <li><a href="<?php echo e(url('/blog')); ?>">Media</a></li>
                                    <li><a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
                                    <?php if(Auth::check()): ?>
                                        <li class="has-sub">
                                            <a href="#"><i class="fas fa-user"></i> <?php echo e(Auth::user()->name); ?></a>
                                            <ul>
                                                <?php if(Auth::user()->is_admin): ?>
                                                    <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-tachometer-alt"></i> Admin Dashboard</a></li>
                                                    <li><a href="<?php echo e(route('admin.bookings')); ?>"><i class="fas fa-list"></i> Manage Bookings</a></li>
                                                <?php endif; ?>
                                                <li><a href="<?php echo e(route('booking.my')); ?>">My Bookings</a></li>
                                                <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                            </ul>
                                        </li>
                                    <?php else: ?>
                                        <li><a href="#" data-toggle="modal" data-target="#loginModal"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#registerModal"><i class="fas fa-user-plus"></i> Register</a></li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>   
                    <div class="col-xl-2 col-lg-2 text-right d-none d-xl-block mt-30 mb-30">
                        <?php if(Auth::check()): ?>
                            <a href="<?php echo e(route('cart.index')); ?>" class="btn ss-btn cart-icon" style="padding: 8px 20px; font-size: 14px; position: relative;">
                                <i class="fas fa-shopping-cart"></i> Cart
                                <span class="cart-count" style="position: absolute; top: -8px; right: -8px; background: #ff4757; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: bold;"><?php echo e(App\Models\CartItem::whereHas('cart', function($query) { $query->where('user_id', Auth::id()); })->sum('quantity')); ?></span>
                            </a>
                        <?php else: ?>
                            <a href="#" class="btn ss-btn active" style="padding: 8px 20px; font-size: 14px;" data-toggle="modal" data-target="#loginModal">
                                <i class="fas fa-sign-in-alt"></i> Download App
                            </a>
                        <?php endif; ?>
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

<?php if(Auth::check()): ?>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>
<?php endif; ?>
<?php /**PATH /var/www/Glorya/resources/views/includes/header.blade.php ENDPATH**/ ?>