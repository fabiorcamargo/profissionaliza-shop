<?php

namespace App\Filament\Resources\AsaasCustomerResource\Pages;

use App\Filament\Resources\AsaasCustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAsaasCustomer extends EditRecord
{
    protected static string $resource = AsaasCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
