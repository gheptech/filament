<?php

namespace App\Filament\Resources\MenuItems\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class MenuItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\Select::make('menu_id')
                ->options(
                    \App\Models\Menu::all()->mapWithKeys(fn ($menu) => [
                        $menu->id => $menu->name . ($menu->active ? '' : ' (Inactive)')
                    ])
                )
                ->label('Menu')
                ->required(),

            Forms\Components\TextInput::make('label')
                ->label('Label')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('url')
                ->label('URL')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('order')
                ->label('Order')
                ->numeric()
                ->default(0),

            Forms\Components\Select::make('parent_id')
                ->options(
                    \App\Models\MenuItem::all()->mapWithKeys(fn ($item) => [
                        $item->id => $item->label . ($item->active ? '' : ' (Inactive)')
                    ])
                )
                ->label('Parent Item')
                ->nullable(),
                
            Forms\Components\Toggle::make('active')
                ->label('Active')
                ->default(true),
        ]);
    }
}