<?php

namespace App\Filament\Resources\UserOrderProductsResource\Pages;

use App\Filament\Resources\UserOrderProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserOrderProducts extends EditRecord
{
    protected static string $resource = UserOrderProductsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
