<?php

namespace App\Filament\Resources\MegaMenuItems\Pages;

use App\Filament\Resources\MegaMenuItems\MegaMenuItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMegaMenuItems extends ListRecords
{
    protected static string $resource = MegaMenuItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
