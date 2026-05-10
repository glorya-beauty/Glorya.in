<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Skin Care & Waxing Services',
                'slug' => 'skin-care-waxing-services',
                'description' => 'Complete skin care treatments including facials, waxing, bleaching, and D-TAN services for radiant and smooth skin.',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'name' => 'Hair Services',
                'slug' => 'hair-services',
                'description' => 'Professional hair care services including blow dry, hair treatments, styling, and hair spa treatments for healthy, beautiful hair.',
                'sort_order' => 2,
                'is_active' => true
            ],
            [
                'name' => 'Makeup Services',
                'slug' => 'makeup-services',
                'description' => 'Professional makeup services for all occasions including bridal makeup, party makeup, and makeup tutorials.',
                'sort_order' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Nail Services',
                'slug' => 'nail-services',
                'description' => 'Complete nail care services including manicure, pedicure, nail art, gel polish, and advanced nail treatments.',
                'sort_order' => 4,
                'is_active' => true
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
