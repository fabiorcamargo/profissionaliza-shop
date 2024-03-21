<?php

namespace App\Filament\Client\Resources\UserOrderResource\Pages;

use App\Filament\Client\Resources\UserOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserOrder extends EditRecord
{
    protected static string $resource = UserOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
