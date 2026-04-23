<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title', 'Glorya Beauty'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description', ''); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('fonts/font-flaticon/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/dripicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/meanmenu.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/default.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/glorya-services.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
        
    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 300px;">
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            <strong>Error!</strong> <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>
    
    <?php echo $__env->yieldContent('content'); ?>
    
    <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- JS here -->
    <script src="<?php echo e(asset('js/vendor/jquery-1.12.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.meanmenu.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/imagesloaded.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/js_isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/parallax.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/paroller.js')); ?>"></script>
    <script src="<?php echo e(asset('js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/element-in-view.js')); ?>"></script>
    <script src="<?php echo e(asset('js/one-page-nav-min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/ajax-form.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.scrollUp.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    
    <!-- Auto-hide alerts after 5 seconds -->
    <script>
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>

<!-- Handle checkout functionality -->
<script>
function handleCheckout(event) {
    event.preventDefault();
    
    // Check if user is authenticated
    <?php if(Auth::check()): ?>
        // User is authenticated, go directly to checkout
        window.location.href = '<?php echo e(route("cart.checkout")); ?>';
    <?php else: ?>
        // User is not authenticated, show registration modal
        $('#registerModal').modal('show');
    <?php endif; ?>
}

// Check if we need to show registration modal on page load
$(document).ready(function() {
    <?php if(session('show_register_modal')): ?>
        $('#registerModal').modal('show');
    <?php endif; ?>
    
    // Load cart count for all users (guests and authenticated)
    $.get('<?php echo e(route("cart.count")); ?>', function(response) {
        updateCartCount(response.count);
    });
});

function updateCartCount(count) {
    $('.cart-count').each(function() {
        $(this).text(count);
        if (count > 0) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}
</script>

<!-- Login and Registration Modals -->
<?php echo $__env->make('layouts.partials.auth-modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\Gloryabeauty\resources\views/layouts/app.blade.php ENDPATH**/ ?>