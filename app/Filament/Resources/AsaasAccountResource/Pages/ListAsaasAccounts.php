<?php

namespace App\Filament\Resources\AsaasAccountResource\Pages;

use App\Filament\Resources\AsaasAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAsaasAccounts extends ListRecords
{
    protected static string $resource = AsaasAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
