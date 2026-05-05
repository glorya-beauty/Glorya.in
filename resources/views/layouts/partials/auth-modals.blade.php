<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content glorya-login-modal" style="border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.3); border: none; overflow: hidden; background: rgba(255,255,255,0.95); backdrop-filter: blur(10px);">
            <div class="modal-header glorya-modal-header" style="background: linear-gradient(135deg, #cf921c 0%, #cf921c 100%); border-radius: 0; border: none; padding: 20px 25px; position: relative;">
                <h5 class="modal-title text-white mb-0" id="loginModalLabel" style="font-size: 1.3rem; font-weight: 600;">
                    Login to Glorya Beauty
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="font-size: 1.8rem; opacity: 0.9; position: absolute; right: 20px; top: 50%; transform: translateY(-50%);">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body glorya-modal-body" style="padding: 30px 25px; background: linear-gradient(135deg, rgba(139,92,246,0.05) 0%, rgba(124,58,237,0.05) 100%);">
                @if ($errors->any())
                    <div class="alert alert-danger" style="border-radius: 12px; margin-bottom: 25px; border: none; background: rgba(220,53,69,0.1); color: #721c24;">
                        <ul class="mb-0" style="padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="login_email" class="form-label" style="font-weight: 600; font-size: 0.95rem; margin-bottom: 10px; color: #333;">
                            Email Address
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border: 2px solid #e0e0e0; border-right: none; border-radius: 10px 0 0 10px; background: #f8f9fa;">
                                    <i class="fas fa-envelope" style="color: #cf921c;"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control" id="login_email" name="email" 
                                   value="{{ old('email') }}" required autocomplete="email" autofocus
                                   style="border: 2px solid #e0e0e0; border-left: none; border-radius: 0 10px 10px 0; padding: 12px 15px; font-size: 0.95rem;">
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block" style="font-size: 0.85rem; margin-top: 8px; color: #dc3545;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="login_password" class="form-label" style="font-weight: 600; font-size: 0.95rem; margin-bottom: 10px; color: #333;">
                            Password
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border: 2px solid #e0e0e0; border-right: none; border-radius: 10px 0 0 10px; background: #f8f9fa;">
                                    <i class="fas fa-lock" style="color: #cf921c;"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" id="login_password" name="password" required
                                   style="border: 2px solid #e0e0e0; border-left: none; border-radius: 0 10px 10px 0; padding: 12px 15px; font-size: 0.95rem;">
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block" style="font-size: 0.85rem; margin-top: 8px; color: #dc3545;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-4">
                        <div class="form-check">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input" style="margin-top: 0.3rem;">
                            <label class="form-check-label" for="remember" style="font-size: 0.9rem; color: #555;">Remember me</label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-block glorya-login-btn" style="background: linear-gradient(135deg, #cf921c 0%, #cf921c 100%); border: none; border-radius: 10px; padding: 14px; font-weight: 600; font-size: 1rem; color: white; transition: all 0.3s ease;">
                        Login
                    </button>
                    
                    <div class="text-center mt-4">
                        <p class="mb-2" style="font-size: 0.9rem; color: #555;">
                            <a href="#" onclick="showForgotPasswordModal();" style="color: #cf921c; font-weight: 600; text-decoration: none;">Forgot Password?</a>
                        </p>
                        <p class="mb-0" style="font-size: 0.9rem; color: #555;">
                            Don't have an account? <a href="#" onclick="showRegisterModal();" style="color: #cf921c; font-weight: 600; text-decoration: none;">Register here</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Forgot Password Modal -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content glorya-login-modal" style="border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.3); border: none; overflow: hidden; background: rgba(255,255,255,0.95); backdrop-filter: blur(10px);">
            <div class="modal-header glorya-modal-header" style="background: linear-gradient(135deg, #cf921c 0%, #cf921c 100%); border-radius: 0; border: none; padding: 20px 25px; position: relative;">
                <h5 class="modal-title text-white mb-0" id="forgotPasswordModalLabel" style="font-size: 1.3rem; font-weight: 600;">
                    Reset Password
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="font-size: 1.8rem; opacity: 0.9; position: absolute; right: 20px; top: 50%; transform: translateY(-50%);">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body glorya-modal-body" style="padding: 30px 25px; background: linear-gradient(135deg, rgba(139,92,246,0.05) 0%, rgba(124,58,237,0.05) 100%);">
                <p style="color: #555; margin-bottom: 25px; text-align: center;">
                    Enter your email address and we'll send you a link to reset your password.
                </p>

                <form method="POST" action="{{ route('password.email') }}" id="forgotPasswordForm">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="forgot_email" class="form-label" style="font-weight: 600; font-size: 0.95rem; margin-bottom: 10px; color: #333;">
                            Email Address
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border: 2px solid #e0e0e0; border-right: none; border-radius: 10px 0 0 10px; background: #f8f9fa;">
                                    <i class="fas fa-envelope" style="color: #cf921c;"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control" id="forgot_email" name="email" 
                                   required autocomplete="email"
                                   style="border: 2px solid #e0e0e0; border-left: none; border-radius: 0 10px 10px 0; padding: 12px 15px; font-size: 0.95rem;">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-block glorya-login-btn" style="background: linear-gradient(135deg, #cf921c 0%, #cf921c 100%); border: none; border-radius: 10px; padding: 14px; font-weight: 600; font-size: 1rem; color: white; transition: all 0.3s ease;">
                        Send Reset Link
                    </button>
                    
                    <div class="text-center mt-4">
                        <p class="mb-0" style="font-size: 0.9rem; color: #555;">
                            Remember your password? <a href="#" onclick="showLoginModal();" style="color: #cf921c; font-weight: 600; text-decoration: none;">Back to Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Registration Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content glorya-login-modal" style="border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.3); border: none; overflow: hidden; background: rgba(255,255,255,0.95); backdrop-filter: blur(10px);">
            <div class="modal-header glorya-modal-header" style="background: linear-gradient(135deg, #cf921c 0%, #cf921c 100%); border-radius: 0; border: none; padding: 20px 25px; position: relative;">
                <h5 class="modal-title text-white mb-0" id="registerModalLabel" style="font-size: 1.3rem; font-weight: 600;">
                    Register for Glorya Beauty
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="font-size: 1.8rem; opacity: 0.9; position: absolute; right: 20px; top: 50%; transform: translateY(-50%);">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body glorya-modal-body" style="padding: 30px 25px; background: linear-gradient(135deg, rgba(139,92,246,0.05) 0%, rgba(124,58,237,0.05) 100%);">
                @if ($errors->any())
                    <div class="alert alert-danger" style="border-radius: 12px; margin-bottom: 25px; border: none; background: rgba(220,53,69,0.1); color: #721c24;">
                        <ul class="mb-0" style="padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="register_name" class="form-label" style="font-weight: 600; font-size: 0.95rem; margin-bottom: 10px; color: #333;">
                            Full Name
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border: 2px solid #e0e0e0; border-right: none; border-radius: 10px 0 0 10px; background: #f8f9fa;">
                                    <i class="fas fa-user" style="color: #cf921c;"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="register_name" name="name" 
                                   value="{{ old('name') }}" required autocomplete="name" autofocus
                                   style="border: 2px solid #e0e0e0; border-left: none; border-radius: 0 10px 10px 0; padding: 12px 15px; font-size: 0.95rem;">
                        </div>
                        @error('name')
                            <div class="invalid-feedback d-block" style="font-size: 0.85rem; margin-top: 8px; color: #dc3545;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="register_email" class="form-label" style="font-weight: 600; font-size: 0.95rem; margin-bottom: 10px; color: #333;">
                            Email Address
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border: 2px solid #e0e0e0; border-right: none; border-radius: 10px 0 0 10px; background: #f8f9fa;">
                                    <i class="fas fa-envelope" style="color: #cf921c;"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control" id="register_email" name="email" 
                                   value="{{ old('email') }}" required autocomplete="email"
                                   style="border: 2px solid #e0e0e0; border-left: none; border-radius: 0 10px 10px 0; padding: 12px 15px; font-size: 0.95rem;">
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block" style="font-size: 0.85rem; margin-top: 8px; color: #dc3545;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="register_password" class="form-label" style="font-weight: 600; font-size: 0.95rem; margin-bottom: 10px; color: #333;">
                            Password
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border: 2px solid #e0e0e0; border-right: none; border-radius: 10px 0 0 10px; background: #f8f9fa;">
                                    <i class="fas fa-lock" style="color: #cf921c;"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" id="register_password" name="password" required
                                   style="border: 2px solid #e0e0e0; border-left: none; border-radius: 0 10px 10px 0; padding: 12px 15px; font-size: 0.95rem;">
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block" style="font-size: 0.85rem; margin-top: 8px; color: #dc3545;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="register_password_confirmation" class="form-label" style="font-weight: 600; font-size: 0.95rem; margin-bottom: 10px; color: #333;">
                            Confirm Password
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border: 2px solid #e0e0e0; border-right: none; border-radius: 10px 0 0 10px; background: #f8f9fa;">
                                    <i class="fas fa-lock" style="color: #cf921c;"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" id="register_password_confirmation" name="password_confirmation" required
                                   style="border: 2px solid #e0e0e0; border-left: none; border-radius: 0 10px 10px 0; padding: 12px 15px; font-size: 0.95rem;">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-block glorya-login-btn" style="background: linear-gradient(135deg, #cf921c 0%, #cf921c 100%); border: none; border-radius: 10px; padding: 14px; font-weight: 600; font-size: 1rem; color: white; transition: all 0.3s ease;">
                        Register
                    </button>
                    
                    <div class="text-center mt-4">
                        <p class="mb-0" style="font-size: 0.9rem; color: #555;">
                            Already have an account? <a href="#" onclick="showLoginModal();" style="color: #cf921c; font-weight: 600; text-decoration: none;">Login here</a>
                        </p>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>

<script>
function showRegisterModal() {
    $('#loginModal, #forgotPasswordModal').modal('hide');
    setTimeout(function() {
        $('#registerModal').modal('show');
    }, 300);
}

function showLoginModal() {
    $('#registerModal, #forgotPasswordModal').modal('hide');
    setTimeout(function() {
        $('#loginModal').modal('show');
    }, 300);
}

function showForgotPasswordModal() {
    $('#loginModal, #registerModal').modal('hide');
    setTimeout(function() {
        $('#forgotPasswordModal').modal('show');
    }, 300);
}

// Handle form submission with AJAX
$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        
        // Clear previous errors and success messages
        $('#loginModal .alert-danger, #loginModal .alert-success').remove();
        
        var $submitBtn = $(this).find('button[type="submit"]');
        var originalText = $submitBtn.text();
        
        // Show loading state
        $submitBtn.addClass('loading').prop('disabled', true);
        
        var formData = $(this).serialize();
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            success: function(response) {
                // Show success state
                $submitBtn.removeClass('loading').addClass('success').text('Success!');
                
                // Show success message
                var successHtml = '<div class="alert alert-success" style="border-radius: 12px; margin-bottom: 25px; border: none; background: rgba(16,185,129,0.1); color: #065f46;"><strong>Login Successful!</strong> Redirecting...</div>';
                $('#loginModal .modal-body').prepend(successHtml);
                
                setTimeout(function() {
                    // Transfer guest cart and reload page
                    $.ajax({
                        url: '{{ route("cart.checkout") }}',
                        method: 'GET',
                        success: function(response) {
                            // Reload page to update auth state and cart
                            window.location.reload();
                        },
                        error: function() {
                            // Even if there's an error, reload page
                            window.location.reload();
                        }
                    });
                }, 1500);
            },
            error: function(xhr) {
                // Reset button state
                $submitBtn.removeClass('loading').prop('disabled', false).text(originalText);
                
                // Display errors in modal
                var errorMessage = '';
                if (xhr.status === 422) {
                    // Validation errors
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        errorMessage = '<div class="alert alert-danger" style="border-radius: 12px; margin-bottom: 25px; border: none; background: rgba(220,53,69,0.1); color: #721c24;"><strong>Login Failed!</strong><ul class="mb-0 mt-2" style="padding-left: 20px;">';
                        $.each(errors, function(key, value) {
                            errorMessage += '<li>' + value + '</li>';
                        });
                        errorMessage += '</ul></div>';
                    }
                } else if (xhr.status === 401) {
                    // Invalid credentials
                    errorMessage = '<div class="alert alert-danger" style="border-radius: 12px; margin-bottom: 25px; border: none; background: rgba(220,53,69,0.1); color: #721c24;"><strong>Invalid Credentials!</strong> Please check your email and password and try again.</div>';
                } else {
                    // Other errors
                    errorMessage = '<div class="alert alert-danger" style="border-radius: 12px; margin-bottom: 25px; border: none; background: rgba(220,53,69,0.1); color: #721c24;"><strong>Login Error!</strong> Something went wrong. Please try again.</div>';
                }
                
                $('#loginModal .modal-body').prepend(errorMessage);
            }
        });
    });
    
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();
        
        // Clear previous errors and success messages
        $('#registerModal .alert-danger, #registerModal .alert-success').remove();
        
        var $submitBtn = $(this).find('button[type="submit"]');
        var originalText = $submitBtn.text();
        
        // Show loading state
        $submitBtn.addClass('loading').prop('disabled', true);
        
        var formData = $(this).serialize();
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            success: function(response) {
                // Show success state
                $submitBtn.removeClass('loading').addClass('success').text('Success!');
                
                // Show success message
                var successHtml = '<div class="alert alert-success" style="border-radius: 12px; margin-bottom: 25px; border: none; background: rgba(16,185,129,0.1); color: #065f46;"><strong>Registration Successful!</strong> Your account has been created. Redirecting...</div>';
                $('#registerModal .modal-body').prepend(successHtml);
                
                setTimeout(function() {
                    // Transfer guest cart and reload page
                    $.ajax({
                        url: '{{ route("cart.checkout") }}',
                        method: 'GET',
                        success: function(response) {
                            // Reload page to update auth state and cart
                            window.location.reload();
                        },
                        error: function() {
                            // Even if there's an error, reload page
                            window.location.reload();
                        }
                    });
                }, 1500);
            },
            error: function(xhr) {
                // Reset button state
                $submitBtn.removeClass('loading').prop('disabled', false).text(originalText);
                
                // Display errors in modal
                var errorMessage = '';
                if (xhr.status === 422) {
                    // Validation errors
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        errorMessage = '<div class="alert alert-danger" style="border-radius: 12px; margin-bottom: 25px; border: none; background: rgba(220,53,69,0.1); color: #721c24;"><strong>Registration Failed!</strong><ul class="mb-0 mt-2" style="padding-left: 20px;">';
                        $.each(errors, function(key, value) {
                            errorMessage += '<li>' + value + '</li>';
                        });
                        errorMessage += '</ul></div>';
                    }
                } else if (xhr.status === 500) {
                    // Server error - show specific message if available
                    var serverError = xhr.responseJSON.message || 'Registration failed due to a server error. Please try again.';
                    errorMessage = '<div class="alert alert-danger" style="border-radius: 12px; margin-bottom: 25px; border: none; background: rgba(220,53,69,0.1); color: #721c24;"><strong>Registration Error!</strong> ' + serverError + '</div>';
                } else {
                    // Other errors
                    errorMessage = '<div class="alert alert-danger" style="border-radius: 12px; margin-bottom: 25px; border: none; background: rgba(220,53,69,0.1); color: #721c24;"><strong>Registration Error!</strong> Something went wrong. Please try again. (Error: ' + xhr.status + ')</div>';
                }
                
                $('#registerModal .modal-body').prepend(errorMessage);
                
                // Log error to console for debugging
                console.error('Registration error:', xhr);
            }
        });
    });
    
    $('#forgotPasswordForm').on('submit', function(e) {
        e.preventDefault();
        
        // Clear previous errors and success messages
        $('#forgotPasswordModal .alert-danger, #forgotPasswordModal .alert-success').remove();
        
        var $submitBtn = $(this).find('button[type="submit"]');
        var originalText = $submitBtn.text();
        
        // Show loading state
        $submitBtn.addClass('loading').prop('disabled', true);
        
        var formData = $(this).serialize();
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(response) {
                // Show success state
                $submitBtn.removeClass('loading').addClass('success').text('Sent!');
                
                // Show success message
                var successHtml = '<div class="alert alert-success" style="border-radius: 12px; margin-bottom: 25px; border: none; background: rgba(16,185,129,0.1); color: #065f46;"><strong>Email Sent!</strong> ' + response.message + '</div>';
                $('#forgotPasswordModal .modal-body').prepend(successHtml);
                
                // Reset form
                $('#forgotPasswordForm')[0].reset();
                
                // Hide modal after 3 seconds
                setTimeout(function() {
                    $('#forgotPasswordModal').modal('hide');
                    showLoginModal();
                }, 3000);
            },
            error: function(xhr) {
                // Reset button state
                $submitBtn.removeClass('loading').prop('disabled', false).text(originalText);
                
                // Display errors in modal
                var errorMessage = '';
                if (xhr.status === 422) {
                    // Validation errors
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        errorMessage = '<div class="alert alert-danger" style="border-radius: 12px; margin-bottom: 25px; border: none; background: rgba(220,53,69,0.1); color: #721c24;"><strong>Email Not Found!</strong><ul class="mb-0 mt-2" style="padding-left: 20px;">';
                        $.each(errors, function(key, value) {
                            errorMessage += '<li>' + value + '</li>';
                        });
                        errorMessage += '</ul></div>';
                    }
                } else if (xhr.status === 500) {
                    // Server error - show specific message if available
                    var serverError = xhr.responseJSON.message || 'Failed to send password reset email. Please try again.';
                    errorMessage = '<div class="alert alert-danger" style="border-radius: 12px; margin-bottom: 25px; border: none; background: rgba(220,53,69,0.1); color: #721c24;"><strong>Send Error!</strong> ' + serverError + '</div>';
                } else {
                    // Other errors
                    errorMessage = '<div class="alert alert-danger" style="border-radius: 12px; margin-bottom: 25px; border: none; background: rgba(220,53,69,0.1); color: #721c24;"><strong>Send Error!</strong> Something went wrong. Please try again. (Error: ' + xhr.status + ')</div>';
                }
                
                $('#forgotPasswordModal .modal-body').prepend(errorMessage);
                
                // Log error to console for debugging
                console.error('Forgot password error:', xhr);
            }
        });
    });
    
    // Clear errors when modal is hidden
    $('#loginModal, #registerModal, #forgotPasswordModal').on('hidden.bs.modal', function() {
        $(this).find('.alert-danger, .alert-success').remove();
        $(this).find('form')[0].reset();
        $(this).find('button[type="submit"]').removeClass('loading success').prop('disabled', false);
    });
    
    // Add input focus effects
    $('.glorya-modal-body input').on('focus', function() {
        $(this).closest('.input-group').addClass('focused');
    }).on('blur', function() {
        $(this).closest('.input-group').removeClass('focused');
    });
    
    // Real-time email validation for registration
    $('#register_email').on('blur', function() {
        var email = $(this).val();
        if (email && validateEmail(email)) {
            // Check if email already exists
            $.ajax({
                url: '{{ route("register") }}',
                method: 'POST',
                data: {
                    email: email,
                    _token: '{{ csrf_token() }}',
                    check_email_only: true
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    // Email is available
                    $('#register_email').removeClass('is-invalid').addClass('is-valid');
                    $('#register_email').siblings('.invalid-feedback').remove();
                },
                error: function(xhr) {
                    // Email already exists or invalid
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        if (errors.email) {
                            $('#register_email').removeClass('is-valid').addClass('is-invalid');
                            $('#register_email').siblings('.invalid-feedback').remove();
                            $('#register_email').parent().append('<div class="invalid-feedback d-block" style="font-size: 0.85rem; margin-top: 8px; color: #dc3545;">' + errors.email[0] + '</div>');
                        }
                    }
                }
            });
        }
    });
    
    // Email validation function
    function validateEmail(email) {
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
});
</script>
