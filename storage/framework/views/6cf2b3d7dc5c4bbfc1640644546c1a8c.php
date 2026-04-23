<?php $__env->startSection('title', 'My Cart - Glorya Beauty'); ?>

<?php $__env->startSection('content'); ?>
   <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(<?php echo e(asset('images/testimonial/test-bg.png')); ?>)">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-left">
                                <div class="breadcrumb-title">
                                    <h2>My cart </h2>
                                    <div class="breadcrumb-wrap">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">My Cart </li>
                                    </ol>
                                </nav>
                            </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="cart-page">
               
                
                <?php if($cart && $cart->items->count() > 0): ?>
                    <div class="cart-items">
                        <?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="cart-item">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <div class="cart-item-image">
                                            <img src="<?php echo e(asset($item->service_image)); ?>" alt="<?php echo e($item->service_name); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="cart-item-info">
                                            <h4><?php echo e($item->service_name); ?></h4>
                                            <p class="text-muted"><?php echo e($item->service_category); ?></p>
                                            <p class="text-muted"><i class="fas fa-clock"></i> <?php echo e($item->service_time); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="cart-item-price">
                                            <p class="price-label">Price</p>
                                            <p class="price">₹<?php echo e(number_format($item->service_price, 2)); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="cart-item-quantity">
                                            <p class="quantity-label">Quantity</p>
                                            <div class="quantity-controls">
                                                <button class="btn btn-sm btn-outline-secondary quantity-btn" onclick="updateQuantity('<?php echo e($item->service_name); ?>', <?php echo e($item->quantity - 1); ?>)">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <span class="quantity-display"><?php echo e($item->quantity); ?></span>
                                                <button class="btn btn-sm btn-outline-secondary quantity-btn" onclick="updateQuantity('<?php echo e($item->service_name); ?>', <?php echo e($item->quantity + 1); ?>)">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="cart-item-subtotal">
                                            <p class="subtotal-label">Subtotal</p>
                                            <p class="subtotal">₹<?php echo e(number_format($item->service_price * $item->quantity, 2)); ?></p>
                                        </div>
                                        <div class="cart-item-actions mt-2">
                                            <button class="btn btn-sm btn-danger remove-btn" onclick="removeFromCart('<?php echo e($item->service_name); ?>')">
                                                <i class="fas fa-trash"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
                    <div class="cart-actions">
                        <button class="btn btn-outline-danger" onclick="clearCart()">
                            <i class="fas fa-trash"></i> Clear Cart
                        </button>
                        <a href="<?php echo e(route('services')); ?>" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left"></i> Continue Shopping
                        </a>
                    </div>
                <?php else: ?>
                    <div class="empty-cart text-center py-5">
                        <i class="fas fa-shopping-cart fa-4x text-muted mb-3"></i>
                        <h3>Your cart is empty</h3>
                        <p class="text-muted">Add some services to get started!</p>
                        <a href="<?php echo e(route('services')); ?>" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> Continue Shopping
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <?php if($cart && $cart->items->count() > 0): ?>
            <div class="col-lg-4">
                <!-- Cart Summary -->
                <div class="cart-summary">
                    <h4><i class="fas fa-receipt"></i> Order Summary</h4>
                    <div class="summary-item">
                        <span>Subtotal (<?php echo e($cart->total_items); ?> items)</span>
                        <span>₹<?php echo e(number_format($subtotal, 2)); ?></span>
                    </div>
                    <div class="summary-item">
                        <span>GST (5%)</span>
                        <span>₹<?php echo e(number_format($gstAmount, 2)); ?></span>
                    </div>
                    <div class="summary-item total">
                        <span>Total</span>
                        <span>₹<?php echo e(number_format($total, 2)); ?></span>
                    </div>
                    <a href="<?php echo e(route('cart.checkout')); ?>" class="btn btn-proceed">
                        <i class="fas fa-calendar-check"></i> Proceed to Checkout
                    </a>
                </div>
                
                            </div>
        <?php endif; ?>
    </div>
</div>

<style>
.cart-page {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 1px solid #e9ecef;
}

.cart-header {
    margin-bottom: 30px;
    text-align: center;
    border-bottom: 2px solid #f8f9fa;
    padding-bottom: 20px;
}

.cart-header h2 {
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
}

.cart-header h2 i {
    color: #cf921c;
    margin-right: 10px;
}

.cart-item {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 15px;
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.cart-item:hover {
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.cart-item-image img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 10px;
    border: 2px solid #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.cart-item-info h4 {
    color: #333;
    margin-bottom: 8px;
    font-weight: 600;
    font-size: 16px;
}

.cart-item-info p {
    margin-bottom: 4px;
    font-size: 14px;
}

.price-label, .quantity-label, .subtotal-label {
    font-size: 12px;
    color: #6c757d;
    margin-bottom: 4px;
    font-weight: 500;
}

.cart-item-price .price {
    font-size: 18px;
    font-weight: bold;
    color: #cf921c;
    margin: 0;
}

.quantity-controls {
    display: flex;
    align-items: center;
    gap: 8px;
    background: white;
    border-radius: 8px;
    padding: 4px;
    border: 1px solid #dee2e6;
}

.quantity-btn {
    width: 28px;
    height: 28px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    font-size: 12px;
}

.quantity-display {
    font-weight: bold;
    min-width: 30px;
    text-align: center;
    font-size: 14px;
}

.cart-item-subtotal .subtotal {
    font-size: 18px;
    font-weight: bold;
    color: #28a745;
    margin: 0;
}

.remove-btn {
    font-size: 12px;
    padding: 4px 8px;
}

.cart-actions {
    display: flex;
    gap: 15px;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid #e9ecef;
}

.cart-summary {
    background: linear-gradient(135deg, #cf921c 0%, #d4a574 100%);
    color: white;
    padding: 25px;
    border-radius: 15px;
    margin-bottom: 20px;
    box-shadow: 0 10px 25px rgba(207, 146, 28, 0.3);
}

.cart-summary h4 {
    margin-bottom: 20px;
    font-weight: 600;
    text-align: center;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 12px;
    font-size: 16px;
}

.summary-item.total {
    border-top: 2px solid rgba(255,255,255,0.3);
    padding-top: 12px;
    font-weight: bold;
    font-size: 18px;
}

.btn-proceed {
    width: 100%;
    margin-top: 20px;
    padding: 12px;
    font-weight: 600;
    border: none;
}

.booking-form {
    background: white;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 1px solid #e9ecef;
}

.booking-form h4 {
    margin-bottom: 20px;
    color: #333;
    font-weight: 600;
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-weight: 500;
    margin-bottom: 8px;
    color: #495057;
}

.form-control {
    border-radius: 8px;
    border: 1px solid #ced4da;
    padding: 10px 15px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #cf921c;
    box-shadow: 0 0 0 0.2rem rgba(207, 146, 28, 0.25);
}

.form-actions {
    display: flex;
    gap: 10px;
    margin-top: 25px;
}

.empty-cart {
    padding: 60px 20px;
    background: #f8f9fa;
    border-radius: 15px;
    border: 2px dashed #dee2e6;
}

.empty-cart i {
    color: #cf921c;
    margin-bottom: 20px;
}

@media (max-width: 768px) {
    .cart-item {
        padding: 15px;
    }
    
    .cart-item-image img {
        width: 60px;
        height: 60px;
    }
    
    .cart-item-info h4 {
        font-size: 14px;
    }
    
    .quantity-controls {
        gap: 4px;
    }
    
    .quantity-btn {
        width: 24px;
        height: 24px;
        font-size: 10px;
    }
}
</style>

<script>
function updateQuantity(serviceName, newQuantity) {
    if (newQuantity < 1) {
        removeFromCart(serviceName);
        return;
    }
    
    // Show loading state
    showLoading();
    
    // AJAX call to update quantity
    $.ajax({
        url: '<?php echo e(route("cart.update")); ?>',
        type: 'POST',
        data: {
            '_token': '<?php echo e(csrf_token()); ?>',
            'service_name': serviceName,
            'quantity': newQuantity
        },
        success: function(response) {
            if (response.success) {
                showNotification(response.message, 'success');
                setTimeout(() => location.reload(), 1000);
            } else {
                showNotification(response.message, 'error');
                hideLoading();
            }
        },
        error: function() {
            showNotification('Error updating quantity', 'error');
            hideLoading();
        }
    });
}

function removeFromCart(serviceName) {
    if (confirm('Are you sure you want to remove this item from cart?')) {
        showLoading();
        
        $.ajax({
            url: '<?php echo e(route("cart.remove")); ?>',
            type: 'POST',
            data: {
                '_token': '<?php echo e(csrf_token()); ?>',
                'service_name': serviceName
            },
            success: function(response) {
                if (response.success) {
                    showNotification(response.message, 'success');
                    setTimeout(() => location.reload(), 1000);
                } else {
                    showNotification(response.message, 'error');
                    hideLoading();
                }
            },
            error: function() {
                showNotification('Error removing item', 'error');
                hideLoading();
            }
        });
    }
}

function clearCart() {
    if (confirm('Are you sure you want to clear your entire cart?')) {
        showLoading();
        
        $.ajax({
            url: '<?php echo e(route("cart.clear")); ?>',
            type: 'POST',
            data: {
                '_token': '<?php echo e(csrf_token()); ?>'
            },
            success: function(response) {
                if (response.success) {
                    showNotification(response.message, 'success');
                    setTimeout(() => location.reload(), 1000);
                } else {
                    showNotification(response.message, 'error');
                    hideLoading();
                }
            },
            error: function() {
                showNotification('Error clearing cart', 'error');
                hideLoading();
            }
        });
    }
}


function showNotification(message, type) {
    // Remove existing notifications
    $('.cart-notification').remove();
    
    const notificationClass = type === 'success' ? 'alert-success' : 'alert-danger';
    const notification = $(`
        <div class="cart-notification ${notificationClass} alert-dismissible fade show" role="alert">
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'}"></i>
            ${message}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    `);
    
    $('body').prepend(notification);
    
    setTimeout(() => {
        notification.fadeOut('slow', function() {
            $(this).remove();
        });
    }, 5000);
}

function showLoading() {
    if (!$('#loadingOverlay').length) {
        $('body').append(`
            <div id="loadingOverlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; display: flex; align-items: center; justify-content: center;">
                <div style="background: white; padding: 30px; border-radius: 10px; text-align: center;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <p class="mt-3 mb-0">Processing...</p>
                </div>
            </div>
        `);
    }
}

function hideLoading() {
    $('#loadingOverlay').remove();
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Gloryabeauty\resources\views/frontend/cart/index.blade.php ENDPATH**/ ?>