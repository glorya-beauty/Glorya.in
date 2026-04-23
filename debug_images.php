<?php

require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Helpers\ImageHelper;

echo "<h2>Payment Screenshot Debug</h2>";

// Get all bookings with payment screenshots
$bookings = \App\Models\Booking::whereNotNull('payment_screenshot')->get();

echo "<h3>Found " . $bookings->count() . " bookings with payment screenshots</h3>";

foreach ($bookings as $booking) {
    echo "<hr>";
    echo "<h4>Booking ID: " . $booking->id . "</h4>";
    echo "<p><strong>Filename in DB:</strong> " . $booking->payment_screenshot . "</p>";
    
    $basePath = 'uploads/payments/';
    $fullPath = public_path($basePath . $booking->payment_screenshot);
    
    echo "<p><strong>Full Path:</strong> " . $fullPath . "</p>";
    echo "<p><strong>File Exists:</strong> " . (file_exists($fullPath) ? "YES" : "NO") . "</p>";
    
    // Try different URL formats
    $originalUrl = asset($basePath . $booking->payment_screenshot);
    $encodedUrl = asset($basePath . rawurlencode($booking->payment_screenshot));
    $helperUrl = ImageHelper::getPaymentScreenshotUrl($booking->payment_screenshot);
    
    echo "<p><strong>Original URL:</strong> <a href='$originalUrl' target='_blank'>$originalUrl</a></p>";
    echo "<p><strong>Encoded URL:</strong> <a href='$encodedUrl' target='_blank'>$encodedUrl</a></p>";
    echo "<p><strong>Helper URL:</strong> <a href='$helperUrl' target='_blank'>$helperUrl</a></p>";
    
    // Show image if exists
    if (file_exists($fullPath)) {
        echo "<p><strong>Image Preview:</strong></p>";
        echo "<img src='" . $helperUrl . "' style='max-width: 200px; border: 1px solid #ccc;' onerror='this.style.display=\"none\"; this.nextElementSibling.style.display=\"block\";'>";
        echo "<span style='display: none; color: red;'>Image failed to load</span>";
    } else {
        echo "<p style='color: red;'>Image file not found on disk</p>";
        
        // Try to find similar files
        $files = glob(public_path('uploads/payments/*' . str_replace(' ', '*', $booking->payment_screenshot) . '*'));
        if (!empty($files)) {
            echo "<p><strong>Similar files found:</strong></p>";
            echo "<ul>";
            foreach ($files as $file) {
                echo "<li>" . basename($file) . "</li>";
            }
            echo "</ul>";
        }
    }
}

// List all files in uploads/payments directory
echo "<hr>";
echo "<h3>All files in uploads/payments directory:</h3>";

$uploadDir = public_path('uploads/payments');
if (is_dir($uploadDir)) {
    $files = scandir($uploadDir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            echo "<p>" . $file . "</p>";
        }
    }
} else {
    echo "<p style='color: red;'>uploads/payments directory does not exist</p>";
}

?>
