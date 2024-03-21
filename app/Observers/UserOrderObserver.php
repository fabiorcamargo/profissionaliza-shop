<?php

namespace App\Observers;

use App\Jobs\UserOrderCreateJob;
use App\Models\UserOrder;
use Livewire\Livewire;

class UserOrderObserver
{
    /**
     * Handle the UserOrder "created" event.
     */
    public function created(UserOrder $userOrder): void
    {

        $userOrder->asaas_account_id = $userOrder->user->AsaasCustomer->asaas_account_id;
        $userOrder->save();

        dispatch(new UserOrderCreateJob($userOrder));

    }

    /**
     * Handle the UserOrder "updated" event.
     */
    public function updated(UserOrder $userOrder): void
    {
        //
    }

    /**
     * Handle the UserOrder "deleted" event.
     */
    public function deleted(UserOrder $userOrder): void
    {
        //
    }

    /**
     * Handle the UserOrder "restored" event.
     */
    public function restored(UserOrder $userOrder): void
    {
        //
    }

    /**
     * Handle the UserOrder "force deleted" event.
     */
    public function forceDeleted(UserOrder $userOrder): void
    {
        //
    }
}
