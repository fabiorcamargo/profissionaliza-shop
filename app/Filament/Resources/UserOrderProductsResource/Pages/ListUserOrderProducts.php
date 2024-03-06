<?php

namespace App\Filament\Resources\UserOrderProductsResource\Pages;

use App\Filament\Resources\UserOrderProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserOrderProducts extends ListRecords
{
    protected static string $resource = UserOrderProductsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
