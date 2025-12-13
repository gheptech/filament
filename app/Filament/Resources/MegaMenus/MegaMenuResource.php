<?php

namespace App\Filament\Resources\MegaMenus;

use App\Filament\Resources\MegaMenus\Pages\CreateMegaMenu;
use App\Filament\Resources\MegaMenus\Pages\EditMegaMenu;
use App\Filament\Resources\MegaMenus\Pages\ListMegaMenus;
use App\Filament\Resources\MegaMenus\Schemas\MegaMenuForm;
use App\Filament\Resources\MegaMenus\Tables\MegaMenusTable;
use App\Models\MegaMenu;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MegaMenuResource extends Resource
{
    protected static ?string $model = MegaMenu::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'name';

    // ✅ Tambahan untuk grouping di sidebar
    protected static UnitEnum|string|null $navigationGroup = 'Pengaturan Menu';
    protected static ?string $navigationLabel = 'Mega Menus';
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return MegaMenuForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MegaMenusTable::configure($table);
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
            'index' => ListMegaMenus::route('/'),
            'create' => CreateMegaMenu::route('/create'),
            'edit' => EditMegaMenu::route('/{record}/edit'),
        ];
    }
}
