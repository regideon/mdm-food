<?php

namespace App\Filament\Resources\Purves\Pages;

use App\Filament\Resources\Purves\PurfResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPurf extends EditRecord
{
    protected static string $resource = PurfResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
