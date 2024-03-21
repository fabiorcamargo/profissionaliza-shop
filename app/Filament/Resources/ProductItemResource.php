<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductItemResource\Pages;
use App\Filament\Resources\ProductItemResource\RelationManagers;
use App\Models\ProductItem;
use App\Models\ProductItemType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class ProductItemResource extends Resource
{
    protected static ?string $model = ProductItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->relationship('Product', 'name')
                    ->required(),
                Forms\Components\Select::make('product_item_type_id')
                    ->label('Tipo')
                    ->options(
                        ProductItemType::pluck('name', 'id')->toArray()
                    )
                    ->required(),
                Forms\Components\TextInput::make('icon')
                ->hint(new HtmlString('<a href="https://blade-ui-kit.com/blade-icons?set=1" target="_blank">Somente ícones Heroicons</a>'))
                ->placeholder('x-heroicon-o-video-camera')
                ->hintIcon('heroicon-s-arrow-top-right-on-square'),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_item_type_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductItems::route('/'),
            'create' => Pages\CreateProductItem::route('/create'),
            'view' => Pages\ViewProductItem::route('/{record}'),
            'edit' => Pages\EditProductItem::route('/{record}/edit'),
        ];
    }
}
