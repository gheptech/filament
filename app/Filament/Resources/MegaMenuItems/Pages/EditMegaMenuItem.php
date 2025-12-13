<?php

namespace App\Filament\Resources\MegaMenuItems\Pages;

use App\Filament\Resources\MegaMenuItems\MegaMenuItemResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMegaMenuItem extends EditRecord
{
    protected static string $resource = MegaMenuItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
