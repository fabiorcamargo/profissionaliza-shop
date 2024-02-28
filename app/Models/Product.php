<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_category_id',
        'name',
        'description',
        'details'
    ];

    public function Image()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function Price()
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function Category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function Items()
    {
        return $this->hasMany(ProductItem::class);
    }
}
