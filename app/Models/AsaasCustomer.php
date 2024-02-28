<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsaasCustomer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "email",
        "mobilePhone",
        "cpfCnpj",
        "postalCode",
        "address",
        "addressNumber",
        "province",
        "externalReference"
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'asaas_account_id'
        // Adicione aqui os campos que deseja ocultar
    ];


    public function toArray()
    {
        // Obtém apenas os atributos que estão na lista fillable e não são nulos
        $attributes = array_filter(
            $this->only($this->fillable),
            function ($value) {
                return $value !== null;
            }
        );

        return $attributes;
    }

    // Relação com a conta do Asaas
    public function asaasAccount()
    {
        return $this->belongsTo(AsaasAccount::class);
    }
}
