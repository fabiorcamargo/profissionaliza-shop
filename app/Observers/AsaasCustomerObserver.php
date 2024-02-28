<?php

namespace App\Observers;

use App\Jobs\AsaasNewCustomerJob;
use App\Jobs\AsaasUpdateCustomerJob;
use App\Models\AsaasCustomer;

class AsaasCustomerObserver
{
    /**
     * Handle the AsaasCustomer "created" event.
     */
    public function created(AsaasCustomer $asaasCustomer): void
    {
        dispatch(new AsaasNewCustomerJob($asaasCustomer));
    }

    /**
     * Handle the AsaasCustomer "updated" event.
     */
    public function updated(AsaasCustomer $asaasCustomer): void
    {
        dispatch(new AsaasUpdateCustomerJob($asaasCustomer));
    }

    /**
     * Handle the AsaasCustomer "deleted" event.
     */
    public function deleted(AsaasCustomer $asaasCustomer): void
    {
        //
    }

    /**
     * Handle the AsaasCustomer "restored" event.
     */
    public function restored(AsaasCustomer $asaasCustomer): void
    {
        //
    }

    /**
     * Handle the AsaasCustomer "force deleted" event.
     */
    public function forceDeleted(AsaasCustomer $asaasCustomer): void
    {
        //
    }
}
