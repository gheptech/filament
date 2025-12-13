<?php

namespace App\Filament\Resources\MegaMenuGroups\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;

class MegaMenuGroupInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('title')
                ->label('Nama Grup'),

            TextEntry::make('megaMenu.name')
                ->label('Mega Menu'),

            TextEntry::make('order')
                ->label('Urutan'),

            IconEntry::make('active')
                ->label('Aktif')
                ->boolean(), // tampilkan sebagai ikon centang / silang
        ]);
    }
}