<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
        use HasFactory;

    protected $fillable = [
        'customer_id',
        'total',
        'status',
    ];

    // A customer owns the order
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // An order has many items
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
