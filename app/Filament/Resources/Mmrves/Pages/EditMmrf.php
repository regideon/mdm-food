<?php

namespace App\Filament\Resources\Mmrves\Pages;

use App\Filament\Resources\Mmrves\MmrfResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMmrf extends EditRecord
{
    protected static string $resource = MmrfResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
