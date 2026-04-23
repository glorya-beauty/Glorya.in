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
                    <!-- Desktop Cart Button -->
                    <div class="col-xl-2 col-lg-2 text-right d-none d-xl-block mt-30 mb-30">
                        <?php if(Auth::check()): ?>
                            <?php
                                $cartCount = App\Models\CartItem::whereHas('cart', function($query) { $query->where('user_id', Auth::id()); })->sum('quantity');
                            ?>
                            <a href="<?php echo e(route('cart.index')); ?>" class="btn ss-btn cart-icon" style="padding: 8px 20px; font-size: 14px; position: relative;">
                                <i class="fas fa-shopping-cart"></i> Cart
                                <span class="cart-count" 
                                      style="position: absolute; top: -8px; right: -8px; background: #ff4757; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: bold; <?php echo e($cartCount > 0 ? '' : 'display: none;'); ?>">
                                    <?php echo e($cartCount); ?>

                                </span>
                            </a>
                        <?php else: ?>
                            <a href="#" class="btn ss-btn cart-icon" style="padding: 8px 20px; font-size: 14px; position: relative;" onclick="handleCheckout(event)">
                                <i class="fas fa-shopping-cart"></i> Cart
                                <span class="cart-count" 
                                      style="position: absolute; top: -8px; right: -8px; background: #ff4757; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: bold; display: none;">
                                    0
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Tablet Cart Button -->
                    <div class="col-lg-2 text-right d-none d-lg-block d-xl-none mt-30 mb-30">
                        <?php if(Auth::check()): ?>
                            <?php
                                $cartCount = App\Models\CartItem::whereHas('cart', function($query) { $query->where('user_id', Auth::id()); })->sum('quantity');
                            ?>
                            <a href="<?php echo e(route('cart.index')); ?>" class="btn ss-btn cart-icon" style="padding: 10px 16px; font-size: 13px; position: relative;">
                                <i class="fas fa-shopping-cart"></i> 
                                <span class="cart-count" 
                                      style="position: absolute; top: -6px; right: -6px; background: #ff4757; color: white; border-radius: 50%; width: 18px; height: 18px; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: bold; <?php echo e($cartCount > 0 ? '' : 'display: none;'); ?>">
                                    <?php echo e($cartCount); ?>

                                </span>
                            </a>
                        <?php else: ?>
                            <a href="#" class="btn ss-btn cart-icon" style="padding: 10px 16px; font-size: 13px; position: relative;" onclick="handleCheckout(event)">
                                <i class="fas fa-shopping-cart"></i> 
                                <span class="cart-count" 
                                      style="position: absolute; top: -6px; right: -6px; background: #ff4757; color: white; border-radius: 50%; width: 18px; height: 18px; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: bold; display: none;">
                                    0
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Mobile Cart Button -->
                    <div class="col-12 d-block d-lg-none">
                        <div class="mobile-cart-container" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
                            <?php if(Auth::check()): ?>
                                <?php
                                    $cartCount = App\Models\CartItem::whereHas('cart', function($query) { $query->where('user_id', Auth::id()); })->sum('quantity');
                                ?>
                                <a href="<?php echo e(route('cart.index')); ?>" class="btn btn-primary mobile-cart-btn" style="width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 18px; box-shadow: 0 4px 12px rgba(207, 146, 28, 0.4); background: linear-gradient(135deg, #cf921c 0%, #d4a574 100%); border: none; position: relative;">
                                    <i class="fas fa-shopping-cart" style="color: white;"></i>
                                    <span class="cart-count" 
                                          style="position: absolute; top: -5px; right: -5px; background: #ff4757; color: white; border-radius: 50%; width: 22px; height: 22px; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: bold; <?php echo e($cartCount > 0 ? '' : 'display: none;'); ?>">
                                        <?php echo e($cartCount); ?>

                                    </span>
                                </a>
                            <?php else: ?>
                                <a href="#" class="btn btn-primary mobile-cart-btn" style="width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 18px; box-shadow: 0 4px 12px rgba(207, 146, 28, 0.4); background: linear-gradient(135deg, #cf921c 0%, #d4a574 100%); border: none; position: relative;" onclick="handleCheckout(event)">
                                    <i class="fas fa-shopping-cart" style="color: white;"></i>
                                    <span class="cart-count" 
                                          style="position: absolute; top: -5px; right: -5px; background: #ff4757; color: white; border-radius: 50%; width: 22px; height: 22px; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: bold; display: none;">
                                        0
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
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
<?php /**PATH C:\xampp\htdocs\Gloryabeauty\resources\views/includes/header.blade.php ENDPATH**/ ?>