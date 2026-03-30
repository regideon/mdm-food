<?php

namespace App\Filament\Resources\Mmrves;

use App\Filament\Resources\Mmrves\Pages\CreateMmrf;
use App\Filament\Resources\Mmrves\Pages\EditMmrf;
use App\Filament\Resources\Mmrves\Pages\ListMmrves;
use App\Filament\Resources\Mmrves\Pages\ViewMmrf;
use App\Filament\Resources\Mmrves\Schemas\MmrfForm;
use App\Filament\Resources\Mmrves\Schemas\MmrfInfolist;
use App\Filament\Resources\Mmrves\Tables\MmrvesTable;
use App\Models\Mmrf;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MmrfResource extends Resource
{
    protected static ?string $model = Mmrf::class;

    protected static ?string $recordTitleAttribute = 'Mmrf';

    protected static ?string $navigationLabel = 'Create';

    public static function getNavigationGroup(): ?string
    {
        return 'MMRF';
    }

    public static function form(Schema $schema): Schema
    {
        return MmrfForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MmrfInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MmrvesTable::configure($table);
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
            'index' => ListMmrves::route('/'),
            'create' => CreateMmrf::route('/create'),
            'view' => ViewMmrf::route('/{record}'),
            'edit' => EditMmrf::route('/{record}/edit'),
        ];
    }
}
