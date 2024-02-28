<?php

namespace App\Filament\Resources\ProductItemTypeResource\Pages;

use App\Filament\Resources\ProductItemTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductItemTypes extends ListRecords
{
    protected static string $resource = ProductItemTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
