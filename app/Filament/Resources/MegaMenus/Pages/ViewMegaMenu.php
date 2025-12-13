<?php

namespace App\Filament\Resources\MegaMenus\Pages;

use App\Filament\Resources\MegaMenus\MegaMenuResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMegaMenu extends ViewRecord
{
    protected static string $resource = MegaMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
