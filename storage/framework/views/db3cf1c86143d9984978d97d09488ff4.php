<?php $__env->startSection('title', 'Edit Service'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.ck-editor__editable {
    min-height: 300px;
}
.ck-editor {
    max-width: 100%;
}


@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.subcategory-card {
    transition: all 0.3s ease;
}

.subcategory-card:hover {
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.table-responsive {
    max-height: 400px;
    overflow-y: auto;
}

#subcategory-table th {
    position: sticky;
    top: 0;
    background-color: #f8f9fa;
    z-index: 10;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    ClassicEditor
        .create(document.querySelector('#description'), {
            toolbar: [
                'heading', '|',
                'bold', 'italic', 'underline', 'strikethrough', '|',
                'bulletedList', 'numberedList', '|',
                'outdent', 'indent', '|',
                'link', 'blockQuote', '|',
                'insertTable', '|',
                'undo', 'redo'
            ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                ]
            }
        })
        .catch(error => {
            console.error(error);
        });

    // Auto-generate slug from name
    document.getElementById('name').addEventListener('input', function() {
        const name = this.value;
        const slug = name.toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-|-$/g, '');
        
        document.getElementById('slug').value = slug;
    });

    // Calculate discount percentage
    function calculateDiscount() {
        const originalPrice = parseFloat(document.getElementById('original_price').value) || 0;
        const finalPrice = parseFloat(document.getElementById('final_price').value) || 0;
        const discountField = document.getElementById('discount_percentage');
        
        if (originalPrice > 0 && finalPrice > 0 && originalPrice > finalPrice) {
            const discount = ((originalPrice - finalPrice) / originalPrice * 100).toFixed(2);
            discountField.value = discount;
        } else {
            discountField.value = '';
        }
    }

    // Calculate final price from discount percentage
    function calculateFinalPrice() {
        const originalPrice = parseFloat(document.getElementById('original_price').value) || 0;
        const discountPercentage = parseFloat(document.getElementById('discount_percentage').value) || 0;
        const finalPriceField = document.getElementById('final_price');
        
        if (originalPrice > 0 && discountPercentage > 0) {
            const discountAmount = (originalPrice * discountPercentage / 100);
            const finalPrice = (originalPrice - discountAmount).toFixed(2);
            finalPriceField.value = finalPrice;
        }
    }

    document.getElementById('original_price').addEventListener('input', calculateDiscount);
    document.getElementById('final_price').addEventListener('input', calculateDiscount);
    document.getElementById('discount_percentage').addEventListener('input', calculateFinalPrice);

    // Load subcategories based on category
    document.getElementById('category').addEventListener('change', function() {
        const category = this.value;
        const subcategorySelect = document.getElementById('subcategory');
        const loadingDiv = document.getElementById('subcategory-loading');
        const emptyDiv = document.getElementById('subcategory-empty');
        const currentSubcategory = '<?php echo e($service->subcategory); ?>';
        
        // Reset subcategory dropdown
        subcategorySelect.innerHTML = '<option value="">Select a subcategory...</option>';
        subcategorySelect.disabled = true;
        
        // Hide all messages initially
        loadingDiv.classList.add('d-none');
        emptyDiv.classList.add('d-none');
        
        if (category) {
            // Show loading state
            loadingDiv.classList.remove('d-none');
            
            fetch(`/api/services/get-subcategories?category=${encodeURIComponent(category)}`)
                .then(response => response.json())
                .then(data => {
                    loadingDiv.classList.add('d-none');
                    
                    if (data.success && data.subcategories && data.subcategories.length > 0) {
                        // Add subcategories to dropdown
                        data.subcategories.forEach(subcategory => {
                            const option = document.createElement('option');
                            option.value = subcategory.name;
                            option.textContent = subcategory.name;
                            
                            // Select the current subcategory if it matches
                            if (subcategory.name === currentSubcategory) {
                                option.selected = true;
                            }
                            
                            subcategorySelect.appendChild(option);
                        });
                        
                        // Enable the dropdown
                        subcategorySelect.disabled = false;
                        
                    } else {
                        // Show empty message
                        emptyDiv.classList.remove('d-none');
                        subcategorySelect.disabled = true;
                    }
                })
                .catch(error => {
                    console.error('Error loading subcategories:', error);
                    loadingDiv.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Error loading subcategories';
                    loadingDiv.classList.remove('d-none');
                    subcategorySelect.disabled = true;
                });
        }
    });
    
    // Load subcategories on page load if category is selected
    const currentCategory = document.getElementById('category').value;
    if (currentCategory) {
        document.getElementById('category').dispatchEvent(new Event('change'));
    }
});
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Service: <?php echo e($service->name); ?></h5>
                    <div>
                        <a href="<?php echo e(route('admin.services.show', $service)); ?>" class="btn btn-outline-info me-2">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <a href="<?php echo e(route('admin.services.index')); ?>" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Services
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.services.update', $service)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Service Name <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="name" 
                                           name="name" 
                                           value="<?php echo e(old('name', $service->name)); ?>" 
                                           required>
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" 
                                           class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="slug" 
                                           name="slug" 
                                           value="<?php echo e(old('slug', $service->slug)); ?>" 
                                           placeholder="Auto-generated from name">
                                    <small class="form-text text-muted">URL-friendly version of the service name</small>
                                    <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                                            <select class="form-select <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                    id="category" 
                                                    name="category" 
                                                    required>
                                                <option value="">Select Category</option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->name); ?>" 
                                                            <?php echo e(old('category', $service->category) == $category->name ? 'selected' : ''); ?>>
                                                        <?php echo e($category->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="subcategory" class="form-label">Subcategory</label>
                                            <select class="form-select <?php $__errorArgs = ['subcategory'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                    id="subcategory" 
                                                    name="subcategory" 
                                                    required>
                                                <option value="">Select a subcategory...</option>
                                            </select>
                                            <div id="subcategory-loading" class="form-text d-none">
                                                <i class="fas fa-spinner fa-spin"></i> Loading subcategories...
                                            </div>
                                            <div id="subcategory-empty" class="form-text text-warning d-none">
                                                <i class="fas fa-exclamation-triangle"></i> 
                                                No subcategories available for this category
                                            </div>
                                            <?php $__errorArgs = ['subcategory'];
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

                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Short Description</label>
                                    <textarea class="form-control <?php $__errorArgs = ['short_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                              id="short_description" 
                                              name="short_description" 
                                              rows="2" 
                                              placeholder="Brief description for listings (max 500 characters)"><?php echo e(old('short_description', $service->short_description)); ?></textarea>
                                    <small class="form-text text-muted">Brief description for service listings</small>
                                    <?php $__errorArgs = ['short_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Detailed Description</label>
                                    <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                              id="description" 
                                              name="description" 
                                              rows="8"><?php echo e(old('description', $service->description)); ?></textarea>
                                    <small class="form-text text-muted">Full description with rich text formatting</small>
                                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Service Image</label>
                                    <input type="file" 
                                           class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="image" 
                                           name="image" 
                                           accept="image/*">
                                    <small class="form-text text-muted">Recommended size: 800x600px. Max file size: 2MB</small>
                                    <?php if($service->image): ?>
                                        <div class="mt-2">
                                            <img src="<?php echo e(asset('storage/' . $service->image)); ?>" alt="<?php echo e($service->name); ?>" class="img-thumbnail" style="max-height: 100px;">
                                            <small class="form-text text-muted">Current image</small>
                                        </div>
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">Pricing & Duration</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="original_price" class="form-label">Original Price <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">₹</span>
                                                <input type="number" 
                                                       class="form-control <?php $__errorArgs = ['original_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                       id="original_price" 
                                                       name="original_price" 
                                                       value="<?php echo e(old('original_price', $service->original_price)); ?>" 
                                                       step="0.01" 
                                                       min="0" 
                                                       required>
                                            </div>
                                            <?php $__errorArgs = ['original_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="final_price" class="form-label">Final Price <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">₹</span>
                                                <input type="number" 
                                                       class="form-control <?php $__errorArgs = ['final_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                       id="final_price" 
                                                       name="final_price" 
                                                       value="<?php echo e(old('final_price', $service->final_price)); ?>" 
                                                       step="0.01" 
                                                       min="0" 
                                                       required>
                                            </div>
                                            <?php $__errorArgs = ['final_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="discount_percentage" class="form-label">Discount Percentage</label>
                                            <div class="input-group">
                                                <input type="number" 
                                                       class="form-control <?php $__errorArgs = ['discount_percentage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                       id="discount_percentage" 
                                                       name="discount_percentage" 
                                                       value="<?php echo e(old('discount_percentage', $service->discount_percentage)); ?>" 
                                                       step="0.01" 
                                                       min="0" 
                                                       max="100" 
                                                       readonly>
                                                <span class="input-group-text">%</span>
                                            </div>
                                            <small class="form-text text-muted">Auto-calculated from price difference</small>
                                            <?php $__errorArgs = ['discount_percentage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="duration" class="form-label">Duration (minutes)</label>
                                            <div class="input-group">
                                                <input type="number" 
                                                       class="form-control <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                       id="duration" 
                                                       name="duration" 
                                                       value="<?php echo e(old('duration', $service->duration)); ?>" 
                                                       min="1">
                                                <span class="input-group-text">min</span>
                                            </div>
                                            <small class="form-text text-muted">Service duration in minutes</small>
                                            <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3">
                                    <div class="card-header">
                                        <h6 class="mb-0">Service Settings</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" 
                                                       type="checkbox" 
                                                       id="is_active" 
                                                       name="is_active" 
                                                       value="1" 
                                                       <?php echo e(old('is_active', $service->is_active) ? 'checked' : ''); ?>>
                                                <label class="form-check-label" for="is_active">
                                                    Active
                                                </label>
                                            </div>
                                            <small class="form-text text-muted">Inactive services won't be shown on the website</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Service
                                </button>
                                <a href="<?php echo e(route('admin.services.index')); ?>" class="btn btn-outline-secondary ms-2">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Glorya.in\resources\views/admin/services/edit.blade.php ENDPATH**/ ?>