<?php

namespace App\Filament\Resources\MegaMenuGroups\Pages;

use App\Filament\Resources\MegaMenuGroups\MegaMenuGroupResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMegaMenuGroup extends ViewRecord
{
    protected static string $resource = MegaMenuGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
