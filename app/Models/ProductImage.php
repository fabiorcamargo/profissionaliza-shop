<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'path'
    ];

    protected static function booted(): void
    {
        static::deleted(function (ProductImage $productImage) {
            Storage::disk('product')->delete($productImage->path);
        });
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
