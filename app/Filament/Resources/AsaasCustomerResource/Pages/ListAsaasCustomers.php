<?php

namespace App\Filament\Resources\AsaasCustomerResource\Pages;

use App\Filament\Resources\AsaasCustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAsaasCustomers extends ListRecords
{
    protected static string $resource = AsaasCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
