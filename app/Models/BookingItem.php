<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'service_name',
        'service_price',
        'service_image',
        'service_time',
        'service_category',
        'quantity'
    ];

    protected $casts = [
        'service_price' => 'decimal:2',
        'quantity' => 'integer'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function getSubtotalAttribute()
    {
        return $this->service_price * $this->quantity;
    }
}
