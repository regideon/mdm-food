<?php

namespace App\Filament\Resources\Purves\Pages;

use App\Filament\Resources\Purves\PurfResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPurf extends ViewRecord
{
    protected static string $resource = PurfResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
