<?php

namespace App\Filament\Resources\Inventories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InventoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([TextColumn::make('product.name')
                ->label('Product')
                ->searchable(),

                TextColumn::make('quantity')
                    ->sortable(),

                TextColumn::make('quantityType')
                    ->badge()
                    ->color(fn ($state) => $state === 'in' ? 'success' : 'danger'),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Date'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
