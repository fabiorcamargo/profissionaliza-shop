<?php

namespace App\Observers;

use App\Models\UserOrder;

class UserOrderObserver
{
    /**
     * Handle the UserOrder "created" event.
     */
    public function created(UserOrder $userOrder): void
    {
        $userOrder->asaas_account_id = $userOrder->asaasAccount()->id;
        $userOrder->save();
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
