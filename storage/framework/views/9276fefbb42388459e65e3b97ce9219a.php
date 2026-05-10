<?php $__env->startSection('title', 'Create Slot - Admin Panel'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.form-section {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}

.day-checkbox {
    margin-right: 10px;
}

.day-checkbox label {
    cursor: pointer;
    padding: 8px 12px;
    border-radius: 20px;
    border: 2px solid #dee2e6;
    background: white;
    transition: all 0.3s ease;
    display: inline-block;
    margin-bottom: 5px;
}

.day-checkbox input[type="checkbox"]:checked + label {
    background: #007bff;
    color: white;
    border-color: #007bff;
}

.day-checkbox input[type="checkbox"] {
    display: none;
}

.time-input-group {
    display: flex;
    gap: 15px;
    align-items: center;
}

.capacity-slider {
    width: 100%;
}

.capacity-display {
    background: #007bff;
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    font-weight: bold;
    min-width: 60px;
    text-align: center;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h1 class="page-title">
                    <i class="fas fa-plus"></i> Create New Slot
                </h1>
                <p class="text-muted">Add a new booking time slot</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-clock"></i> Slot Details
                    </h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.slots.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        
                        <!-- Basic Information -->
                        <div class="form-section">
                            <h6 class="mb-3">Basic Information</h6>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Slot Title *</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> ? 'is-invalid' : ''" 
                                           id="title" name="title" value="<?php echo e(old('title')); ?>" 
                                           placeholder="e.g., Morning Slot, Evening Slot" required>
                                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="capacity" class="form-label">Capacity *</label>
                                    <div class="d-flex align-items-center gap-3">
                                        <input type="range" class="form-range capacity-slider" 
                                               id="capacity" name="capacity" min="1" max="20" value="<?php echo e(old('capacity', 1)); ?>" required>
                                        <span class="capacity-display" id="capacityDisplay"><?php echo e(old('capacity', 1)); ?></span>
                                    </div>
                                    <small class="text-muted">Maximum number of bookings for this slot</small>
                                    <?php $__errorArgs = ['capacity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> ? 'is-invalid' : ''" 
                                          id="description" name="description" rows="3" 
                                          placeholder="Optional description for this slot"><?php echo e(old('description')); ?></textarea>
                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Time Settings -->
                        <div class="form-section">
                            <h6 class="mb-3">Time Settings</h6>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="start_time" class="form-label">Start Time *</label>
                                    <input type="time" class="form-control <?php $__errorArgs = ['start_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> ? 'is-invalid' : ''" 
                                           id="start_time" name="start_time" value="<?php echo e(old('start_time')); ?>" required>
                                    <?php $__errorArgs = ['start_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="end_time" class="form-label">End Time *</label>
                                    <input type="time" class="form-control <?php $__errorArgs = ['end_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> ? 'is-invalid' : ''" 
                                           id="end_time" name="end_time" value="<?php echo e(old('end_time')); ?>" required>
                                    <?php $__errorArgs = ['end_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Days of Week -->
                        <div class="form-section">
                            <h6 class="mb-3">Available Days *</h6>
                            <p class="text-muted">Select the days when this slot is available</p>
                            
                            <div class="row">
                                <?php $__currentLoopData = $daysOfWeek; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-4 mb-2">
                                        <div class="day-checkbox">
                                            <input type="checkbox" id="day_<?php echo e($index); ?>" name="days_of_week[]" 
                                                   value="<?php echo e($index); ?>" <?php echo e(in_array($index, old('days_of_week', [])) ? 'checked' : ''); ?>>
                                            <label for="day_<?php echo e($index); ?>">
                                                <i class="fas fa-calendar-day"></i> <?php echo e($day); ?>

                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php $__errorArgs = ['days_of_week'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Pricing & Validity -->
                        <div class="form-section">
                            <h6 class="mb-3">Pricing & Validity</h6>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="price_adjustment" class="form-label">Price Adjustment</label>
                                    <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control <?php $__errorArgs = ['price_adjustment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> ? 'is-invalid' : ''" 
                                               id="price_adjustment" name="price_adjustment" 
                                               value="<?php echo e(old('price_adjustment', 0)); ?>" step="0.01" min="0">
                                    </div>
                                    <small class="text-muted">Additional amount to charge for this slot (0 for no adjustment)</small>
                                    <?php $__errorArgs = ['price_adjustment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="is_active" class="form-label">Status</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                               value="1" <?php echo e(old('is_active', true) ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="is_active">
                                            Active Slot
                                        </label>
                                    </div>
                                    <small class="text-muted">Inactive slots won't be available for booking</small>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="valid_from" class="form-label">Valid From</label>
                                    <input type="date" class="form-control <?php $__errorArgs = ['valid_from'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> ? 'is-invalid' : ''" 
                                           id="valid_from" name="valid_from" value="<?php echo e(old('valid_from')); ?>">
                                    <small class="text-muted">Slot becomes available from this date (optional)</small>
                                    <?php $__errorArgs = ['valid_from'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="valid_until" class="form-label">Valid Until</label>
                                    <input type="date" class="form-control <?php $__errorArgs = ['valid_until'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> ? 'is-invalid' : ''" 
                                           id="valid_until" name="valid_until" value="<?php echo e(old('valid_until')); ?>">
                                    <small class="text-muted">Slot expires after this date (optional)</small>
                                    <?php $__errorArgs = ['valid_until'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <a href="<?php echo e(route('admin.slots.index')); ?>" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Back to Slots
                                    </a>
                                    <div>
                                        <button type="reset" class="btn btn-outline-warning me-2">
                                            <i class="fas fa-redo"></i> Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Create Slot
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right Sidebar - Help Information -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="fas fa-info-circle"></i> Quick Tips
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6><i class="fas fa-clock text-primary"></i> Time Slots</h6>
                        <p class="small text-muted">Create time slots that align with your business hours. Make sure end time is after start time.</p>
                    </div>
                    
                    <div class="mb-3">
                        <h6><i class="fas fa-users text-success"></i> Capacity</h6>
                        <p class="small text-muted">Set the maximum number of bookings you can handle during this time slot.</p>
                    </div>
                    
                    <div class="mb-3">
                        <h6><i class="fas fa-calendar text-warning"></i> Days Selection</h6>
                        <p class="small text-muted">Choose specific days when this slot is available. You can select multiple days.</p>
                    </div>
                    
                    <div class="mb-3">
                        <h6><i class="fas fa-rupee-sign text-info"></i> Price Adjustment</h6>
                        <p class="small text-muted">Add extra charges for premium time slots like weekends or peak hours.</p>
                    </div>
                    
                    <div>
                        <h6><i class="fas fa-toggle-on text-secondary"></i> Active Status</h6>
                        <p class="small text-muted">Toggle slots on/off without deleting them. Perfect for seasonal availability.</p>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="fas fa-lightbulb"></i> Best Practices
                    </h6>
                </div>
                <div class="card-body">
                    <ul class="small">
                        <li>Create slots in 1-2 hour intervals</li>
                        <li>Consider staff availability when setting capacity</li>
                        <li>Use price adjustments for peak hours</li>
                        <li>Set validity dates for seasonal offers</li>
                        <li>Keep descriptions clear and concise</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
// Update capacity display
document.getElementById('capacity').addEventListener('input', function() {
    document.getElementById('capacityDisplay').textContent = this.value;
});

// Form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const daysChecked = document.querySelectorAll('input[name="days_of_week[]"]:checked').length;
    if (daysChecked === 0) {
        e.preventDefault();
        alert('Please select at least one day of the week.');
        return false;
    }
    
    const startTime = document.getElementById('start_time').value;
    const endTime = document.getElementById('end_time').value;
    if (startTime >= endTime) {
        e.preventDefault();
        alert('End time must be after start time.');
        return false;
    }
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Glorya.in\resources\views/admin/slots/create.blade.php ENDPATH**/ ?>