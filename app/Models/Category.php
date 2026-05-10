<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'description',
        'tagline',
        'slug',
        'image',
        'category_icon_image',
        'submenu',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'submenu' => 'array'
    ];

    public function services()
    {
        return $this->hasMany(\App\Models\Service::class, 'category', 'name');
    }

    public function getActiveServicesCount()
    {
        return $this->services()->where('is_active', true)->count();
    }
}
