<?php

namespace App\Filament\Resources\MegaMenuGroups\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;

class MegaMenuGroupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('mega_menu_id')
                ->label('Mega Menu')
                ->relationship('megaMenu', 'name')
                ->required(),

            TextInput::make('title')
                ->label('Nama Grup')
                ->required()
                ->maxLength(100),

            TextInput::make('order')
                ->label('Urutan')
                ->numeric()
                ->default(0),

            Toggle::make('active')
                ->label('Aktif')
                ->default(true),
        ]);
    }
}