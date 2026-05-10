<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'original_price',
        'final_price',
        'discount_percentage',
        'duration',
        'category',
        'subcategory',
        'is_active',
        'image'
    ];

    protected $casts = [
        'original_price' => 'decimal:2',
        'final_price' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'is_active' => 'boolean',
        'duration' => 'integer'
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category', 'name');
    }

    public function getFormattedPriceAttribute()
    {
        return '₹' . number_format($this->final_price, 0);
    }

    public function getFormattedOriginalPriceAttribute()
    {
        return '₹' . number_format($this->original_price, 0);
    }

    public function getDiscountPercentageAttribute()
    {
        if ($this->original_price && $this->final_price && $this->original_price > $this->final_price) {
            return round((($this->original_price - $this->final_price) / $this->original_price) * 100, 0);
        }
        return 0;
    }

    public function getFormattedDurationAttribute()
    {
        if ($this->duration) {
            if ($this->duration >= 60) {
                $hours = floor($this->duration / 60);
                $minutes = $this->duration % 60;
                if ($minutes > 0) {
                    return $hours . ' Hrs ' . $minutes . ' Min';
                }
                return $hours . ' Hrs';
            }
            return $this->duration . ' Min';
        }
        return null;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->name);
            }
        });

        static::updating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->name);
            }
        });
    }
}
