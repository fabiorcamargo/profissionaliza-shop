<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
    ];

    protected $casts = [
        'body' => 'array',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
