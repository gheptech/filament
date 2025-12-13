<?php

namespace App\Filament\Resources\MegaMenuGroups\Pages;

use App\Filament\Resources\MegaMenuGroups\MegaMenuGroupResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMegaMenuGroups extends ListRecords
{
    protected static string $resource = MegaMenuGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
