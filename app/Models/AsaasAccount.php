<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsaasAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'token'
    ];

    // Relação com os clientes do Asaas
    public function asaasCustomers()
    {
        return $this->hasMany(AsaasCustomer::class);
    }
}
