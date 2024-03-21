<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'asaas_account_id',
        'billingType_id',
        'amount',
        'value',
        'installmentCount',
        'installmentValue',
        'dueDate',
        'postalCode',
        'addressNumber',
        'description',
        'pay',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',

    ];

    protected $casts = [
        'pay' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Customer()
    {
        return $this->user->AsaasCustomer;
    }

    public function products(){
        return $this->hasMany(UserOrderProducts::class);
    }

    public function billingTypes(){
        return $this->belongsTo(BillingType::class, 'billingType_id', 'id');
    }

    public function Account()
    {
        return $this->belongsTo(AsaasAccount::class, 'asaas_account_id', 'id');
    }
}
