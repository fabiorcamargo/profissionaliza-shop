<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'billingType_id',
        'amount',
        'value',
        'installmentCount',
        'installmentValue',
        'dueDate',
        'postalCode',
        'addressNumber',
        'description',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'asaas_account_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function asaasCustomer()
    {
        return $this->user->AsaasCustomer;
    }

    public function products(){

        return $this->hasMany(UserOrderProducts::class);

    }

    public function billingTypes(){

        return $this->hasMany(BillingType::class);

    }

    public function asaasAccount()
    {
        return $this->asaasCustomer()->asaasAccount;
    }
}
