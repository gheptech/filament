<?php

namespace App\Filament\Resources\MegaMenuGroups\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class MegaMenuGroupsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Nama Grup')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('megaMenu.name')
                    ->label('Mega Menu')
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
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}