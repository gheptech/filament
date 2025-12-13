<?php

namespace App\Filament\Resources\MegaMenuItems\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;

class MegaMenuItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('group_id')
                ->label('Grup Mega Menu')
                ->relationship('group', 'title') // pakai relasi group()
                ->required(),

            TextInput::make('label')
                ->label('Label Item')
                ->required()
                ->maxLength(100),

            TextInput::make('url')
                ->label('URL / Path')
                ->helperText('Isi dengan path relatif (/menu) atau URL penuh (https://example.com)')
                ->required()
                ->maxLength(255),

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