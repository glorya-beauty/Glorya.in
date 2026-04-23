<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
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

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function getSubtotalAttribute()
    {
        return $this->service_price * $this->quantity;
    }
}
