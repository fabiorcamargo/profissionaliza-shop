<?php

namespace App\Filament\Resources\AsaasAccountResource\Pages;

use App\Filament\Resources\AsaasAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAsaasAccount extends EditRecord
{
    protected static string $resource = AsaasAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
