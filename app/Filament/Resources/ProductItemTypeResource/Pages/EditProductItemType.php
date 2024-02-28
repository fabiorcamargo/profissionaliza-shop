<?php

namespace App\Filament\Resources\ProductItemTypeResource\Pages;

use App\Filament\Resources\ProductItemTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductItemType extends EditRecord
{
    protected static string $resource = ProductItemTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
