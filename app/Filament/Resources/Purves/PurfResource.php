<?php

namespace App\Filament\Resources\Purves;

use App\Filament\Resources\Purves\Pages\CreatePurf;
use App\Filament\Resources\Purves\Pages\EditPurf;
use App\Filament\Resources\Purves\Pages\ListPurves;
use App\Filament\Resources\Purves\Pages\ViewPurf;
use App\Filament\Resources\Purves\Schemas\PurfForm;
use App\Filament\Resources\Purves\Schemas\PurfInfolist;
use App\Filament\Resources\Purves\Tables\PurvesTable;
use App\Models\Purf;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PurfResource extends Resource
{
    protected static ?string $model = Purf::class;

    protected static ?string $recordTitleAttribute = 'Purf';

    protected static ?string $navigationLabel = 'Create';

    public static function getNavigationGroup(): ?string
    {
        return 'PURF';
    }

    public static function form(Schema $schema): Schema
    {
        return PurfForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PurfInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PurvesTable::configure($table);
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
            'index' => ListPurves::route('/'),
            'create' => CreatePurf::route('/create'),
            'view' => ViewPurf::route('/{record}'),
            'edit' => EditPurf::route('/{record}/edit'),
        ];
    }
}
