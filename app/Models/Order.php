<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'total_price',
        'finished_by',
        'shipping_date'
    ];

    public function buyer()
    {
        return $this->hasMany(Cart::class, 'order_id')->first()->buyer();
    }

    public function items()
    {
        return $this->hasMany(Cart::class, 'order_id');
    }

    public function finished_by_user()
    {
        return $this->belongsTo(User::class, 'finished_by');
    }
}
