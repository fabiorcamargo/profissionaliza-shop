<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_item_type_id',
        'description',
        'icon'
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function ProductItemType()
    {
        return $this->belongsTo(ProductItemType::class);
    }
}
