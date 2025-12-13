<?php

namespace App\Filament\Resources\MegaMenuItems\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class MegaMenuItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')
                    ->label('Label')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('url')
                    ->label('URL / Path')
                    ->searchable(),

                TextColumn::make('group.title')
                    ->label('Grup Mega Menu')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),

                ToggleColumn::make('active')
                    ->label('Aktif')
                    ->sortable(),
            ])
            ->filters([
                \Filament\Tables\Filters\TernaryFilter::make('active')
                    ->label('Status Aktif'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}