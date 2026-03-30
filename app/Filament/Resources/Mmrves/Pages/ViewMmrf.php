<?php

namespace App\Filament\Resources\Mmrves\Pages;

use App\Filament\Resources\Mmrves\MmrfResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMmrf extends ViewRecord
{
    protected static string $resource = MmrfResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
