<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\AsaasAccount;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AsaasCustomerRelationManager extends RelationManager
{
    protected static string $relationship = 'AsaasCustomer';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('asaas_account_id')
                ->relationship(name: 'asaasAccount', titleAttribute: 'name'),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('mobilePhone')
                    ->maxLength(20),
                Forms\Components\TextInput::make('cpfCnpj')
                    ->required()
                    ->maxLength(18),
                Forms\Components\TextInput::make('postalCode')
                    ->maxLength(8),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('addressNumber')
                    ->maxLength(255),
                Forms\Components\TextInput::make('province')
                    ->maxLength(255),
                Forms\Components\TextInput::make('externalReference')
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('asaas_customer'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
