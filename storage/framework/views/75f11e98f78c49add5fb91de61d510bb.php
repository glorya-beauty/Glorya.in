<?php $__env->startSection('title', 'Manage Slots - Admin Panel'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.slot-card {
    transition: all 0.3s ease;
    border-left: 4px solid #007bff;
}

.slot-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.slot-card.inactive {
    border-left-color: #6c757d;
    opacity: 0.7;
}

.slot-card.full {
    border-left-color: #dc3545;
}

.capacity-badge {
    font-size: 0.875rem;
}

.time-badge {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 4px 8px;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 500;
}

.days-badge {
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    padding: 2px 6px;
    border-radius: 12px;
    font-size: 0.75rem;
    margin-right: 2px;
}

.status-toggle {
    cursor: pointer;
    transition: all 0.2s ease;
}

.status-toggle:hover {
    transform: scale(1.1);
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="page-title">
                        <i class="fas fa-clock"></i> Manage Slots
                    </h1>
                    <p class="text-muted">Manage booking time slots and availability</p>
                </div>
                <div class="page-actions">
                    <a href="<?php echo e(route('admin.slots.create')); ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Slot
                    </a>
                    <button type="button" class="btn btn-warning" onclick="confirmResetBookings()">
                        <i class="fas fa-redo"></i> Reset All Bookings
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0"><?php echo e($slots->count()); ?></h4>
                            <p class="mb-0">Total Slots</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0"><?php echo e($slots->where('is_active', true)->count()); ?></h4>
                            <p class="mb-0">Active Slots</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0"><?php echo e($slots->where('current_bookings', '>', 0)->sum('current_bookings')); ?></h4>
                            <p class="mb-0">Total Bookings</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-calendar-check fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0"><?php echo e($slots->filter(function($slot) { return $slot->current_bookings >= $slot->capacity; })->count()); ?></h4>
                            <p class="mb-0">Full Slots</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-exclamation-triangle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Slots List -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        <i class="fas fa-list"></i> All Slots
                    </h5>
                </div>
                <div class="card-body">
                    <?php if($slots->count() > 0): ?>
                        <div class="row">
                            <?php $__currentLoopData = $slots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-6 col-xl-4 mb-4">
                                    <div class="card slot-card <?php echo e(!$slot->is_active ? 'inactive' : ''); ?> <?php echo e($slot->current_bookings >= $slot->capacity ? 'full' : ''); ?>">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h6 class="mb-0"><?php echo e($slot->title); ?></h6>
                                            <div class="d-flex align-items-center">
                                                <span class="status-toggle" onclick="toggleStatus(<?php echo e($slot->id); ?>)">
                                                    <?php if($slot->is_active): ?>
                                                        <i class="fas fa-toggle-on text-success fa-lg"></i>
                                                    <?php else: ?>
                                                        <i class="fas fa-toggle-off text-secondary fa-lg"></i>
                                                    <?php endif; ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <span class="time-badge">
                                                    <i class="fas fa-clock"></i> <?php echo e($slot->time_range); ?>

                                                </span>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <small class="text-muted">Available Days:</small><br>
                                                <?php $__currentLoopData = $slot->days_of_week ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span class="days-badge"><?php echo e(['Sun','Mon','Tue','Wed','Thu','Fri','Sat'][$day]); ?></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <small class="text-muted">Capacity:</small><br>
                                                    <span class="capacity-badge badge bg-info">
                                                        <?php echo e($slot->current_bookings); ?> / <?php echo e($slot->capacity); ?>

                                                    </span>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <small class="text-muted">Available:</small><br>
                                                    <span class="capacity-badge badge <?php echo e($slot->available_capacity > 0 ? 'bg-success' : 'bg-danger'); ?>">
                                                        <?php echo e($slot->available_capacity); ?>

                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <?php if($slot->price_adjustment > 0): ?>
                                                <div class="mb-3">
                                                    <small class="text-muted">Price Adjustment:</small><br>
                                                    <span class="badge bg-warning">
                                                        +₹<?php echo e(number_format($slot->price_adjustment, 2)); ?>

                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <?php if($slot->description): ?>
                                                <div class="mb-3">
                                                    <small class="text-muted"><?php echo e(Str::limit($slot->description, 80)); ?></small>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <?php if($slot->valid_from || $slot->valid_until): ?>
                                                <div class="mb-3">
                                                    <small class="text-muted">
                                                        <?php if($slot->valid_from): ?>
                                                            Valid from: <?php echo e($slot->valid_from->format('M d, Y')); ?>

                                                        <?php endif; ?>
                                                        <?php if($slot->valid_from && $slot->valid_until): ?> | <?php endif; ?>
                                                        <?php if($slot->valid_until): ?>
                                                            until: <?php echo e($slot->valid_until->format('M d, Y')); ?>

                                                        <?php endif; ?>
                                                    </small>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-footer bg-white">
                                            <div class="btn-group w-100" role="group">
                                                <a href="<?php echo e(route('admin.slots.show', $slot->id)); ?>" class="btn btn-outline-primary btn-sm">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                                <a href="<?php echo e(route('admin.slots.edit', $slot->id)); ?>" class="btn btn-outline-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <button type="button" class="btn btn-outline-danger btn-sm" 
                                                        onclick="confirmDelete(<?php echo e($slot->id); ?>, '<?php echo e($slot->title); ?>')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <i class="fas fa-clock fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">No Slots Found</h4>
                            <p class="text-muted">Get started by creating your first booking slot.</p>
                            <a href="<?php echo e(route('admin.slots.create')); ?>" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Create First Slot
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the slot "<span id="deleteSlotName"></span>"?</p>
                <p class="text-warning"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Reset Bookings Modal -->
<div class="modal fade" id="resetModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Reset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to reset all slot bookings to zero?</p>
                <p class="text-warning"><small>This will set current_bookings to 0 for all slots. This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="<?php echo e(route('admin.slots.reset-bookings')); ?>" method="POST" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-warning">Reset All Bookings</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function toggleStatus(slotId) {
    fetch(`/admin/slots/${slotId}/toggle-status`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            location.reload();
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function confirmDelete(slotId, slotName) {
    document.getElementById('deleteSlotName').textContent = slotName;
    document.getElementById('deleteForm').action = `/admin/slots/${slotId}`;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}

function confirmResetBookings() {
    new bootstrap.Modal(document.getElementById('resetModal')).show();
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Glorya.in\resources\views/admin/slots/index.blade.php ENDPATH**/ ?>