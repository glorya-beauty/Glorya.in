<?php

require_once __DIR__ . '/vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use App\Models\Category;

try {
    echo "Adding sample services...\n";
    
    // Get categories
    $skinCareCategory = Category::where('name', 'Skin Care & Waxing Services')->first();
    $hairCategory = Category::where('name', 'Hair Services')->first();
    $makeupCategory = Category::where('name', 'Makeup Services')->first();
    $nailCategory = Category::where('name', 'Nail Services')->first();
    
    $sampleServices = [
        // Skin Care & Waxing Services
        [
            'name' => 'Classic Facial',
            'slug' => 'classic-facial',
            'category' => $skinCareCategory->name,
            'subcategory' => 'Facials',
            'short_description' => 'Deep cleansing facial for glowing skin',
            'description' => '<h2>Classic Facial Treatment</h2><p>Our classic facial includes deep cleansing, exfoliation, and moisturizing to leave your skin refreshed and glowing.</p><ul><li>Deep cleansing</li><li>Exfoliation</li><li>Moisturizing</li><li>Face massage</li></ul>',
            'original_price' => 1299.00,
            'final_price' => 999.00,
            'duration' => 60,
            'is_active' => true,
            'sort_order' => 1
        ],
        [
            'name' => 'Full Body Waxing',
            'slug' => 'full-body-waxing',
            'category' => $skinCareCategory->name,
            'subcategory' => 'Waxing',
            'short_description' => 'Complete body waxing for smooth skin',
            'description' => '<h2>Full Body Waxing</h2><p>Professional full body waxing service using high-quality wax for smooth, hair-free skin.</p>',
            'original_price' => 2999.00,
            'final_price' => 1999.00,
            'duration' => 120,
            'is_active' => true,
            'sort_order' => 2
        ],
        
        // Hair Services
        [
            'name' => 'Hair Spa Treatment',
            'slug' => 'hair-spa-treatment',
            'category' => $hairCategory->name,
            'subcategory' => 'Hair Treatments',
            'short_description' => 'Rejuvenating hair spa for healthy hair',
            'description' => '<h2>Hair Spa Treatment</h2><p>Luxurious hair spa treatment that nourishes and revitalizes your hair from root to tip.</p>',
            'original_price' => 1599.00,
            'final_price' => 1199.00,
            'duration' => 90,
            'is_active' => true,
            'sort_order' => 1
        ],
        [
            'name' => 'Professional Blow Dry',
            'slug' => 'professional-blow-dry',
            'category' => $hairCategory->name,
            'subcategory' => 'Blow Dry',
            'short_description' => 'Professional blow dry for perfect styling',
            'description' => '<h2>Professional Blow Dry</h2><p>Get salon-perfect blow dry with our professional styling services.</p>',
            'original_price' => 799.00,
            'final_price' => 599.00,
            'duration' => 45,
            'is_active' => true,
            'sort_order' => 2
        ],
        
        // Makeup Services
        [
            'name' => 'Bridal Makeup Package',
            'slug' => 'bridal-makeup-package',
            'category' => $makeupCategory->name,
            'subcategory' => 'Bridal Makeup',
            'short_description' => 'Complete bridal makeup for your special day',
            'description' => '<h2>Bridal Makeup Package</h2><p>Complete bridal makeup package including makeup, hair styling, and touch-ups for your perfect wedding day look.</p>',
            'original_price' => 9999.00,
            'final_price' => 7999.00,
            'duration' => 180,
            'is_active' => true,
            'sort_order' => 1
        ],
        
        // Nail Services
        [
            'name' => 'Gel Manicure',
            'slug' => 'gel-manicure',
            'category' => $nailCategory->name,
            'subcategory' => 'Manicure',
            'short_description' => 'Long-lasting gel manicure',
            'description' => '<h2>Gel Manicure</h2><p>Professional gel manicure that lasts for weeks with perfect shine and durability.</p>',
            'original_price' => 899.00,
            'final_price' => 699.00,
            'duration' => 60,
            'is_active' => true,
            'sort_order' => 1
        ],
        [
            'name' => 'Luxury Pedicure',
            'slug' => 'luxury-pedicure',
            'category' => $nailCategory->name,
            'subcategory' => 'Pedicure',
            'short_description' => 'Luxurious pedicure with foot massage',
            'description' => '<h2>Luxury Pedicure</h2><p>Pampering pedicure treatment with exfoliation, massage, and perfect polish application.</p>',
            'original_price' => 1299.00,
            'final_price' => 999.00,
            'duration' => 75,
            'is_active' => true,
            'sort_order' => 2
        ]
    ];
    
    foreach ($sampleServices as $serviceData) {
        // Check if service already exists
        $existingService = Service::where('slug', $serviceData['slug'])->first();
        
        if (!$existingService) {
            Service::create($serviceData);
            echo "Added: " . $serviceData['name'] . "\n";
        } else {
            echo "Already exists: " . $serviceData['name'] . "\n";
        }
    }
    
    echo "\nSample services added successfully!\n";
    echo "Total services: " . Service::count() . "\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
