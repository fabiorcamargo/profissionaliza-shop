<?php

namespace App\Filament\Client\Resources\UserOrderResource\Pages;

use App\Filament\Client\Resources\UserOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserOrder extends CreateRecord
{
    protected static string $resource = UserOrderResource::class;
}
