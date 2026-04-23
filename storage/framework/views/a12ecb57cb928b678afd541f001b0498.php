<?php $__env->startSection('title', 'Checkout - Glorya Beauty'); ?>

<?php $__env->startSection('content'); ?>



<!-- Booking Section -->
<section id="booking-section" class="contact-area contact-bg pt-100 pb-100 p-relative fix" style="background-image:url(<?php echo e(asset('images/bg/contact-bg.png')); ?>)">
    <div class="contact-bg-an-01"><img src="<?php echo e(asset('images/bg/contact-bg-an-01.png')); ?>" alt="contact-bg-an-01"></div>
    <div class="contact-bg-an-02"><img src="<?php echo e(asset('images/bg/contact-bg-an-02.png')); ?>" alt="contact-bg-an-01"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="contact-bg02 wow fadeInLeft animated">
                    <div class="section-title mb-30">   
                        <h2>Book Your Service</h2>
                        <span class="line5"> <img src="<?php echo e(asset('images/bg/circle_right.png')); ?>" alt="circle_left"></span>
                    </div>
                    
                    <?php if(!Auth::check()): ?>
                        <div class="alert alert-warning text-center mb-30">
                            <i class="fas fa-exclamation-triangle"></i> <strong>First login to book a service</strong><br>
                            <small>Please login or register to proceed with booking</small>
                            <div class="mt-20">
                                <button type="button" class="btn ss-btn active mr-10" data-toggle="modal" data-target="#loginModal">
                                    <i class="fas fa-sign-in-alt"></i> Login
                                </button>
                                <button type="button" class="btn ss-btn" data-toggle="modal" data-target="#registerModal">
                                    <i class="fas fa-user-plus"></i> Register
                                </button>
                            </div>
                        </div>
                    <?php else: ?>
                    
                    <!-- Check if cart is empty -->
                    <?php if(!$cart || !$cart->items || $cart->items->count() == 0): ?>
                        <div class="alert alert-warning text-center">
                            <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                            <h4>Your cart is empty</h4>
                            <p>Please add services to your cart before proceeding to checkout.</p>
                            <a href="<?php echo e(route('services')); ?>" class="btn btn-primary">
                                <i class="fas fa-arrow-left"></i> Browse Services
                            </a>
                        </div>
                    <?php else: ?>
                    
                    <!-- Cart Summary -->
                    <div class="cart-summary-section mb-30">
                        <h4><i class="fas fa-shopping-cart"></i> Your Cart Items</h4>
                        <div id="cart-summary-content">
                            <!-- Cart items will be loaded here -->
                        </div>
                    </div>
                    
                    <!-- Multi-Step Booking Form -->
                    <div id="booking-form-container">
                        <!-- Step Indicators -->
                        <div class="step-indicators mb-30">
                            <div class="step-indicator active" id="step-1-indicator">
                                <span class="step-number">1</span>
                                <span class="step-title">Basic Details</span>
                            </div>
                            <div class="step-indicator" id="step-2-indicator">
                                <span class="step-number">2</span>
                                <span class="step-title">Payment</span>
                            </div>
                            <div class="step-indicator" id="step-3-indicator">
                                <span class="step-number">3</span>
                                <span class="step-title">Confirmation</span>
                            </div>
                        </div>

                        <!-- Step 1: Basic Details -->
                        <div id="step-1" class="step-content active">
                            <form id="step-1-form" class="contact-form">
                                <?php echo csrf_field(); ?>
                                <div class="row">

                                    <!-- Amount -->
                                    <div class="col-lg-6">
                                        <div class="contact-field p-relative c-subject mb-20">
                                            <label for="amount">Total Amount (incl. 5% GST) *</label>
                                            <input type="number" id="amount" name="amount" readonly required>
                                            <small class="form-text text-muted">Base amount + 5% GST automatically calculated</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-field p-relative c-subject mb-20">
                                            <label for="base_amount">Base Amount</label>
                                            <input type="number" id="base_amount" name="base_amount" readonly>
                                            <small class="form-text text-muted">Subtotal before GST</small>
                                        </div>
                                    </div>

                                    <!-- Customer Name -->
                                    <div class="col-lg-6">
                                        <div class="contact-field p-relative c-name mb-20">
                                            <label for="customer_name">Your Name *</label>
                                            <input type="text" id="customer_name" name="customer_name" value="<?php echo e(Auth::user()->name); ?>" required>
                                        </div>
                                    </div>

                                    <!-- Customer Email -->
                                    <div class="col-lg-6">
                                        <div class="contact-field p-relative c-email mb-20">
                                            <label for="customer_email">Email Address *</label>
                                            <input type="email" id="customer_email" name="customer_email" value="<?php echo e(Auth::user()->email); ?>" required>
                                        </div>
                                    </div>

                                    <!-- Customer Phone -->
                                    <div class="col-lg-6">
                                        <div class="contact-field p-relative c-phone mb-20">
                                            <label for="customer_phone">Phone Number *</label>
                                            <input type="tel" id="customer_phone" name="customer_phone" value="<?php echo e(Auth::user()->phone ?? ''); ?>" required>
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-lg-12">
                                        <div class="contact-field p-relative c-message mb-20">
                                            <label for="address">Address *</label>
                                            <textarea id="address" name="address" rows="3" required><?php echo e(Auth::user()->address ?? ''); ?></textarea>
                                            <input type="hidden" id="latitude" name="latitude">
                                            <input type="hidden" id="longitude" name="longitude">
                                            
                                            <!-- Map Container -->
                                            <div id="map" style="height: 400px; margin-top: 15px; border-radius: 8px;"></div>
                                        </div>
                                    </div>

                                    <!-- Booking Date -->
                                    <div class="col-lg-6">
                                        <div class="contact-field p-relative c-subject mb-20">
                                            <label for="booking_date">Preferred Date *</label>
                                            <input type="date" id="booking_date" name="booking_date" required min="<?php echo e(date('Y-m-d')); ?>">
                                        </div>
                                    </div>

                                    <!-- Booking Time (Slots from 9 AM to 6 PM) -->
                                    <div class="col-lg-6">
                                        <div class="contact-field p-relative c-subject mb-20">
                                            <label for="booking_time">Preferred Time Slot *</label>
                                            <select name="booking_time" id="booking_time" required>
                                                <option value="">Select Time Slot</option>
                                                <?php
                                                    $currentDateTime = now();
                                                    $selectedDate = request('booking_date') ?? date('Y-m-d');
                                                    $isToday = $selectedDate === date('Y-m-d');
                                                    $currentTime = $currentDateTime->format('H:i');
                                                ?>
                                                <?php for($hour = 9; $hour <= 18; $hour++): ?>
                                                    <?php for($minute = 0; $minute < 60; $minute += 60): ?>
                                                        <?php
                                                            $time = sprintf('%02d:%02d', $hour, $minute);
                                                            $displayTime = date('h:i A', strtotime($time));
                                                            $endHour = $hour + 1;
                                                            $endTime = sprintf('%02d:%02d', $endHour, $minute);
                                                            $displayEndTime = date('h:i A', strtotime($endTime));
                                                            
                                                            // Check if slot is available
                                                            $isAvailable = true;
                                                            if ($isToday) {
                                                                // For today, disable slots that have already passed or are too soon
                                                                $slotStartTime = $time;
                                                                $slotEndTime = $endTime;
                                                                
                                                                // Add 30 minutes buffer time for preparation
                                                                $bufferTime = 30;
                                                                $currentBufferTime = $currentDateTime->copy()->addMinutes($bufferTime);
                                                                $slotEndDateTime = \Carbon\Carbon::createFromFormat('H:i', $slotEndTime);
                                                                $currentBufferTimeFormatted = $currentBufferTime->format('H:i');
                                                                
                                                                // Disable slot if current time + buffer is after slot end time
                                                                if ($currentBufferTimeFormatted > $slotEndTime) {
                                                                    $isAvailable = false;
                                                                }
                                                            }
                                                        ?>
                                                        <option value="<?php echo e($time); ?>" <?php if(!$isAvailable): ?> disabled <?php endif; ?>>
                                                            <?php echo e($displayTime); ?> - <?php echo e($displayEndTime); ?>

                                                            <?php if(!$isAvailable): ?> (Not Available) <?php endif; ?>
                                                        </option>
                                                    <?php endfor; ?>
                                                <?php endfor; ?>
                                            </select>
                                            <small class="form-text text-muted">
                                                <?php if($isToday): ?>
                                                    Time slots showing availability for today with 30-minute preparation buffer
                                                <?php else: ?>
                                                    All time slots available for selected date
                                                <?php endif; ?>
                                            </small>
                                        </div>
                                    </div>

                                    <!-- Next Button -->
                                    <div class="col-lg-12">
                                        <div class="slider-btn">
                                            <button type="button" class="btn ss-btn active" onclick="nextStep(2)">
                                                 Next: Payment
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Step 2: Payment QR Code -->
                        <div id="step-2" class="step-content">
                            <div class="payment-qr-section text-center">
                                <h4>Complete Your Payment</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="qr-code-display" style="background: white; padding: 30px; border-radius: 8px; border: 2px solid #007bff; margin: 20px 0;">
                                            <h5>Scan QR Code to Pay</h5>
                                            <img id="payment-qr" src="<?php echo e(asset('images/QR.jpeg')); ?>" alt="Payment QR Code" style="max-width: 300px; height: auto;">
                                            <div class="payment-summary mt-20">
                                                <h6>Payment Details</h6>
                                                <p><strong>Amount:</strong> <span id="payment-amount">₹0</span></p>
                                                <p><strong>Phone:</strong> 01141767035</p>
                                                <p><strong>Account:</strong> Glorya Beauty</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="payment-instructions">
                                            <h5>How to Pay</h5>
                                            <ol>
                                                <li>Scan the QR code with any payment app</li>
                                                <li>Enter the exact amount shown</li>
                                                <li>Complete the payment</li>
                                                <li>Click "Next" to upload payment screenshot</li>
                                            </ol>
                                            <div class="alert alert-info">
                                                <i class="fas fa-info-circle"></i> Keep your payment screenshot ready for the next step
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-30">
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-secondary" onclick="previousStep(1)">
                                             Previous
                                        </button>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <button type="button" class="btn ss-btn active" onclick="nextStep(3)">
                                          Upload Receipt
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Upload Payment Receipt -->
                        <div id="step-3" class="step-content">
                            <form id="step-3-form" class="contact-form">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="service_name" id="final_service_name">
                                <input type="hidden" name="amount" id="final_amount">
                                <input type="hidden" name="base_amount" id="final_base_amount">
                                <input type="hidden" name="customer_name" id="final_customer_name">
                                <input type="hidden" name="customer_email" id="final_customer_email">
                                <input type="hidden" name="customer_phone" id="final_customer_phone">
                                <input type="hidden" name="customer_address" id="final_customer_address">
                                <input type="hidden" name="latitude" id="final_latitude">
                                <input type="hidden" name="longitude" id="final_longitude">
                                <input type="hidden" name="booking_date" id="final_booking_date">
                                <input type="hidden" name="booking_time" id="final_booking_time">
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>Upload Payment Receipt</h4>
                                        <p class="text-muted">Please upload a screenshot of your payment confirmation to complete your booking.</p>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="contact-field p-relative c-message mb-20">
                                            <label for="payment_screenshot">Payment Screenshot *</label>
                                            <input type="file" id="payment_screenshot" name="payment_screenshot" accept="image/*" required>
                                            <small class="form-text text-muted">Supported formats: JPG, PNG, GIF. Max size: 2MB</small>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="contact-field p-relative c-message mb-20">
                                            <label for="notes">Additional Notes (Optional)</label>
                                            <textarea id="notes" name="notes" rows="3" placeholder="Any special requests or notes..."></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="booking-summary" style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                                            <h5>Booking Summary</h5>
                                            <div id="summary-content">
                                                <!-- Summary will be populated by JavaScript -->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-secondary" onclick="previousStep(2)">
                                             Previous
                                        </button>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <button type="submit" class="btn ss-btn active">
                                            <i class="fas fa-check btn-icon mr-1"></i> Complete Booking
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hidden cart data for JavaScript access -->
<input type="hidden" id="cart-items" value="<?php echo e($cart && $cart->items ? $cart->items->toJson() : '[]'); ?>">
<input type="hidden" id="cart-subtotal" value="<?php echo e($subtotal ?? 0); ?>">
<input type="hidden" id="cart-gst" value="<?php echo e($gstAmount ?? 0); ?>">
<input type="hidden" id="cart-total" value="<?php echo e($total ?? 0); ?>">
<!-- booking-section-end -->

<style>
.checkout-page {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    padding: 40px 0;
}

.checkout-header h2 {
    color: white;
    font-weight: 600;
    margin-bottom: 10px;
}

.checkout-header h2 i {
    color: #ffd700;
    margin-right: 10px;
}

.checkout-header p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 18px;
}

.booking-summary-card, .booking-form-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin-bottom: 30px;
}

.summary-header, .form-header {
    background: linear-gradient(135deg, #cf921c 0%, #d4a574 100%);
    color: white;
    padding: 20px;
    text-align: center;
}

.summary-header h4, .form-header h4 {
    margin: 0;
    font-weight: 600;
    font-size: 18px;
}

.summary-header i, .form-header i {
    margin-right: 8px;
}

.summary-content {
    padding: 25px;
}

.booking-item {
    display: flex;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #f0f0f0;
}

.booking-item:last-child {
    border-bottom: none;
}

.item-image img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 10px;
    margin-right: 15px;
}

.item-details {
    flex: 1;
}

.item-details h6 {
    margin: 0 0 5px 0;
    font-weight: 600;
    color: #333;
}

.item-details p {
    margin: 0;
    font-size: 12px;
}

.item-price {
    text-align: right;
}

.item-price .price {
    margin: 0;
    font-weight: 600;
    color: #cf921c;
    font-size: 16px;
}

.item-price .quantity {
    margin: 0;
    color: #666;
    font-size: 14px;
}

.price-breakdown {
    margin-top: 20px;
    padding-top: 20px;
    border-top: 2px solid #f0f0f0;
}

.price-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 16px;
}

.price-row.total {
    font-weight: bold;
    font-size: 18px;
    color: #cf921c;
    padding-top: 10px;
    border-top: 2px solid #f0f0f0;
}

.booking-form-card .form-group {
    margin-bottom: 20px;
}

.booking-form-card label {
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
}

.booking-form-card label i {
    color: #cf921c;
    margin-right: 8px;
    width: 16px;
}

.booking-form-card .form-control {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 12px 15px;
    font-size: 15px;
    transition: all 0.3s ease;
}

.booking-form-card .form-control:focus {
    border-color: #cf921c;
    box-shadow: 0 0 0 0.2rem rgba(207, 146, 28, 0.25);
}

.booking-form-card .form-control.is-invalid {
    border-color: #dc3545;
}

.form-actions {
    display: flex;
    gap: 15px;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #e9ecef;
}

.btn-book-now {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    border: none;
    padding: 12px 30px;
    font-weight: 600;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.btn-book-now:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(40, 167, 69, 0.3);
}

.empty-summary {
    padding: 40px 20px;
}

@media (max-width: 768px) {
    .checkout-page {
        padding: 20px 0;
    }
    
    .booking-item {
        flex-direction: column;
        text-align: center;
    }
    
    .item-image {
        margin-bottom: 10px;
    }
    
    .item-price {
        text-align: center;
        margin-top: 10px;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .form-actions .btn {
        width: 100%;
    }
}
</style>

<!-- Multi-Step Form Styles -->
<style>
.step-indicators {
    display: flex;
    justify-content: center;
    margin-bottom: 30px;
}

.step-indicator {
    display: flex;
    align-items: center;
    margin: 0 15px;
    cursor: pointer;
}

.step-indicator.active .step-number {
    background: linear-gradient(135deg, #cf921c 0%, #d4a574 100%);
    color: white;
}

.step-indicator.completed .step-number {
    background: #28a745;
    color: white;
}

.step-number {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #e9ecef;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin-right: 10px;
    transition: all 0.3s ease;
}

.step-title {
    font-weight: 500;
    color: #666;
}

.step-indicator.active .step-title {
    color: #cf921c;
    font-weight: 600;
}

.step-content {
    display: none;
}

.step-content.active {
    display: block;
}

.payment-qr-section {
    padding: 30px;
    background: #f8f9fa;
    border-radius: 10px;
}

.qr-code-display {
    text-align: center;
}

.payment-summary {
    background: white;
    padding: 15px;
    border-radius: 8px;
    margin-top: 15px;
}

.payment-instructions {
    background: white;
    padding: 20px;
    border-radius: 8px;
    text-align: left;
}

.payment-instructions ol {
    padding-left: 20px;
}

.payment-instructions li {
    margin-bottom: 10px;
}

.booking-summary {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.booking-summary h5 {
    color: #333;
    margin-bottom: 15px;
}

.booking-summary p {
    margin-bottom: 8px;
}

.slider-btn {
    margin-top: 20px;
}

.btn-icon {
    margin-right: 5px;
}

.contact-field label {
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
}

.contact-field input,
.contact-field select,
.contact-field textarea {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 12px 15px;
    width: 100%;
    font-size: 15px;
    transition: all 0.3s ease;
}

.contact-field input:focus,
.contact-field select:focus,
.contact-field textarea:focus {
    border-color: #cf921c;
    box-shadow: 0 0 0 0.2rem rgba(207, 146, 28, 0.25);
    outline: none;
}

#map {
    border: 2px solid #e9ecef;
}

/* Cart Summary Styles */
.cart-summary-section {
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.cart-summary-section h4 {
    color: #333;
    margin-bottom: 20px;
    font-weight: 600;
}

.cart-item-summary {
    display: flex;
    align-items: center;
    padding: 15px;
    border-bottom: 1px solid #e9ecef;
    background: #f8f9fa;
    margin-bottom: 10px;
    border-radius: 8px;
}

.cart-item-summary:last-child {
    border-bottom: none;
}

.cart-item-summary .item-image img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
    margin-right: 15px;
}

.cart-item-summary .item-details {
    flex: 1;
}

.cart-item-summary .item-details h6 {
    margin: 0 0 5px 0;
    font-weight: 600;
    color: #333;
}

.cart-item-summary .item-details small {
    margin: 0;
    font-size: 12px;
}

.cart-item-summary .item-price {
    text-align: right;
}

.cart-item-summary .item-price strong {
    color: #cf921c;
    font-size: 16px;
}

.cart-total-summary {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    border: 2px solid #e9ecef;
    margin-top: 20px;
}

.total-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 16px;
}

.total-row.final {
    font-weight: bold;
    font-size: 18px;
    color: #cf921c;
    padding-top: 10px;
    border-top: 2px solid #e9ecef;
}

@media (max-width: 768px) {
    .step-indicators {
        flex-direction: column;
        align-items: center;
    }
    
    .step-indicator {
        margin: 5px 0;
    }
    
    .cart-item-summary {
        flex-direction: column;
        text-align: center;
    }
    
    .cart-item-summary .item-image {
        margin-bottom: 10px;
    }
    
    .cart-item-summary .item-price {
        text-align: center;
        margin-top: 10px;
    }
}
</style>

<script>
// Global booking data
let bookingData = {
    cartItems: [],
    subtotal: 0,
    gstAmount: 0,
    total: 0,
    customerDetails: {}
};

document.addEventListener('DOMContentLoaded', function() {
    // Load cart data
    loadCartData();
    
    // Initialize form
    initializeForm();
    
    // Setup step navigation
    setupStepNavigation();
    
    // Setup form submissions
    setupFormSubmissions();
});

function loadCartData() {
    // Get cart data from hidden inputs
    const cartItems = document.getElementById('cart-items').value;
    const subtotal = document.getElementById('cart-subtotal').value;
    const gstAmount = document.getElementById('cart-gst').value;
    const total = document.getElementById('cart-total').value;
    
    bookingData.cartItems = JSON.parse(cartItems || '[]');
    bookingData.subtotal = parseFloat(subtotal) || 0;
    bookingData.gstAmount = parseFloat(gstAmount) || 0;
    bookingData.total = parseFloat(total) || 0;
    
    console.log('Cart data loaded:', bookingData);
    
    // Display cart summary
    displayCartSummary();
    
    // Update amount fields
    const amountField = document.getElementById('amount');
    const baseAmountField = document.getElementById('base_amount');
    const paymentAmount = document.getElementById('payment-amount');
    
    if (amountField) amountField.value = bookingData.total;
    if (baseAmountField) baseAmountField.value = bookingData.subtotal;
    if (paymentAmount) paymentAmount.textContent = '₹' + bookingData.total.toFixed(2);
    
    // Generate service name for booking
    if (bookingData.cartItems.length > 0) {
        const serviceNames = bookingData.cartItems.map(item => item.service_name).join(', ');
        bookingData.serviceName = serviceNames;
        console.log('Service name:', bookingData.serviceName);
    }
}

function displayCartSummary() {
    const summaryContent = document.getElementById('cart-summary-content');
    if (!summaryContent) return;
    
    if (bookingData.cartItems.length === 0) {
        summaryContent.innerHTML = `
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle"></i> Your cart is empty. 
                <a href="<?php echo e(route('services')); ?>" class="btn btn-sm btn-primary ml-2">Browse Services</a>
            </div>
        `;
        return;
    }
    
    let itemsHtml = '';
    bookingData.cartItems.forEach(item => {
        itemsHtml += `
            <div class="cart-item-summary">
                <div class="item-image">
                    <img src="/${item.service_image}" alt="${item.service_name}">
                </div>
                <div class="item-details">
                    <h6>${item.service_name}</h6>
                    <small class="text-muted">${item.service_category} ${item.service_time}</small>
                </div>
                <div class="item-price">
                    <strong>₹${item.service_price}</strong>
                    <span class="text-muted">× ${item.quantity}</span>
                </div>
            </div>
        `;
    });
    
    summaryContent.innerHTML = `
        <div class="cart-items-list">
            ${itemsHtml}
        </div>
        <div class="cart-total-summary">
            <div class="total-row">
                <span>Subtotal:</span>
                <span>₹${bookingData.subtotal.toFixed(2)}</span>
            </div>
            <div class="total-row">
                <span>GST (5%):</span>
                <span>₹${bookingData.gstAmount.toFixed(2)}</span>
            </div>
            <div class="total-row final">
                <span><strong>Total:</strong></span>
                <span><strong>₹${bookingData.total.toFixed(2)}</strong></span>
            </div>
        </div>
    `;
}

function initializeForm() {
    // Set minimum date to today
    const dateInput = document.getElementById('booking_date');
    if (dateInput) {
        const today = new Date().toISOString().split('T')[0];
        dateInput.setAttribute('min', today);

        
        // Add event listener to update time slots when date changes
        dateInput.addEventListener('change', function() {
            updateTimeSlots(this.value);
        });
        
        // Initialize time slots for current date
        updateTimeSlots(dateInput.value);
    }
    
    // Initialize map if needed
    initializeMap();
}

function updateTimeSlots(selectedDate) {
    const timeSelect = document.getElementById('booking_time');
    if (!timeSelect) return;
    
    // Get current date and time
    const now = new Date();
    const today = new Date().toISOString().split('T')[0];
    const isToday = selectedDate === today;
    
    // Clear existing options
    timeSelect.innerHTML = '<option value="">Select Time Slot</option>';
    
    // Generate time slots from 9 AM to 6 PM
    for (let hour = 9; hour <= 18; hour++) {
        const time = `${hour.toString().padStart(2, '0')}:00`;
        const displayTime = new Date(`2000-01-01 ${time}`).toLocaleTimeString('en-US', { 
            hour: 'numeric', 
            minute: '2-digit',
            hour12: true 
        });
        
        const endHour = hour + 1;
        const endTime = `${endHour.toString().padStart(2, '0')}:00`;
        const displayEndTime = new Date(`2000-01-01 ${endTime}`).toLocaleTimeString('en-US', { 
            hour: 'numeric', 
            minute: '2-digit',
            hour12: true 
        });
        
        // Check if slot is available
        let isAvailable = true;
        let availabilityText = '';
        
        if (isToday) {
            // For today, disable slots that have already passed or are too soon
            const slotEndTime = new Date();
            slotEndTime.setHours(endHour, 0, 0, 0);
            
            // Add 30 minutes buffer time for preparation
            const bufferTime = 30 * 60 * 1000; // 30 minutes in milliseconds
            const currentBufferTime = new Date(now.getTime() + bufferTime);
            
            // Disable slot if current time + buffer is after slot end time
            if (currentBufferTime > slotEndTime) {
                isAvailable = false;
                availabilityText = ' (Not Available)';
            }
        }
        
        const option = document.createElement('option');
        option.value = time;
        option.textContent = `${displayTime} - ${displayEndTime}${availabilityText}`;
        option.disabled = !isAvailable;
        
        timeSelect.appendChild(option);
    }
    
    // Update helper text
    const helperText = document.querySelector('#booking_time').nextElementSibling;
    if (helperText && helperText.classList.contains('form-text')) {
        if (isToday) {
            helperText.textContent = 'Time slots showing availability for today with 30-minute preparation buffer';
        } else {
            helperText.textContent = 'All time slots available for selected date';
        }
    }
}

function initializeMap() {
    const mapElement = document.getElementById('map');
    if (mapElement) {
        // Initialize with an interactive draggable map
        mapElement.innerHTML = `
            <div style="height: 100%; width: 100%; position: relative;">
                <div id="map-container" style="height: 100%; width: 100%; position: relative;">
                    <iframe 
                        id="map-iframe"
                        width="100%" 
                        height="100%" 
                        frameborder="0" 
                        style="border:0" 
                        allowfullscreen>
                    </iframe>
                    <div id="map-marker" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; cursor: move;">
                        <div style="background: #ff4757; width: 30px; height: 30px; border-radius: 50% 50% 50% 0; transform: rotate(-45deg); border: 3px solid white; box-shadow: 0 2px 5px rgba(0,0,0,0.3);"></div>
                    </div>
                </div>
                <div id="map-info" style="position: absolute; top: 10px; right: 10px; background: white; padding: 10px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.2); max-width: 250px;">
                    <small><strong>Location:</strong><br>
                    <span id="current-location">Delhi, India</span></small><br>
                    <small style="color: #666;">Drag marker or enter address</small>
                </div>
                <div id="map-controls" style="position: absolute; bottom: 10px; left: 10px; background: white; padding: 5px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.2);">
                    <button type="button" onclick="getCurrentLocation()" style="background: #007bff; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer; font-size: 12px;">
                        <i class="fas fa-location-arrow"></i> My Location
                    </button>
                </div>
            </div>
        `;
        
        // Initialize map with default location
        initializeMapWithLocation(28.6139, 77.2090, 'Delhi, India');
        
        // Add address change listener with debounce
        const addressField = document.getElementById('address');
        if (addressField) {
            let addressTimeout;
            addressField.addEventListener('input', function() {
                clearTimeout(addressTimeout);
                if (this.value.length > 5) {
                    addressTimeout = setTimeout(() => {
                        updateMapLocation(this.value);
                    }, 1000); // Wait 1 second after user stops typing
                }
            });
            
            // Also trigger on blur (when user leaves the field)
            addressField.addEventListener('blur', function() {
                if (this.value.length > 5) {
                    updateMapLocation(this.value);
                }
            });
        }
        
        // Add drag functionality to map
        addMapDragFunctionality();
    }
}

function initializeMapWithLocation(lat, lng, address) {
    const mapIframe = document.getElementById('map-iframe');
    const locationSpan = document.getElementById('current-location');
    
    if (mapIframe) {
        const bbox = `${lng - 0.01},${lat - 0.01},${lng + 0.01},${lat + 0.01}`;
        mapIframe.src = `https://www.openstreetmap.org/export/embed.html?bbox=${bbox}&layer=mapnik&marker=${lat},${lng}`;
    }
    
    if (locationSpan) {
        locationSpan.textContent = address || 'Location Selected';
    }
    
    // Update hidden coordinate fields
    const latField = document.getElementById('latitude');
    const lngField = document.getElementById('longitude');
    if (latField) latField.value = lat;
    if (lngField) lngField.value = lng;
}

function addMapDragFunctionality() {
    const mapContainer = document.getElementById('map-container');
    const mapIframe = document.getElementById('map-iframe');
    const marker = document.getElementById('map-marker');
    const addressField = document.getElementById('address');
    
    if (!mapContainer || !marker || !mapIframe) return;
    
    let isDragging = false;
    let dragTimeout;
    
    // Mouse events for desktop
    marker.addEventListener('mousedown', startDrag);
    document.addEventListener('mousemove', drag);
    document.addEventListener('mouseup', endDrag);
    
    // Touch events for mobile
    marker.addEventListener('touchstart', startDrag);
    document.addEventListener('touchmove', drag);
    document.addEventListener('touchend', endDrag);
    
    function startDrag(e) {
        isDragging = true;
        marker.style.cursor = 'grabbing';
        e.preventDefault();
    }
    
    function drag(e) {
        if (!isDragging) return;
        
        const rect = mapContainer.getBoundingClientRect();
        let x, y;
        
        if (e.touches) {
            x = e.touches[0].clientX - rect.left;
            y = e.touches[0].clientY - rect.top;
        } else {
            x = e.clientX - rect.left;
            y = e.clientY - rect.top;
        }
        
        // Update marker position
        marker.style.left = x + 'px';
        marker.style.top = y + 'px';
        
        // Calculate coordinates from position
        const lat = 28.6139 + (rect.height/2 - y) * 0.0001;
        const lng = 77.2090 + (x - rect.width/2) * 0.0001;
        
        // Update map with debounce
        clearTimeout(dragTimeout);
        dragTimeout = setTimeout(() => {
            updateMapFromCoordinates(lat, lng);
        }, 500);
    }
    
    function endDrag() {
        if (isDragging) {
            isDragging = false;
            marker.style.cursor = 'move';
            
            // Get final coordinates and reverse geocode
            const rect = mapContainer.getBoundingClientRect();
            const x = parseFloat(marker.style.left);
            const y = parseFloat(marker.style.top);
            
            const lat = 28.6139 + (rect.height/2 - y) * 0.0001;
            const lng = 77.2090 + (x - rect.width/2) * 0.0001;
            
            reverseGeocode(lat, lng);
        }
    }
}

function updateMapFromCoordinates(lat, lng) {
    const mapIframe = document.getElementById('map-iframe');
    const locationSpan = document.getElementById('current-location');
    
    if (mapIframe) {
        const bbox = `${lng - 0.01},${lat - 0.01},${lng + 0.01},${lat + 0.01}`;
        mapIframe.src = `https://www.openstreetmap.org/export/embed.html?bbox=${bbox}&layer=mapnik&marker=${lat},${lng}`;
    }
    
    if (locationSpan) {
        locationSpan.textContent = 'Updating location...';
    }
    
    // Update hidden coordinate fields
    const latField = document.getElementById('latitude');
    const lngField = document.getElementById('longitude');
    if (latField) latField.value = lat;
    if (lngField) lngField.value = lng;
}

function reverseGeocode(lat, lng) {
    const locationSpan = document.getElementById('current-location');
    const addressField = document.getElementById('address');
    
    // Use Nominatim reverse geocoding
    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
        .then(response => response.json())
        .then(data => {
            if (data && data.display_name) {
                const address = data.display_name;
                
                // Update location display
                if (locationSpan) {
                    locationSpan.textContent = address.substring(0, 50) + (address.length > 50 ? '...' : '');
                }
                
                // Update address field
                if (addressField) {
                    addressField.value = address;
                    // Trigger change event for any listeners
                    addressField.dispatchEvent(new Event('change'));
                }
                
                console.log('Address updated from map:', address);
            } else {
                // Fallback to coordinates
                if (locationSpan) {
                    locationSpan.textContent = `Lat: ${lat.toFixed(4)}, Lng: ${lng.toFixed(4)}`;
                }
                
                if (addressField) {
                    addressField.value = `Location: ${lat.toFixed(4)}, ${lng.toFixed(4)}`;
                }
            }
        })
        .catch(error => {
            console.error('Reverse geocoding error:', error);
            
            // Fallback
            if (locationSpan) {
                locationSpan.textContent = `Lat: ${lat.toFixed(4)}, Lng: ${lng.toFixed(4)}`;
            }
            
            if (addressField) {
                addressField.value = `Location: ${lat.toFixed(4)}, ${lng.toFixed(4)}`;
            }
        });
}

function getCurrentLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            position => {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                
                // Update map and reverse geocode
                updateMapFromCoordinates(lat, lng);
                reverseGeocode(lat, lng);
                
                // Center marker
                const mapContainer = document.getElementById('map-container');
                const marker = document.getElementById('map-marker');
                if (mapContainer && marker) {
                    const rect = mapContainer.getBoundingClientRect();
                    marker.style.left = (rect.width / 2) + 'px';
                    marker.style.top = (rect.height / 2) + 'px';
                }
                
                showNotification('Location detected successfully!', 'success');
            },
            error => {
                console.error('Geolocation error:', error);
                showNotification('Unable to get your location. Please enable location services.', 'error');
            }
        );
    } else {
        showNotification('Geolocation is not supported by your browser.', 'error');
    }
}

function updateMapLocation(address) {
    const mapElement = document.getElementById('map');
    const mapIframe = document.getElementById('map-iframe');
    const mapInfo = document.getElementById('map-info');
    
    if (mapElement && address) {
        // Update the info overlay
        if (mapInfo) {
            mapInfo.innerHTML = `
                <small><strong>Location Set:</strong><br>${address}</small><br>
                <small style="color: green;">Location confirmed!</small>
            `;
        }
        
        // Try to geocode the address using Nominatim (OpenStreetMap's geocoding service)
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
            .then(response => response.json())
            .then(data => {
                if (data && data.length > 0) {
                    const result = data[0];
                    const lat = parseFloat(result.lat);
                    const lon = parseFloat(result.lon);
                    
                    // Update hidden coordinate fields
                    const latInput = document.getElementById('latitude');
                    const lngInput = document.getElementById('longitude');
                    if (latInput) latInput.value = lat;
                    if (lngInput) lngInput.value = lon;
                    
                    // Update map iframe with new coordinates
                    if (mapIframe) {
                        const bbox = `${lon - 0.01},${lat - 0.01},${lon + 0.01},${lat + 0.01}`;
                        mapIframe.src = `https://www.openstreetmap.org/export/embed.html?bbox=${bbox}&layer=mapnik&marker=${lat},${lon}`;
                    }
                    
                    console.log('Location geocoded:', { address, lat, lon });
                } else {
                    // Fallback to default coordinates if geocoding fails
                    const latInput = document.getElementById('latitude');
                    const lngInput = document.getElementById('longitude');
                    if (latInput) latInput.value = '28.6139';
                    if (lngInput) lngInput.value = '77.2090';
                    
                    console.log('Geocoding failed, using default coordinates');
                }
            })
            .catch(error => {
                console.error('Geocoding error:', error);
                // Fallback to default coordinates
                const latInput = document.getElementById('latitude');
                const lngInput = document.getElementById('longitude');
                if (latInput) latInput.value = '28.6139';
                if (lngInput) lngInput.value = '77.2090';
            });
    }
}

function setLocation() {
    const addressInput = document.getElementById('address-input');
    const addressField = document.getElementById('address');
    
    if (addressInput && addressField) {
        addressField.value = addressInput.value;
        updateMapLocation(addressInput.value);
    }
}

function setupStepNavigation() {
    // Step indicator clicks
    document.querySelectorAll('.step-indicator').forEach((indicator, index) => {
        indicator.addEventListener('click', function() {
            const stepNumber = index + 1;
            if (canNavigateToStep(stepNumber)) {
                goToStep(stepNumber);
            }
        });
    });
}

function canNavigateToStep(stepNumber) {
    // Can always go back to previous steps
    const currentStep = getCurrentStep();
    if (stepNumber < currentStep) {
        return true;
    }
    
    // Can only go forward if previous steps are completed
    if (stepNumber === 2) {
        return validateStep1();
    }
    
    if (stepNumber === 3) {
        return validateStep2();
    }
    
    return false;
}

function getCurrentStep() {
    const activeStep = document.querySelector('.step-content.active');
    return parseInt(activeStep.id.replace('step-', ''));
}

function goToStep(stepNumber) {
    // Hide all steps
    document.querySelectorAll('.step-content').forEach(step => {
        step.classList.remove('active');
    });
    
    // Remove active from all indicators
    document.querySelectorAll('.step-indicator').forEach(indicator => {
        indicator.classList.remove('active');
    });
    
    // Show target step
    document.getElementById(`step-${stepNumber}`).classList.add('active');
    document.getElementById(`step-${stepNumber}-indicator`).classList.add('active');
    
    // Mark previous steps as completed
    for (let i = 1; i < stepNumber; i++) {
        document.getElementById(`step-${i}-indicator`).classList.add('completed');
    }
}

function nextStep(stepNumber) {
    if (stepNumber === 2 && validateStep1()) {
        goToStep(2);
        updatePaymentSummary();
    } else if (stepNumber === 3 && validateStep2()) {
        goToStep(3);
        updateFinalSummary();
    }
}

function previousStep(stepNumber) {
    goToStep(stepNumber);
}

function validateStep1() {
    const requiredFields = ['customer_name', 'customer_email', 'customer_phone', 'address', 'booking_date', 'booking_time'];
    let isValid = true;
    
    requiredFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (!field || !field.value.trim()) {
            if (field) {
                field.style.borderColor = '#dc3545';
            }
            isValid = false;
        } else {
            if (field) {
                field.style.borderColor = '#e9ecef';
            }
        }
    });
    
    // Email validation
    const email = document.getElementById('customer_email');
    if (email && !email.value.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
        email.style.borderColor = '#dc3545';
        isValid = false;
    }
    
    if (!isValid) {
        showNotification('Please fill in all required fields', 'error');
    }
    
    return isValid;
}

function validateStep2() {
    // Payment step validation - user confirms they've paid
    return confirm('Have you completed the payment? Click OK to continue.');
}

function updatePaymentSummary() {
    // Store step 1 data
    bookingData.customerDetails = {
        name: document.getElementById('customer_name').value,
        email: document.getElementById('customer_email').value,
        phone: document.getElementById('customer_phone').value,
        address: document.getElementById('address').value,
        date: document.getElementById('booking_date').value,
        time: document.getElementById('booking_time').value
    };
}

function updateFinalSummary() {
    const summaryContent = document.getElementById('summary-content');
    if (!summaryContent) return;
    
    let itemsHtml = '';
    bookingData.cartItems.forEach(item => {
        itemsHtml += `
            <div style="padding: 10px 0; border-bottom: 1px solid #e9ecef;">
                <strong>${item.service_name}</strong><br>
                <small>${item.service_category} - ${item.service_time}</small><br>
                <small>₹${item.service_price} × ${item.quantity} = ₹${(item.service_price * item.quantity).toFixed(2)}</small>
            </div>
        `;
    });
    
    summaryContent.innerHTML = `
        ${itemsHtml}
        <div style="padding: 15px 0; border-top: 2px solid #333; margin-top: 10px;">
            <strong>Customer Details:</strong><br>
            <small>Name: ${bookingData.customerDetails.name}</small><br>
            <small>Email: ${bookingData.customerDetails.email}</small><br>
            <small>Phone: ${bookingData.customerDetails.phone}</small><br>
            <small>Address: ${bookingData.customerDetails.address}</small><br>
            <small>Date: ${bookingData.customerDetails.date}</small><br>
            <small>Time: ${bookingData.customerDetails.time}</small>
        </div>
        <div style="padding: 15px 0; background: #fff3cd; border-radius: 5px; margin-top: 10px;">
            <strong>Payment Summary:</strong><br>
            <small>Subtotal: ₹${bookingData.subtotal.toFixed(2)}</small><br>
            <small>GST (5%): ₹${bookingData.gstAmount.toFixed(2)}</small><br>
            <strong>Total: ₹${bookingData.total.toFixed(2)}</strong>
        </div>
    `;
    
    // Populate hidden fields
    document.getElementById('final_service_name').value = bookingData.serviceName;
    document.getElementById('final_amount').value = bookingData.total;
    document.getElementById('final_base_amount').value = bookingData.subtotal;
    document.getElementById('final_customer_name').value = bookingData.customerDetails.name;
    document.getElementById('final_customer_email').value = bookingData.customerDetails.email;
    document.getElementById('final_customer_phone').value = bookingData.customerDetails.phone;
    document.getElementById('final_customer_address').value = bookingData.customerDetails.address;
    document.getElementById('final_booking_date').value = bookingData.customerDetails.date;
    document.getElementById('final_booking_time').value = bookingData.customerDetails.time;
}

function setupFormSubmissions() {
    // Step 3 form submission
    const step3Form = document.getElementById('step-3-form');
    if (step3Form) {
        step3Form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            console.log('Submitting booking with data:', bookingData);
            
            // Create form data
            const formData = new FormData(this);
            
            // Ensure all required fields are set
            formData.set('service_name', bookingData.serviceName || '');
            formData.set('amount', bookingData.total || 0);
            formData.set('base_amount', bookingData.subtotal || 0);
            formData.set('customer_name', bookingData.customerDetails.name || '');
            formData.set('customer_email', bookingData.customerDetails.email || '');
            formData.set('customer_phone', bookingData.customerDetails.phone || '');
            formData.set('customer_address', bookingData.customerDetails.address || '');
            formData.set('booking_date', bookingData.customerDetails.date || '');
            formData.set('booking_time', bookingData.customerDetails.time || '');
            
            // Add coordinates from hidden fields
            const latField = document.getElementById('latitude');
            const lngField = document.getElementById('longitude');
            if (latField && latField.value) {
                formData.set('latitude', latField.value);
            }
            if (lngField && lngField.value) {
                formData.set('longitude', lngField.value);
            }
            
            // Add cart items as array
            if (bookingData.cartItems && Array.isArray(bookingData.cartItems)) {
                bookingData.cartItems.forEach((item, index) => {
                    formData.set(`cart_items[${index}][service_name]`, item.service_name);
                    formData.set(`cart_items[${index}][service_price]`, item.service_price);
                    formData.set(`cart_items[${index}][service_image]`, item.service_image);
                    formData.set(`cart_items[${index}][service_time]`, item.service_time);
                    formData.set(`cart_items[${index}][service_category]`, item.service_category);
                    formData.set(`cart_items[${index}][quantity]`, item.quantity);
                });
            }
            
            console.log('Form data prepared:');
            for (let [key, value] of formData.entries()) {
                console.log(key + ':', value);
            }
            
            // Submit the form
            submitBooking(formData);
        });
    }
}

function submitBooking(formData) {
    const submitBtn = document.querySelector('#step-3-form button[type="submit"]');
    
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
    
    // Add debugging info
    console.log('=== DEBUG: Starting booking submission ===');
    console.log('Form data entries:');
    for (let [key, value] of formData.entries()) {
        console.log(key + ':', value);
    }
    
    fetch('<?php echo e(route("booking.store")); ?>', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        console.log('=== DEBUG: Response received ===');
        console.log('Response status:', response.status);
        console.log('Response headers:', response.headers);
        
        // Get response text for debugging
        return response.text().then(text => {
            console.log('Response text:', text);
            
            // Try to parse as JSON
            try {
                const data = JSON.parse(text);
                console.log('=== DEBUG: Parsed JSON data ===');
                console.log('Response data:', data);
                
                if (data.success) {
                    showNotification('Booking confirmed successfully! Your booking is pending verification.', 'success');
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 2000);
                } else {
                    let errorMessage = data.message || 'Booking failed';
                    if (data.errors) {
                        errorMessage += ': ' + Object.values(data.errors).flat().join(', ');
                    }
                    showNotification(errorMessage, 'error');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<i class="fas fa-check btn-icon mr-1"></i> Complete Booking';
                }
            } catch (e) {
                console.error('=== DEBUG: JSON Parse Error ===');
                console.error('Parse error:', e);
                console.error('Response text was:', text);
                
                // Show the actual response for debugging
                showNotification('Server error: ' + text.substring(0, 200) + '...', 'error');
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-check btn-icon mr-1"></i> Complete Booking';
            }
        });
    })
    .catch(error => {
        console.error('=== DEBUG: Network Error ===');
        console.error('Error:', error);
        console.error('Error details:', error.message);
        showNotification('Network error: ' + error.message, 'error');
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-check btn-icon mr-1"></i> Complete Booking';
    });
}

function showNotification(message, type) {
    // Remove existing notifications
    document.querySelectorAll('.alert').forEach(alert => alert.remove());
    
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    notification.innerHTML = `
        ${message}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 5000);
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Gloryabeauty\resources\views/frontend/booking/checkout.blade.php ENDPATH**/ ?>