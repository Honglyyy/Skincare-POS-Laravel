<?php

namespace App\Filament\Resources\Inventories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;

class InventoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('product_id')
                ->relationship('product', 'name')
                ->required(),

            TextInput::make('quantity')
                ->numeric()
                ->required(),

            Select::make('quantityType')
            ->options([
                'in' => 'Stock In',
                'out' => 'Stock Out',
            ])
            ->default('in')
            ->required()
        ]);
    }
}
