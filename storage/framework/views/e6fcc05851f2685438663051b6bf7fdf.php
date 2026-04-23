<?php $__env->startSection('title', 'Book Services - Glorya Beauty'); ?>

<?php $__env->startSection('content'); ?>
<div class="booking-page">
    <!-- Progress Bar -->
    <div class="booking-progress">
        <div class="progress-container">
            <div class="progress-step active" id="step1">
                <div class="step-number">1</div>
                <div class="step-label">Cart Review</div>
            </div>
            <div class="progress-line"></div>
            <div class="progress-step" id="step2">
                <div class="step-number">2</div>
                <div class="step-label">Personal Info</div>
            </div>
            <div class="progress-line"></div>
            <div class="progress-step" id="step3">
                <div class="step-number">3</div>
                <div class="step-label">Schedule</div>
            </div>
            <div class="progress-line"></div>
            <div class="progress-step" id="step4">
                <div class="step-number">4</div>
                <div class="step-label">Confirmation</div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="booking-container">
                    <!-- Step 1: Cart Review -->
                    <div class="booking-step active" id="booking-step1">
                        <div class="step-header">
                            <h2><i class="fas fa-shopping-cart"></i> Review Your Cart</h2>
                            <p>Review your selected services before proceeding</p>
                        </div>
                        
                        <?php if($cart && $cart->items->count() > 0): ?>
                            <div class="cart-review">
                                <?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="cart-item-review">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="<?php echo e(asset($item->service_image)); ?>" alt="<?php echo e($item->service_name); ?>" class="service-img">
                                            </div>
                                            <div class="col-md-6">
                                                <h5><?php echo e($item->service_name); ?></h5>
                                                <p class="text-muted"><?php echo e($item->service_category); ?></p>
                                                <p class="text-muted"><i class="fas fa-clock"></i> <?php echo e($item->service_time); ?></p>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="price-info">
                                                    <p class="price">₹<?php echo e(number_format($item->service_price, 2)); ?></p>
                                                    <p class="quantity">Qty: <?php echo e($item->quantity); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <p class="subtotal">₹<?php echo e(number_format($item->service_price * $item->quantity, 2)); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            
                            <div class="cart-summary-review">
                                <div class="summary-row">
                                    <span>Subtotal (<?php echo e($cart->total_items); ?> items)</span>
                                    <span>₹<?php echo e(number_format($subtotal, 2)); ?></span>
                                </div>
                                <div class="summary-row">
                                    <span>GST (5%)</span>
                                    <span>₹<?php echo e(number_format($gstAmount, 2)); ?></span>
                                </div>
                                <div class="summary-row total">
                                    <span>Total Amount</span>
                                    <span>₹<?php echo e(number_format($total, 2)); ?></span>
                                </div>
                            </div>
                            
                            <div class="step-actions">
                                <button class="btn btn-outline-secondary" onclick="window.location.href='<?php echo e(route('services')); ?>'">
                                    <i class="fas fa-arrow-left"></i> Back to Services
                                </button>
                                <button class="btn btn-primary" onclick="nextStep(2)">
                                    Continue <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        <?php else: ?>
                            <div class="empty-cart">
                                <i class="fas fa-shopping-cart fa-4x text-muted mb-3"></i>
                                <h3>Your cart is empty</h3>
                                <p class="text-muted">Add some services to get started!</p>
                                <a href="<?php echo e(route('services')); ?>" class="btn btn-primary">
                                    <i class="fas fa-arrow-left"></i> Continue Shopping
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Step 2: Personal Information -->
                    <div class="booking-step" id="booking-step2">
                        <div class="step-header">
                            <h2><i class="fas fa-user"></i> Personal Information</h2>
                            <p>Please provide your contact details</p>
                        </div>
                        
                        <form id="personalInfoForm" class="booking-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Full Name *</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                        <div class="invalid-feedback">Please enter your full name</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Address *</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                        <div class="invalid-feedback">Please enter a valid email</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number *</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" required>
                                        <div class="invalid-feedback">Please enter your phone number</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Service Address *</label>
                                        <input type="text" class="form-control" id="address" name="address" required>
                                        <div class="invalid-feedback">Please enter your service address</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="notes">Special Requests (Optional)</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Any special requirements or requests..."></textarea>
                            </div>
                            
                            <div class="step-actions">
                                <button type="button" class="btn btn-outline-secondary" onclick="prevStep(1)">
                                    <i class="fas fa-arrow-left"></i> Previous
                                </button>
                                <button type="button" class="btn btn-primary" onclick="validateAndNext(3)">
                                    Continue <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Step 3: Schedule -->
                    <div class="booking-step" id="booking-step3">
                        <div class="step-header">
                            <h2><i class="fas fa-calendar"></i> Schedule Your Appointment</h2>
                            <p>Choose your preferred date and time</p>
                        </div>
                        
                        <form id="scheduleForm" class="booking-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date">Preferred Date *</label>
                                        <input type="date" class="form-control" id="date" name="date" required>
                                        <div class="invalid-feedback">Please select a date</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="time">Preferred Time *</label>
                                        <select class="form-control" id="time" name="time" required>
                                            <option value="">Select Time</option>
                                            <option value="09:00">09:00 AM</option>
                                            <option value="10:00">10:00 AM</option>
                                            <option value="11:00">11:00 AM</option>
                                            <option value="12:00">12:00 PM</option>
                                            <option value="13:00">01:00 PM</option>
                                            <option value="14:00">02:00 PM</option>
                                            <option value="15:00">03:00 PM</option>
                                            <option value="16:00">04:00 PM</option>
                                            <option value="17:00">05:00 PM</option>
                                            <option value="18:00">06:00 PM</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a time</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="time-slots">
                                <h5>Quick Time Selection</h5>
                                <div class="slot-grid">
                                    <button type="button" class="time-slot" onclick="selectTime('09:00')">09:00 AM</button>
                                    <button type="button" class="time-slot" onclick="selectTime('10:00')">10:00 AM</button>
                                    <button type="button" class="time-slot" onclick="selectTime('11:00')">11:00 AM</button>
                                    <button type="button" class="time-slot" onclick="selectTime('12:00')">12:00 PM</button>
                                    <button type="button" class="time-slot" onclick="selectTime('13:00')">01:00 PM</button>
                                    <button type="button" class="time-slot" onclick="selectTime('14:00')">02:00 PM</button>
                                    <button type="button" class="time-slot" onclick="selectTime('15:00')">03:00 PM</button>
                                    <button type="button" class="time-slot" onclick="selectTime('16:00')">04:00 PM</button>
                                    <button type="button" class="time-slot" onclick="selectTime('17:00')">05:00 PM</button>
                                    <button type="button" class="time-slot" onclick="selectTime('18:00')">06:00 PM</button>
                                </div>
                            </div>
                            
                            <div class="step-actions">
                                <button type="button" class="btn btn-outline-secondary" onclick="prevStep(2)">
                                    <i class="fas fa-arrow-left"></i> Previous
                                </button>
                                <button type="button" class="btn btn-primary" onclick="validateScheduleAndNext(4)">
                                    Continue <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Step 4: Confirmation -->
                    <div class="booking-step" id="booking-step4">
                        <div class="step-header">
                            <h2><i class="fas fa-check-circle"></i> Booking Confirmation</h2>
                            <p>Please review your booking details</p>
                        </div>
                        
                        <div class="confirmation-summary">
                            <div class="summary-section">
                                <h5><i class="fas fa-user"></i> Personal Information</h5>
                                <div class="info-grid">
                                    <div class="info-item">
                                        <span class="label">Name:</span>
                                        <span class="value" id="confirm-name"></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Email:</span>
                                        <span class="value" id="confirm-email"></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Phone:</span>
                                        <span class="value" id="confirm-phone"></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Address:</span>
                                        <span class="value" id="confirm-address"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="summary-section">
                                <h5><i class="fas fa-calendar"></i> Schedule</h5>
                                <div class="info-grid">
                                    <div class="info-item">
                                        <span class="label">Date:</span>
                                        <span class="value" id="confirm-date"></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Time:</span>
                                        <span class="value" id="confirm-time"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="summary-section">
                                <h5><i class="fas fa-shopping-cart"></i> Order Summary</h5>
                                <div class="price-summary">
                                    <div class="price-row">
                                        <span>Subtotal:</span>
                                        <span>₹<?php echo e(number_format($subtotal, 2)); ?></span>
                                    </div>
                                    <div class="price-row">
                                        <span>GST (5%):</span>
                                        <span>₹<?php echo e(number_format($gstAmount, 2)); ?></span>
                                    </div>
                                    <div class="price-row total">
                                        <span>Total:</span>
                                        <span>₹<?php echo e(number_format($total, 2)); ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <?php if(isset($notes) && $notes): ?>
                            <div class="summary-section">
                                <h5><i class="fas fa-sticky-note"></i> Special Requests</h5>
                                <p id="confirm-notes"><?php echo e($notes); ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="step-actions">
                            <button type="button" class="btn btn-outline-secondary" onclick="prevStep(3)">
                                <i class="fas fa-arrow-left"></i> Previous
                            </button>
                            <button type="button" class="btn btn-success btn-lg" onclick="submitBooking()">
                                <i class="fas fa-check"></i> Confirm Booking
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.booking-page {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
    padding: 40px 0;
}

.booking-progress {
    margin-bottom: 40px;
}

.progress-container {
    display: flex;
    align-items: center;
    justify-content: center;
    max-width: 600px;
    margin: 0 auto;
}

.progress-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    z-index: 2;
}

.step-number {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #e9ecef;
    color: #6c757d;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin-bottom: 8px;
    transition: all 0.3s ease;
}

.progress-step.active .step-number {
    background: linear-gradient(135deg, #cf921c 0%, #d4a574 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(207, 146, 28, 0.3);
}

.progress-step.completed .step-number {
    background: #28a745;
    color: white;
}

.step-label {
    font-size: 12px;
    color: #6c757d;
    text-align: center;
    max-width: 80px;
}

.progress-step.active .step-label {
    color: #cf921c;
    font-weight: 600;
}

.progress-line {
    width: 60px;
    height: 2px;
    background: #e9ecef;
    margin: 0 10px;
    margin-top: -20px;
}

.booking-container {
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    overflow: hidden;
}

.booking-step {
    display: none;
    padding: 40px;
}

.booking-step.active {
    display: block;
}

.step-header {
    text-align: center;
    margin-bottom: 40px;
}

.step-header h2 {
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
}

.step-header h2 i {
    color: #cf921c;
    margin-right: 10px;
}

.step-header p {
    color: #6c757d;
    font-size: 16px;
}

.cart-review {
    margin-bottom: 30px;
}

.cart-item-review {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 15px;
    transition: all 0.3s ease;
}

.cart-item-review:hover {
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.service-img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 10px;
}

.price-info {
    text-align: center;
}

.price-info .price {
    font-size: 18px;
    font-weight: bold;
    color: #cf921c;
    margin: 0;
}

.price-info .quantity {
    color: #6c757d;
    margin: 0;
}

.cart-item-review .subtotal {
    font-size: 18px;
    font-weight: bold;
    color: #28a745;
    text-align: right;
    margin: 0;
}

.cart-summary-review {
    background: linear-gradient(135deg, #cf921c 0%, #d4a574 100%);
    color: white;
    padding: 25px;
    border-radius: 15px;
    margin-bottom: 30px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 12px;
    font-size: 16px;
}

.summary-row.total {
    border-top: 2px solid rgba(255,255,255,0.3);
    padding-top: 12px;
    font-weight: bold;
    font-size: 18px;
}

.booking-form {
    max-width: 600px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
}

.form-control {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 12px 15px;
    font-size: 16px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #cf921c;
    box-shadow: 0 0 0 0.2rem rgba(207, 146, 28, 0.25);
    outline: none;
}

.form-control.is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 14px;
    margin-top: 5px;
}

.time-slots {
    margin-top: 30px;
}

.time-slots h5 {
    margin-bottom: 15px;
    color: #333;
}

.slot-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
    gap: 10px;
}

.time-slot {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 10px;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.time-slot:hover {
    background: #e9ecef;
    border-color: #cf921c;
}

.time-slot.selected {
    background: linear-gradient(135deg, #cf921c 0%, #d4a574 100%);
    color: white;
    border-color: #cf921c;
}

.confirmation-summary {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 30px;
    margin-bottom: 30px;
}

.summary-section {
    margin-bottom: 30px;
}

.summary-section h5 {
    color: #333;
    margin-bottom: 15px;
    font-weight: 600;
}

.summary-section h5 i {
    color: #cf921c;
    margin-right: 8px;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}

.info-item {
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid #e9ecef;
}

.info-item .label {
    font-weight: 600;
    color: #6c757d;
}

.info-item .value {
    color: #333;
}

.price-summary {
    background: white;
    border-radius: 10px;
    padding: 20px;
    border: 1px solid #e9ecef;
}

.price-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 16px;
}

.price-row.total {
    border-top: 2px solid #e9ecef;
    padding-top: 10px;
    font-weight: bold;
    font-size: 18px;
    color: #cf921c;
}

.step-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 40px;
    padding-top: 30px;
    border-top: 1px solid #e9ecef;
}

.btn {
    padding: 12px 30px;
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.btn-primary {
    background: linear-gradient(135deg, #cf921c 0%, #d4a574 100%);
    color: white;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(207, 146, 28, 0.3);
}

.btn-success {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
}

.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(40, 167, 69, 0.3);
}

.btn-outline-secondary {
    background: transparent;
    color: #6c757d;
    border: 2px solid #6c757d;
}

.btn-outline-secondary:hover {
    background: #6c757d;
    color: white;
}

.empty-cart {
    text-align: center;
    padding: 60px 20px;
    color: #6c757d;
}

@media (max-width: 768px) {
    .booking-page {
        padding: 20px 0;
    }
    
    .progress-container {
        flex-direction: column;
        gap: 20px;
    }
    
    .progress-line {
        display: none;
    }
    
    .booking-step {
        padding: 20px;
    }
    
    .step-actions {
        flex-direction: column;
        gap: 15px;
    }
    
    .btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script>
let currentStep = 1;
let bookingData = {};

// Initialize date minimum
document.addEventListener('DOMContentLoaded', function() {
    const today = new Date().toISOString().split('T')[0];
    const dateInput = document.getElementById('date');
    if (dateInput) {
        dateInput.setAttribute('min', today);
    }
    
    // Pre-fill user data if available
    <?php if(auth()->check()): ?>
        document.getElementById('name').value = '<?php echo e(auth()->user()->name ?? ''); ?>';
        document.getElementById('email').value = '<?php echo e(auth()->user()->email ?? ''); ?>';
        document.getElementById('phone').value = '<?php echo e(auth()->user()->phone ?? ''); ?>';
    <?php endif; ?>
});

function nextStep(step) {
    if (validateCurrentStep()) {
        showStep(step);
    }
}

function prevStep(step) {
    showStep(step);
}

function showStep(step) {
    // Hide all steps
    document.querySelectorAll('.booking-step').forEach(el => {
        el.classList.remove('active');
    });
    
    // Remove active from all progress steps
    document.querySelectorAll('.progress-step').forEach(el => {
        el.classList.remove('active');
    });
    
    // Show current step
    document.getElementById(`booking-step${step}`).classList.add('active');
    document.getElementById(`step${step}`).classList.add('active');
    
    // Mark previous steps as completed
    for (let i = 1; i < step; i++) {
        document.getElementById(`step${i}`).classList.add('completed');
    }
    
    currentStep = step;
    window.scrollTo(0, 0);
}

function validateCurrentStep() {
    if (currentStep === 1) {
        return true; // Cart review doesn't need validation
    }
    return false;
}

function validateAndNext(step) {
    const form = document.getElementById('personalInfoForm');
    if (validatePersonalInfo()) {
        // Save data
        bookingData.name = document.getElementById('name').value;
        bookingData.email = document.getElementById('email').value;
        bookingData.phone = document.getElementById('phone').value;
        bookingData.address = document.getElementById('address').value;
        bookingData.notes = document.getElementById('notes').value;
        
        nextStep(step);
    }
}

function validatePersonalInfo() {
    let isValid = true;
    const fields = ['name', 'email', 'phone', 'address'];
    
    fields.forEach(field => {
        const input = document.getElementById(field);
        const feedback = input.nextElementSibling;
        
        if (!input.value.trim()) {
            input.classList.add('is-invalid');
            isValid = false;
        } else {
            input.classList.remove('is-invalid');
        }
    });
    
    // Email validation
    const emailInput = document.getElementById('email');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailInput.value)) {
        emailInput.classList.add('is-invalid');
        isValid = false;
    }
    
    return isValid;
}

function validateScheduleAndNext(step) {
    if (validateSchedule()) {
        // Save schedule data
        bookingData.date = document.getElementById('date').value;
        bookingData.time = document.getElementById('time').value;
        
        // Update confirmation
        updateConfirmation();
        nextStep(step);
    }
}

function validateSchedule() {
    let isValid = true;
    const dateInput = document.getElementById('date');
    const timeInput = document.getElementById('time');
    
    if (!dateInput.value) {
        dateInput.classList.add('is-invalid');
        isValid = false;
    } else {
        dateInput.classList.remove('is-invalid');
    }
    
    if (!timeInput.value) {
        timeInput.classList.add('is-invalid');
        isValid = false;
    } else {
        timeInput.classList.remove('is-invalid');
    }
    
    return isValid;
}

function selectTime(time) {
    document.getElementById('time').value = time;
    
    // Update selected state
    document.querySelectorAll('.time-slot').forEach(slot => {
        slot.classList.remove('selected');
    });
    event.target.classList.add('selected');
}

function updateConfirmation() {
    document.getElementById('confirm-name').textContent = bookingData.name;
    document.getElementById('confirm-email').textContent = bookingData.email;
    document.getElementById('confirm-phone').textContent = bookingData.phone;
    document.getElementById('confirm-address').textContent = bookingData.address;
    document.getElementById('confirm-date').textContent = formatDate(bookingData.date);
    document.getElementById('confirm-time').textContent = formatTime(bookingData.time);
    
    if (bookingData.notes) {
        document.getElementById('confirm-notes').textContent = bookingData.notes;
    }
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    });
}

function formatTime(timeString) {
    const [hours, minutes] = timeString.split(':');
    const hour = parseInt(hours);
    const ampm = hour >= 12 ? 'PM' : 'AM';
    const displayHour = hour > 12 ? hour - 12 : hour;
    return `${displayHour}:${minutes} ${ampm}`;
}

function submitBooking() {
    showLoading();
    
    // Add cart items to booking data
    bookingData.cart_items = <?php echo json_encode($cart->items ?? [], 15, 512) ?>;
    bookingData.subtotal = <?php echo e($subtotal ?? 0); ?>;
    bookingData.gst_amount = <?php echo e($gstAmount ?? 0); ?>;
    bookingData.total = <?php echo e($total ?? 0); ?>;
    
    $.ajax({
        url: '<?php echo e(route("booking.store")); ?>',
        type: 'POST',
        data: {
            '_token': '<?php echo e(csrf_token()); ?>',
            ...bookingData
        },
        success: function(response) {
            hideLoading();
            if (response.success) {
                showNotification('Booking confirmed successfully!', 'success');
                setTimeout(() => {
                    window.location.href = response.redirect;
                }, 2000);
            } else {
                showNotification(response.message || 'Booking failed', 'error');
            }
        },
        error: function(xhr) {
            hideLoading();
            const message = xhr.responseJSON?.message || 'Booking failed. Please try again.';
            showNotification(message, 'error');
        }
    });
}

function showLoading() {
    if (!$('#loadingOverlay').length) {
        $('body').append(`
            <div id="loadingOverlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; display: flex; align-items: center; justify-content: center;">
                <div style="background: white; padding: 30px; border-radius: 10px; text-align: center;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <p class="mt-3 mb-0">Processing your booking...</p>
                </div>
            </div>
        `);
    }
}

function hideLoading() {
    $('#loadingOverlay').remove();
}

function showNotification(message, type) {
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
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Gloryabeauty\resources\views/frontend/booking/multistep.blade.php ENDPATH**/ ?>