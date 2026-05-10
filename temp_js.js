// Cart functionality
window.addToCart = function(serviceName, servicePrice, serviceImage, serviceTime, serviceCategory, buttonElement) {
    console.log('Adding to cart:', serviceName, servicePrice, serviceImage, serviceTime, serviceCategory);
    
    $.ajax({
        url: '{{ route("cart.add") }}',
        type: 'POST',
        data: {
            '_token': '{{ csrf_token() }}',
            'service_name': serviceName,
            'service_price': servicePrice,
            'service_image': serviceImage,
            'service_time': serviceTime,
            'service_category': serviceCategory
        },
        success: function(response) {
            if (response.success) {
                // Update cart count
                updateCartCount(response.cart_count);
                
                // Show appropriate message based on user type
                let message = response.message;
                if (response.is_guest) {
                    message += ' Please register or login to checkout.';
                }
                showNotification(message, 'success');
                
                // Change button temporarily
                if (buttonElement) {
                    const originalText = buttonElement.innerHTML;
                    buttonElement.innerHTML = '<i class="fas fa-check"></i> Added!';
                    buttonElement.disabled = true;
                    
                    // Reset button after 2 seconds
                    setTimeout(function() {
                        buttonElement.innerHTML = originalText;
                        buttonElement.disabled = false;
                    }, 2000);
                }
            } else {
                showNotification(response.message, 'error');
            }
        },
        error: function(xhr) {
            let errorMessage = 'Error adding to cart. Please try again.';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            } else if (xhr.responseText) {
                try {
                    const response = JSON.parse(xhr.responseText);
                    if (response.message) {
                        errorMessage = response.message;
                    }
                } catch (e) {
                    // Keep default error message
                }
            }
            showNotification(errorMessage, 'error');
        }
    });
};

window.updateCartCount = function(count) {
    $('.cart-count').text(count);
    if (count > 0) {
        $('.cart-count').show();
    } else {
        $('.cart-count').hide();
    }
};

window.showNotification = function(message, type) {
    var notification = $('<div class="cart-notification cart-notification-' + type + '">' + message + '</div>');
    $('body').append(notification);
    
    setTimeout(function() {
        notification.fadeOut('slow', function() {
            $(this).remove();
        });
    }, 3000);
};

// Toggle service details collapse
window.toggleServiceDetails = function(serviceId) {
    const detailsElement = document.getElementById('details-' + serviceId);
    const arrowElement = document.getElementById('arrow-' + serviceId);
    
    if (detailsElement) {
        const isCollapsed = detailsElement.classList.contains('show');
        
        if (isCollapsed) {
            // Collapse
            detailsElement.classList.remove('show');
            arrowElement.classList.remove('fa-chevron-up');
            arrowElement.classList.add('fa-chevron-down');
        } else {
            // Expand
            detailsElement.classList.add('show');
            arrowElement.classList.remove('fa-chevron-down');
            arrowElement.classList.add('fa-chevron-up');
        }
    }
};

// Load cart count on page load (works for both guests and authenticated users)
$.get('{{ route("cart.count") }}', function(response) {
    updateCartCount(response.count);
});
</script>

