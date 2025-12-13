<?php

namespace App\Filament\Resources\MegaMenuGroups\Pages;

use App\Filament\Resources\MegaMenuGroups\MegaMenuGroupResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMegaMenuGroup extends EditRecord
{
    protected static string $resource = MegaMenuGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
