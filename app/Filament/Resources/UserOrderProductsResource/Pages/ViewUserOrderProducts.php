<?php

namespace App\Filament\Resources\UserOrderProductsResource\Pages;

use App\Filament\Resources\UserOrderProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUserOrderProducts extends ViewRecord
{
    protected static string $resource = UserOrderProductsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
