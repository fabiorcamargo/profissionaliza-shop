<?php

namespace App\Observers;

use App\Jobs\AsaasDeletedCustomerJob;
use App\Models\AsaasAccount;
use App\Models\AsaasCustomer;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        AsaasCustomer::create([
            "user_id" => $user->id,
            "asaas_account_id" => AsaasAccount::first()->id,
            "name" => $user->name,
            "email" => $user->email,
            "mobilePhone" => $user->phone,
            "cpfCnpj" => $user->cpfCnpj,
        ]);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
       

    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
