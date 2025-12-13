<?php

namespace App\Filament\Resources\MegaMenuItems;

use App\Filament\Resources\MegaMenuItems\Pages\CreateMegaMenuItem;
use App\Filament\Resources\MegaMenuItems\Pages\EditMegaMenuItem;
use App\Filament\Resources\MegaMenuItems\Pages\ListMegaMenuItems;
use App\Filament\Resources\MegaMenuItems\Schemas\MegaMenuItemForm;
use App\Filament\Resources\MegaMenuItems\Tables\MegaMenuItemsTable;
use App\Models\MegaMenuItem;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MegaMenuItemResource extends Resource
{
    protected static ?string $model = MegaMenuItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'label';

    // ✅ Tambahan untuk grouping di sidebar
    protected static UnitEnum|string|null $navigationGroup = 'Pengaturan Menu';
    protected static ?string $navigationLabel = 'Mega Menu Items';
    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return MegaMenuItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MegaMenuItemsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMegaMenuItems::route('/'),
            'create' => CreateMegaMenuItem::route('/create'),
            'edit' => EditMegaMenuItem::route('/{record}/edit'),
        ];
    }
}
