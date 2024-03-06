<?php

namespace App\Filament\Resources\UserOrderResource\Pages;

use App\Filament\Resources\UserOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUserOrder extends ViewRecord
{
    protected static string $resource = UserOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
