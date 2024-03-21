<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\UserOrderResource\Pages;
use App\Filament\Client\Resources\UserOrderResource\RelationManagers;
use App\Filament\Resources\UserOrderResource\RelationManagers\ClientProductsRelationManager;
use App\Models\UserOrder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserOrderResource extends Resource
{
    protected static ?string $model = UserOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canCreate(): bool
    {
        return false;
    }
    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('payment_id')
                    ->maxLength(255),
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('asaas_account_id')
                    ->numeric(),
                Forms\Components\TextInput::make('billingType_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('value')
                    ->maxLength(255),
                Forms\Components\TextInput::make('installmentCount')
                    ->maxLength(255),
                Forms\Components\TextInput::make('installmentValue')
                    ->maxLength(255),
                Forms\Components\TextInput::make('dueDate')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('postalCode')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('addressNumber')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pay'),
                Forms\Components\TextInput::make('status')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(UserOrder::where('user_id', auth()->user()->id))
            ->columns([
                Tables\Columns\TextColumn::make('payment_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('asaas_account_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('billingType_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->searchable(),
                Tables\Columns\TextColumn::make('installmentCount')
                    ->searchable(),
                Tables\Columns\TextColumn::make('installmentValue')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dueDate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('postalCode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('addressNumber')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ClientProductsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserOrders::route('/'),
            'create' => Pages\CreateUserOrder::route('/create'),
            'view' => Pages\ViewUserOrder::route('/{record}'),
            'edit' => Pages\EditUserOrder::route('/{record}/edit'),
        ];
    }
}
