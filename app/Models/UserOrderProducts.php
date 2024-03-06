<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrderProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'amount'
    ];

    public function order(){
        return $this->hasOne(UserOrder::class);
    }

    public function products(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
