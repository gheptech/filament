<?php

namespace App\Filament\Resources\MegaMenuGroups;

use App\Filament\Resources\MegaMenuGroups\Pages\CreateMegaMenuGroup;
use App\Filament\Resources\MegaMenuGroups\Pages\EditMegaMenuGroup;
use App\Filament\Resources\MegaMenuGroups\Pages\ListMegaMenuGroups;
use App\Filament\Resources\MegaMenuGroups\Pages\ViewMegaMenuGroup;
use App\Filament\Resources\MegaMenuGroups\Schemas\MegaMenuGroupForm;
use App\Filament\Resources\MegaMenuGroups\Schemas\MegaMenuGroupInfolist;
use App\Filament\Resources\MegaMenuGroups\Tables\MegaMenuGroupsTable;
use App\Models\MegaMenuGroup;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MegaMenuGroupResource extends Resource
{
    protected static ?string $model = MegaMenuGroup::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';

    // ✅ Tambahan untuk grouping di sidebar
    protected static UnitEnum|string|null $navigationGroup = 'Pengaturan Menu';
    protected static ?string $navigationLabel = 'Mega Menu Groups';
    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return MegaMenuGroupForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MegaMenuGroupInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MegaMenuGroupsTable::configure($table);
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
            'index' => ListMegaMenuGroups::route('/'),
            'create' => CreateMegaMenuGroup::route('/create'),
            'view' => ViewMegaMenuGroup::route('/{record}'),
            'edit' => EditMegaMenuGroup::route('/{record}/edit'),
        ];
    }
}
