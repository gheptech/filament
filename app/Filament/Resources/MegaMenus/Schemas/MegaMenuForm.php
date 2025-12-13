<?php

namespace App\Filament\Resources\MegaMenus\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class MegaMenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->label('Nama Mega Menu')
                ->required()
                ->maxLength(100),

            TextInput::make('slug')
                ->label('Slug')
                ->required()
                ->unique(ignoreRecord: true),

            Toggle::make('active')
                ->label('Aktif')
                ->default(true),
        ]);
    }
}