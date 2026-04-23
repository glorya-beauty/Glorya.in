<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_name',
        'amount',
        'base_amount',
        'gst_amount',
        'customer_name',
        'customer_email',
        'customer_phone',
        'address',
        'customer_address',
        'booking_date',
        'time_slot',
        'location',
        'latitude',
        'longitude',
        'status',
        'payment_screenshot',
        'payment_verified',
        'notes',
        'booking_number'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'base_amount' => 'decimal:2',
        'gst_amount' => 'decimal:2',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'payment_verified' => 'boolean',
        'booking_date' => 'date',
        'booking_time' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(BookingItem::class);
    }
}
