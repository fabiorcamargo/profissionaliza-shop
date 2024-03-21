<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserOrderResource\Pages;
use App\Filament\Resources\UserOrderResource\RelationManagers;
use App\Filament\Resources\UserOrderResource\RelationManagers\ProductsRelationManager;
use App\Models\UserOrder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserOrderResource extends Resource
{
    protected static ?string $model = UserOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'cpfCnpj')
                    ->searchable()
                    ->preload()
                    ->required(),
                // Forms\Components\Select::make('asaas_account_id')
                //     ->label('Conta do Asaas')
                //     ->relationship(name: 'Account', titleAttribute: 'name')
                //     ->required(),
                Forms\Components\Select::make('billingType_id')
                    ->label('Forma de Pagamento')
                    ->relationship(name: 'billingTypes', titleAttribute: 'name')
                    ->required(),
                Forms\Components\Select::make('payType')
                    ->label('Tipo de Pagamento')
                    ->options([
                        '1' => 'A Vista',
                        '2' => 'Parcelado'
                    ])
                    ->live(),
                Forms\Components\TextInput::make('value')
                    ->label('Valor')
                    ->visible(fn (Get $get): bool => $get('payType') === '1')
                    ->maxLength(255),
                Forms\Components\TextInput::make('installmentCount')
                    ->label('Parcelas')
                    ->visible(fn (Get $get): bool => $get('payType') === '2')
                    ->maxLength(255),
                Forms\Components\TextInput::make('installmentValue')
                    ->label('Valor da Parcela')
                    ->visible(fn (Get $get): bool => $get('payType') === '2')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('dueDate')
                    ->label('Data de Vencimento')
                    ->required(),
                Forms\Components\TextInput::make('postalCode')
                    ->label('CEP')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('addressNumber')
                    ->label('Número da Residência')
                    ->required()
                    ->maxLength(255)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('user_id')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.cpfCnpj')
                    ->label('Documento')
                    ->sortable(),
                Tables\Columns\TextColumn::make('Account.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('billingTypes.name')
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ProductsRelationManager::class
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
