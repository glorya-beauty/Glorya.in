<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Glorya Beauty</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/glorya-auth.css')); ?>">
    <style>
        body {
            background: linear-gradient(135deg, rgba(255,105,180,0.1) 0%, rgba(255,20,147,0.1) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }
        
        .forgot-password-container {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            overflow: hidden;
            max-width: 500px;
            width: 100%;
            margin: 20px;
        }
        
        .forgot-password-header {
            background: linear-gradient(135deg, #ff69b4 0%, #ff1493 100%);
            padding: 30px;
            text-align: center;
            color: white;
        }
        
        .forgot-password-header h1 {
            font-size: 2rem;
            margin: 0;
            font-weight: 600;
        }
        
        .forgot-password-header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
        }
        
        .forgot-password-body {
            padding: 40px 30px;
        }
        
        .glorya-form-group {
            margin-bottom: 25px;
        }
        
        .glorya-form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            display: block;
        }
        
        .glorya-form-control {
            width: 100%;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .glorya-form-control:focus {
            outline: none;
            border-color: #ff69b4;
            box-shadow: 0 0 0 0.2rem rgba(255,105,180,0.25);
        }
        
        .glorya-btn {
            background: linear-gradient(135deg, #ff69b4 0%, #ff1493 100%);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .glorya-btn:hover {
            background: linear-gradient(135deg, #ff1493 0%, #c71585 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,105,180,0.3);
            color: white;
        }
        
        .glorya-btn:focus {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(255,105,180,0.5);
        }
        
        .alert {
            border-radius: 12px;
            border: none;
            margin-bottom: 25px;
            padding: 15px 20px;
        }
        
        .alert-success {
            background: rgba(16,185,129,0.1);
            color: #065f46;
            border-left: 4px solid #10b981;
        }
        
        .alert-danger {
            background: rgba(220,53,69,0.1);
            color: #721c24;
            border-left: 4px solid #dc3545;
        }
        
        .back-to-login {
            text-align: center;
            margin-top: 20px;
        }
        
        .back-to-login a {
            color: #ff69b4;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .back-to-login a:hover {
            color: #ff1493;
            text-decoration: underline;
        }
        
        @media (max-width: 576px) {
            .forgot-password-container {
                margin: 10px;
            }
            
            .forgot-password-header {
                padding: 20px;
            }
            
            .forgot-password-body {
                padding: 30px 20px;
            }
            
            .forgot-password-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="forgot-password-container">
        <div class="forgot-password-header">
            <h1>✨ Glorya Beauty</h1>
            <p>Forgot Your Password?</p>
        </div>
        
        <div class="forgot-password-body">
            <?php if(Session::has('message')): ?>
                <div class="alert alert-success" role="alert">
                    <strong>✅ Success!</strong> <?php echo e(Session::get('message')); ?>

                </div>
            <?php endif; ?>
            
            <?php if(Session::has('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <strong>❌ Error!</strong> <?php echo e(Session::get('error')); ?>

                </div>
            <?php endif; ?>
            
            <form method="POST" action="<?php echo e(route('forget.password.post')); ?>">
                <?php echo csrf_field(); ?>
                
                <div class="glorya-form-group">
                    <label for="email">Email Address</label>
                    <input type="email" 
                           class="glorya-form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           name="email" 
                           id="email" 
                           placeholder="Enter your registered email address"
                           value="<?php echo e(old('email')); ?>"
                           required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger" style="font-size: 0.85rem; margin-top: 8px;">
                            <strong><?php echo e($message); ?></strong>
                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                
                <button type="submit" class="glorya-btn">
                    Send Password Reset Link
                </button>
            </form>
            
            <div class="back-to-login">
                <p>Remember your password? <a href="#" onclick="window.history.back(); return false;">Back to Login</a></p>
            </div>
        </div>
    </div>
    
    <script>
        // Auto-hide success messages after 5 seconds
        setTimeout(function() {
            const successAlerts = document.querySelectorAll('.alert-success');
            successAlerts.forEach(function(alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(function() {
                    alert.remove();
                }, 500);
            });
        }, 5000);
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Glorya.in\resources\views/auth/forgetPassword.blade.php ENDPATH**/ ?>