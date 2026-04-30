<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('description'),
                Select::make('categories')
                    ->relationship('categories',"category_name")
                    ->multiple()
                    ->preload()
                    ->required(),
                Select::make('Suppliers')
                    ->relationship('suppliers',"name")
                    ->multiple()
                    ->preload()
                    ->required(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('cost')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                DateTimePicker::make('expirationDate')
                    ->required(),
                TextInput::make('variant')
                    ->required(),
                TextInput::make('barcode')
                    ->columnSpan(2),
                FileUpload::make('image')
                    ->image()
                    ->directory('products')
                    ->columnSpan(2),
            ]);
    }
}
