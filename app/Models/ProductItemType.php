<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItemType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function ProductItem()
    {
        return $this->hasMany(ProductItem::class);
    }
}
