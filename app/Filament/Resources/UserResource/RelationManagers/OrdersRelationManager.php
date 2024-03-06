<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\UserOrderResource;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)
                    ->schema([
                        Forms\Components\Select::make('billingType_id')
                            ->relationship(name: 'billingTypes', titleAttribute: 'name'),
                        Forms\Components\TextInput::make('value')

                            ->maxLength(255),
                        Forms\Components\TextInput::make('installmentCount')

                            ->maxLength(255),
                        Forms\Components\TextInput::make('installmentValue')

                            ->maxLength(255),
                        Forms\Components\DatePicker::make('dueDate')
                            ->required(),
                        Forms\Components\TextInput::make('postalCode')
                            ->required()
                            ->maxLength(8),
                        Forms\Components\TextInput::make('addressNumber')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(1)
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->maxLength(255),
                    ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('id'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->url(fn (Model $record): string => UserOrderResource::getUrl('edit', ['record' => $record])),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
