<?php

namespace App\Filament\Resources\ProductItemTypeResource\Pages;

use App\Filament\Resources\ProductItemTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProductItemType extends ViewRecord
{
    protected static string $resource = ProductItemTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
