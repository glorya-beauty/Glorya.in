<?php $__env->startSection('title', 'Edit Slot - Admin Panel'); ?>

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

.booking-info {
    background: #fff3cd;
    border: 1px solid #ffeaa7;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 20px;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h1 class="page-title">
                    <i class="fas fa-edit"></i> Edit Slot: <?php echo e($slot->title); ?>

                </h1>
                <p class="text-muted">Update slot details and availability</p>
            </div>
        </div>
    </div>

    <?php if($slot->current_bookings > 0): ?>
        <div class="booking-info">
            <h6><i class="fas fa-exclamation-triangle text-warning"></i> Active Bookings</h6>
            <p class="mb-0">This slot currently has <strong><?php echo e($slot->current_bookings); ?></strong> booking(s). 
               Capacity cannot be reduced below current bookings.</p>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-clock"></i> Slot Details
                    </h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.slots.update', $slot->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        
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
                                           id="title" name="title" value="<?php echo e(old('title', $slot->title)); ?>" 
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
                                               id="capacity" name="capacity" min="<?php echo e($slot->current_bookings); ?>" max="20" 
                                               value="<?php echo e(old('capacity', $slot->capacity)); ?>" required>
                                        <span class="capacity-display" id="capacityDisplay"><?php echo e(old('capacity', $slot->capacity)); ?></span>
                                    </div>
                                    <small class="text-muted">Maximum number of bookings for this slot</small>
                                    <?php if($slot->current_bookings > 0): ?>
                                        <small class="text-warning">Minimum capacity: <?php echo e($slot->current_bookings); ?> (current bookings)</small>
                                    <?php endif; ?>
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
                                          placeholder="Optional description for this slot"><?php echo e(old('description', $slot->description)); ?></textarea>
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
                                           id="start_time" name="start_time" value="<?php echo e(old('start_time', $slot->start_time->format('H:i')); ?>" required>
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
                                           id="end_time" name="end_time" value="<?php echo e(old('end_time', $slot->end_time->format('H:i')); ?>" required>
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
                                                   value="<?php echo e($index); ?>" <?php echo e(in_array($index, old('days_of_week', $slot->days_of_week ?? [])) ? 'checked' : ''); ?>>
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
                                               value="<?php echo e(old('price_adjustment', $slot->price_adjustment)); ?>" step="0.01" min="0">
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
                                               value="1" <?php echo e(old('is_active', $slot->is_active) ? 'checked' : ''); ?>>
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
                                           id="valid_from" name="valid_from" value="<?php echo e(old('valid_from', $slot->valid_from ? $slot->valid_from->format('Y-m-d') : '')); ?>">
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
                                           id="valid_until" name="valid_until" value="<?php echo e(old('valid_until', $slot->valid_until ? $slot->valid_until->format('Y-m-d') : '')); ?>">
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

                        <!-- Current Bookings Info -->
                        <div class="form-section">
                            <h6 class="mb-3">Current Status</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <h4 class="text-primary"><?php echo e($slot->current_bookings); ?></h4>
                                        <small class="text-muted">Current Bookings</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <h4 class="text-info"><?php echo e($slot->capacity); ?></h4>
                                        <small class="text-muted">Total Capacity</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <h4 class="text-success"><?php echo e($slot->available_capacity); ?></h4>
                                        <small class="text-muted">Available</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <a href="<?php echo e(route('admin.slots.index')); ?>" class="btn btn-secondary">
                                            <i class="fas fa-arrow-left"></i> Back to Slots
                                        </a>
                                        <a href="<?php echo e(route('admin.slots.show', $slot->id)); ?>" class="btn btn-outline-info ms-2">
                                            <i class="fas fa-eye"></i> View Details
                                        </a>
                                    </div>
                                    <div>
                                        <button type="reset" class="btn btn-outline-warning me-2">
                                            <i class="fas fa-redo"></i> Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Update Slot
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
                        <i class="fas fa-info-circle"></i> Editing Tips
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6><i class="fas fa-exclamation-triangle text-warning"></i> Capacity Warning</h6>
                        <p class="small text-muted">You cannot reduce capacity below the current number of bookings (<?php echo e($slot->current_bookings); ?>).</p>
                    </div>
                    
                    <div class="mb-3">
                        <h6><i class="fas fa-clock text-primary"></i> Time Changes</h6>
                        <p class="small text-muted">Be careful when changing times as it may affect existing bookings.</p>
                    </div>
                    
                    <div class="mb-3">
                        <h6><i class="fas fa-calendar text-warning"></i> Days Selection</h6>
                        <p class="small text-muted">Modify available days based on seasonal demand or staff availability.</p>
                    </div>
                    
                    <div>
                        <h6><i class="fas fa-toggle-on text-secondary"></i> Quick Toggle</h6>
                        <p class="small text-muted">Use the active toggle to temporarily disable slots without deleting them.</p>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="fas fa-chart-line"></i> Slot Performance
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small">Occupancy Rate:</span>
                            <strong><?php echo e(round(($slot->current_bookings / $slot->capacity) * 100, 1)); ?>%</strong>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar <?php echo e(($slot->current_bookings / $slot->capacity) > 0.8 ? 'bg-danger' : (($slot->current_bookings / $slot->capacity) > 0.5 ? 'bg-warning' : 'bg-success')); ?>" 
                                 style="width: <?php echo e(($slot->current_bookings / $slot->capacity) * 100); ?>%"></div>
                        </div>
                    </div>
                    
                    <div class="small text-muted">
                        <?php if($slot->current_bookings >= $slot->capacity): ?>
                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Slot is fully booked</span>
                        <?php elseif($slot->current_bookings > ($slot->capacity * 0.8)): ?>
                            <span class="text-warning"><i class="fas fa-exclamation-triangle"></i> Slot is almost full</span>
                        <?php else: ?>
                            <span class="text-success"><i class="fas fa-check-circle"></i> Good availability</span>
                        <?php endif; ?>
                    </div>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Glorya.in\resources\views/admin/slots/edit.blade.php ENDPATH**/ ?>