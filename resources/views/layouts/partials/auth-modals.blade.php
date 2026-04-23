<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); border: none;">
            <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px 15px 0 0; border: none; padding: 15px 20px;">
                <h5 class="modal-title text-white mb-0" id="loginModalLabel" style="font-size: 1.2rem;">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login to Glorya Beauty
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="font-size: 1.5rem;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4" style="padding: 20px;">
                @if ($errors->any())
                    <div class="alert alert-danger" style="border-radius: 10px; margin-bottom: 20px;">
                        <ul class="mb-0" style="padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="login_email" class="form-label font-weight-bold" style="font-size: 0.9rem; margin-bottom: 8px;">
                                    <i class="fas fa-envelope mr-1"></i>Email Address
                                </label>
                                <input type="email" class="form-control" id="login_email" name="email" 
                                       value="{{ old('email') }}" required autocomplete="email" autofocus
                                       style="border-radius: 8px; border: 2px solid #e0e0e0; padding: 12px 15px; font-size: 0.9rem;">
                                @error('email')
                                    <div class="invalid-feedback d-block" style="font-size: 0.8rem; margin-top: 5px;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="login_password" class="form-label font-weight-bold" style="font-size: 0.9rem; margin-bottom: 8px;">
                                    <i class="fas fa-lock mr-1"></i>Password
                                </label>
                                <input type="password" class="form-control" id="login_password" name="password" required
                                       style="border-radius: 8px; border: 2px solid #e0e0e0; padding: 12px 15px; font-size: 0.9rem;">
                                @error('password')
                                    <div class="invalid-feedback d-block" style="font-size: 0.8rem; margin-top: 5px;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-4">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                    <label class="form-check-label" for="remember" style="font-size: 0.85rem;">Remember me</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn ss-btn active btn-block" style="border-radius: 8px; padding: 12px; font-weight: 600; font-size: 0.95rem;">
                                <i class="fas fa-sign-in-alt mr-2"></i>Login
                            </button>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mt-3" style="font-size: 0.85rem;">
                                <p class="mb-0">Don't have an account? <a href="#" onclick="showRegisterModal();" style="color: #667eea; font-weight: 600;">Register here</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Registration Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); border: none;">
            <div class="modal-header" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); border-radius: 15px 15px 0 0; border: none; padding: 15px 20px;">
                <h5 class="modal-title text-white mb-0" id="registerModalLabel" style="font-size: 1.2rem;">
                    <i class="fas fa-user-plus mr-2"></i>Register for Glorya Beauty
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="font-size: 1.5rem;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4" style="padding: 20px;">
                @if ($errors->any())
                    <div class="alert alert-danger" style="border-radius: 10px; margin-bottom: 20px;">
                        <ul class="mb-0" style="padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="register_name" class="form-label font-weight-bold" style="font-size: 0.9rem; margin-bottom: 8px;">
                                    <i class="fas fa-user mr-1"></i>Full Name
                                </label>
                                <input type="text" class="form-control" id="register_name" name="name" 
                                       value="{{ old('name') }}" required autocomplete="name" autofocus
                                       style="border-radius: 8px; border: 2px solid #e0e0e0; padding: 12px 15px; font-size: 0.9rem;">
                                @error('name')
                                    <div class="invalid-feedback d-block" style="font-size: 0.8rem; margin-top: 5px;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="register_email" class="form-label font-weight-bold" style="font-size: 0.9rem; margin-bottom: 8px;">
                                    <i class="fas fa-envelope mr-1"></i>Email Address
                                </label>
                                <input type="email" class="form-control" id="register_email" name="email" 
                                       value="{{ old('email') }}" required autocomplete="email"
                                       style="border-radius: 8px; border: 2px solid #e0e0e0; padding: 12px 15px; font-size: 0.9rem;">
                                @error('email')
                                    <div class="invalid-feedback d-block" style="font-size: 0.8rem; margin-top: 5px;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="register_password" class="form-label font-weight-bold" style="font-size: 0.9rem; margin-bottom: 8px;">
                                    <i class="fas fa-lock mr-1"></i>Password
                                </label>
                                <input type="password" class="form-control" id="register_password" name="password" required
                                       style="border-radius: 8px; border: 2px solid #e0e0e0; padding: 12px 15px; font-size: 0.9rem;">
                                @error('password')
                                    <div class="invalid-feedback d-block" style="font-size: 0.8rem; margin-top: 5px;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-4">
                                <label for="register_password_confirmation" class="form-label font-weight-bold" style="font-size: 0.9rem; margin-bottom: 8px;">
                                    <i class="fas fa-lock mr-1"></i>Confirm Password
                                </label>
                                <input type="password" class="form-control" id="register_password_confirmation" name="password_confirmation" required
                                       style="border-radius: 8px; border: 2px solid #e0e0e0; padding: 12px 15px; font-size: 0.9rem;">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn ss-btn active btn-block" style="border-radius: 8px; padding: 12px; font-weight: 600; font-size: 0.95rem;">
                                <i class="fas fa-user-plus mr-2"></i>Register
                            </button>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mt-3" style="font-size: 0.85rem;">
                                <p class="mb-0">Already have an account? <a href="#" onclick="showLoginModal();" style="color: #f093fb; font-weight: 600;">Login here</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>

<script>
function showRegisterModal() {
    $('#loginModal').modal('hide');
    $('#registerModal').modal('show');
}

function showLoginModal() {
    $('#registerModal').modal('hide');
    $('#loginModal').modal('show');
}

// Handle form submission with AJAX
$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            success: function(response) {
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
            },
            error: function(xhr) {
                // Display errors in modal
                var errors = xhr.responseJSON.errors;
                var errorHtml = '<div class="alert alert-danger"><ul class="mb-0">';
                $.each(errors, function(key, value) {
                    errorHtml += '<li>' + value + '</li>';
                });
                errorHtml += '</ul></div>';
                $('#loginModal .modal-body').prepend(errorHtml);
            }
        });
    });
    
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            success: function(response) {
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
            },
            error: function(xhr) {
                // Display errors in modal
                var errors = xhr.responseJSON.errors;
                var errorHtml = '<div class="alert alert-danger"><ul class="mb-0">';
                $.each(errors, function(key, value) {
                    errorHtml += '<li>' + value + '</li>';
                });
                errorHtml += '</ul></div>';
                $('#registerModal .modal-body').prepend(errorHtml);
            }
        });
    });
});
</script>
