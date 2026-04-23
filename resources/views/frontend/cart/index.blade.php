@extends('layouts.app')

@section('title', 'My Cart - Glorya Beauty')

@section('content')
   <section class="breadcrumb-area d-flex align-items-center" style="background-image:url({{ asset('images/testimonial/test-bg.png') }})">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-left">
                                <div class="breadcrumb-title">
                                    <h2>My cart </h2>
                                    <div class="breadcrumb-wrap">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
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
               
                
                @if($cart && $cart->items->count() > 0)
                    <div class="cart-items">
                        @foreach($cart->items as $item)
                            <div class="cart-item">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <div class="cart-item-image">
                                            <img src="{{ asset($item->service_image) }}" alt="{{ $item->service_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="cart-item-info">
                                            <h4>{{ $item->service_name }}</h4>
                                            <p class="text-muted">{{ $item->service_category }}</p>
                                            <p class="text-muted"><i class="fas fa-clock"></i> {{ $item->service_time }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="cart-item-price">
                                            <p class="price-label">Price</p>
                                            <p class="price">₹{{ number_format($item->service_price, 2) }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="cart-item-quantity">
                                            <p class="quantity-label">Quantity</p>
                                            <div class="quantity-controls">
                                                <button class="btn btn-sm btn-outline-secondary quantity-btn" onclick="updateQuantity('{{ $item->service_name }}', {{ $item->quantity - 1 }})">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <span class="quantity-display">{{ $item->quantity }}</span>
                                                <button class="btn btn-sm btn-outline-secondary quantity-btn" onclick="updateQuantity('{{ $item->service_name }}', {{ $item->quantity + 1 }})">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="cart-item-subtotal">
                                            <p class="subtotal-label">Subtotal</p>
                                            <p class="subtotal">₹{{ number_format($item->service_price * $item->quantity, 2) }}</p>
                                        </div>
                                        <div class="cart-item-actions mt-2">
                                            <button class="btn btn-sm btn-danger remove-btn" onclick="removeFromCart('{{ $item->service_name }}')">
                                                <i class="fas fa-trash"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="cart-actions">
                        <button class="btn btn-outline-danger" onclick="clearCart()">
                            <i class="fas fa-trash"></i> Clear Cart
                        </button>
                        <a href="{{ route('services') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left"></i> Continue Shopping
                        </a>
                    </div>
                @else
                    <div class="empty-cart text-center py-5">
                        <i class="fas fa-shopping-cart fa-4x text-muted mb-3"></i>
                        <h3>Your cart is empty</h3>
                        <p class="text-muted">Add some services to get started!</p>
                        <a href="{{ route('services') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> Continue Shopping
                        </a>
                    </div>
                @endif
            </div>
        </div>
        
        @if($cart && $cart->items->count() > 0)
            <div class="col-lg-4">
                <!-- Cart Summary -->
                <div class="cart-summary">
                    <h4><i class="fas fa-receipt"></i> Order Summary</h4>
                    <div class="summary-item">
                        <span>Subtotal ({{ $cart->total_items }} items)</span>
                        <span>₹{{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="summary-item">
                        <span>GST (5%)</span>
                        <span>₹{{ number_format($gstAmount, 2) }}</span>
                    </div>
                    <div class="summary-item total">
                        <span>Total</span>
                        <span>₹{{ number_format($total, 2) }}</span>
                    </div>
                    <a href="{{ route('cart.checkout') }}" class="btn btn-proceed">
                        <i class="fas fa-calendar-check"></i> Proceed to Checkout
                    </a>
                </div>
                
                            </div>
        @endif
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

/* Tablet Styles */
@media (max-width: 991px) and (min-width: 768px) {
    .cart-page {
        padding: 20px;
    }
    
    .cart-item {
        padding: 18px;
    }
    
    .cart-item-image img {
        width: 70px;
        height: 70px;
    }
    
    .cart-item-info h4 {
        font-size: 15px;
    }
    
    .cart-item-info p {
        font-size: 13px;
    }
    
    .cart-summary {
        margin-top: 20px;
        position: sticky;
        top: 20px;
    }
    
    .cart-actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .cart-actions .btn {
        width: 100%;
        justify-content: center;
    }
}

/* Mobile Styles */
@media (max-width: 767px) {
    .container {
        padding-left: 15px;
        padding-right: 15px;
    }
    
    .cart-page {
        padding: 15px;
        margin-bottom: 20px;
    }
    
    .breadcrumb-area {
        padding: 40px 0;
    }
    
    .breadcrumb-title h2 {
        font-size: 24px;
    }
    
    .cart-item {
        padding: 15px;
        margin-bottom: 12px;
    }
    
    .cart-item .row {
        flex-direction: column;
        gap: 15px;
    }
    
    .cart-item .row > div {
        width: 100%;
        margin-bottom: 10px;
    }
    
    .cart-item-image {
        text-align: center;
    }
    
    .cart-item-image img {
        width: 80px;
        height: 80px;
        margin: 0 auto;
    }
    
    .cart-item-info {
        text-align: center;
        border-bottom: 1px solid #e9ecef;
        padding-bottom: 10px;
    }
    
    .cart-item-info h4 {
        font-size: 16px;
        margin-bottom: 5px;
    }
    
    .cart-item-info p {
        font-size: 13px;
        margin-bottom: 2px;
    }
    
    .cart-item-price {
        text-align: center;
        padding: 10px;
        background: #f8f9fa;
        border-radius: 8px;
    }
    
    .cart-item-quantity {
        text-align: center;
    }
    
    .quantity-controls {
        justify-content: center;
        gap: 6px;
        background: white;
        border-radius: 8px;
        padding: 6px;
        border: 1px solid #dee2e6;
        max-width: 150px;
        margin: 0 auto;
    }
    
    .quantity-btn {
        width: 32px;
        height: 32px;
        font-size: 14px;
        border-radius: 6px;
    }
    
    .quantity-display {
        font-size: 16px;
        min-width: 40px;
    }
    
    .cart-item-subtotal {
        text-align: center;
        padding: 10px;
        background: #e8f5e8;
        border-radius: 8px;
        margin-bottom: 10px;
    }
    
    .cart-item-actions {
        text-align: center;
    }
    
    .remove-btn {
        width: 100%;
        padding: 8px 16px;
        font-size: 14px;
        justify-content: center;
    }
    
    .cart-actions {
        flex-direction: column;
        gap: 10px;
        margin-top: 15px;
        padding-top: 15px;
    }
    
    .cart-actions .btn {
        width: 100%;
        padding: 12px 20px;
        font-size: 14px;
        justify-content: center;
        display: flex;
        align-items: center;
    }
    
    .cart-summary {
        margin-top: 20px;
        padding: 20px;
        border-radius: 12px;
    }
    
    .cart-summary h4 {
        font-size: 18px;
        margin-bottom: 15px;
    }
    
    .summary-item {
        font-size: 15px;
        margin-bottom: 10px;
        padding: 8px 0;
    }
    
    .summary-item.total {
        font-size: 16px;
        padding-top: 10px;
    }
    
    .btn-proceed {
        padding: 15px;
        font-size: 16px;
        margin-top: 15px;
    }
    
    .empty-cart {
        padding: 40px 20px;
    }
    
    .empty-cart h3 {
        font-size: 20px;
        margin-bottom: 10px;
    }
    
    .empty-cart p {
        font-size: 14px;
        margin-bottom: 20px;
    }
    
    .empty-cart .btn {
        width: 100%;
        max-width: 250px;
        padding: 12px 20px;
    }
}

/* Small Mobile Styles */
@media (max-width: 480px) {
    .container {
        padding-left: 10px;
        padding-right: 10px;
    }
    
    .cart-page {
        padding: 10px;
    }
    
    .breadcrumb-title h2 {
        font-size: 20px;
    }
    
    .cart-item {
        padding: 12px;
    }
    
    .cart-item-image img {
        width: 70px;
        height: 70px;
    }
    
    .cart-item-info h4 {
        font-size: 14px;
    }
    
    .cart-item-info p {
        font-size: 12px;
    }
    
    .quantity-controls {
        max-width: 130px;
        gap: 4px;
        padding: 4px;
    }
    
    .quantity-btn {
        width: 28px;
        height: 28px;
        font-size: 12px;
    }
    
    .quantity-display {
        font-size: 14px;
        min-width: 35px;
    }
    
    .cart-summary {
        padding: 15px;
    }
    
    .cart-summary h4 {
        font-size: 16px;
    }
    
    .summary-item {
        font-size: 14px;
    }
    
    .summary-item.total {
        font-size: 15px;
    }
    
    .btn-proceed {
        padding: 12px;
        font-size: 14px;
    }
    
    .empty-cart {
        padding: 30px 15px;
    }
    
    .empty-cart h3 {
        font-size: 18px;
    }
    
    .empty-cart i {
        font-size: 3rem;
    }
}

/* Landscape Mobile Styles */
@media (max-width: 767px) and (orientation: landscape) {
    .cart-item {
        padding: 10px;
    }
    
    .cart-item .row {
        gap: 10px;
    }
    
    .cart-item-image img {
        width: 60px;
        height: 60px;
    }
    
    .cart-item-info h4 {
        font-size: 14px;
    }
    
    .quantity-controls {
        max-width: 120px;
    }
    
    .cart-summary {
        margin-top: 15px;
        padding: 15px;
    }
}

/* Touch-friendly improvements */
@media (hover: none) and (pointer: coarse) {
    .quantity-btn {
        min-height: 44px;
        min-width: 44px;
    }
    
    .remove-btn {
        min-height: 44px;
        padding: 10px 16px;
    }
    
    .cart-actions .btn {
        min-height: 44px;
    }
    
    .btn-proceed {
        min-height: 44px;
    }
}
</style>

<script>
// Mobile touch support
let touchStartX = 0;
let touchStartY = 0;
let touchEndX = 0;
let touchEndY = 0;

function updateQuantity(serviceName, newQuantity) {
    if (newQuantity < 1) {
        removeFromCart(serviceName);
        return;
    }
    
    // Show loading state
    showLoading();
    
    // AJAX call to update quantity
    $.ajax({
        url: '{{ route("cart.update") }}',
        type: 'POST',
        data: {
            '_token': '{{ csrf_token() }}',
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
            url: '{{ route("cart.remove") }}',
            type: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
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
            url: '{{ route("cart.clear") }}',
            type: 'POST',
            data: {
                '_token': '{{ csrf_token() }}'
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

// Mobile touch event handlers
function handleTouchStart(evt) {
    touchStartX = evt.touches[0].clientX;
    touchStartY = evt.touches[0].clientY;
}

function handleTouchEnd(evt) {
    touchEndX = evt.changedTouches[0].clientX;
    touchEndY = evt.changedTouches[0].clientY;
    handleSwipeGesture();
}

function handleSwipeGesture() {
    const swipeThreshold = 100;
    const verticalThreshold = 50;
    
    const deltaX = touchEndX - touchStartX;
    const deltaY = touchEndY - touchStartY;
    
    // Check if it's a horizontal swipe
    if (Math.abs(deltaX) > Math.abs(deltaY) && Math.abs(deltaX) > swipeThreshold) {
        if (Math.abs(deltaY) < verticalThreshold) {
            // Left swipe - could be used for navigation
            if (deltaX < 0) {
                console.log('Swipe left detected');
            }
            // Right swipe - could be used for remove action
            else {
                console.log('Swipe right detected');
            }
        }
    }
}

// Add mobile-specific enhancements
$(document).ready(function() {
    // Add touch event listeners to cart items
    $('.cart-item').each(function() {
        const cartItem = this;
        const serviceName = $(this).find('.cart-item-info h4').text();
        
        // Touch events for swipe gestures
        cartItem.addEventListener('touchstart', handleTouchStart, {passive: true});
        cartItem.addEventListener('touchend', handleTouchEnd, {passive: true});
        
        // Long press for mobile context menu
        let pressTimer;
        
        cartItem.addEventListener('touchstart', function(e) {
            pressTimer = setTimeout(function() {
                if (confirm(`Remove "${serviceName}" from cart?`)) {
                    removeFromCart(serviceName);
                }
            }, 800);
        }, {passive: true});
        
        cartItem.addEventListener('touchend', function() {
            clearTimeout(pressTimer);
        }, {passive: true});
        
        cartItem.addEventListener('touchmove', function() {
            clearTimeout(pressTimer);
        }, {passive: true});
    });
    
    // Mobile quantity controls improvement
    if (window.innerWidth <= 767) {
        $('.quantity-btn').on('touchstart', function(e) {
            e.preventDefault();
            const btn = $(this);
            const serviceName = btn.closest('.cart-item').find('.cart-item-info h4').text();
            const currentQuantity = parseInt(btn.siblings('.quantity-display').text());
            
            if (btn.find('.fa-plus').length > 0) {
                updateQuantity(serviceName, currentQuantity + 1);
            } else if (btn.find('.fa-minus').length > 0) {
                updateQuantity(serviceName, currentQuantity - 1);
            }
        });
    }
    
    // Mobile viewport height fix for iOS
    function setViewportHeight() {
        const vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    }
    
    setViewportHeight();
    window.addEventListener('resize', setViewportHeight);
    window.addEventListener('orientationchange', setViewportHeight);
    
    // Add visual feedback for mobile interactions
    $('.cart-item, .btn, .quantity-btn').on('touchstart', function() {
        $(this).addClass('touch-active');
    });
    
    $('.cart-item, .btn, .quantity-btn').on('touchend', function() {
        $(this).removeClass('touch-active');
    });
});

// Add CSS for touch feedback
const touchStyles = `
    <style>
    .touch-active {
        opacity: 0.7;
        transform: scale(0.98);
        transition: all 0.1s ease;
    }
    
    .cart-item {
        touch-action: pan-y;
        -webkit-overflow-scrolling: touch;
    }
    
    @media (max-width: 767px) {
        :root {
            --vh: 1vh;
        }
        
        .cart-page {
            min-height: calc(100vh - var(--vh) * 20);
        }
    }
    </style>
`;

$('head').append(touchStyles);
</script>
@endsection
