<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Livewire\Cart;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'client') {
            return true;
        }else if ($panel->getId() === 'admin') {
            return $this->email == 'fabiorcamargo@gmail.com';
        }

        return true;
    }




    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'cpfCnpj',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function boot()
    {
        parent::boot();

        // Defina o manipulador de evento para o evento "deleting"
        static::deleting(function ($user) {
            // Verifique se o usuário possui um AsaasCustomer associado
            if ($user->asaasCustomer) {
                // Exclua o AsaasCustomer associado ao usuário
                $user->asaasCustomer->delete();
            }
        });
    }

    public function cart(){
        return $this->hasOne(UserCart::class);
    }

    public function AsaasCustomer(){
        return $this->hasOne(AsaasCustomer::class);
    }

    public function orders()
    {
        return $this->hasMany(UserOrder::class);
    }
}
