<?php

namespace App\Filament\Pages\Purf;

use Filament\Pages\Page;

class UpdatePurf extends Page
{
    protected string $view = 'filament.pages.purf.update-purf';

    protected static ?string $navigationLabel = 'Update';

    protected static ?int $navigationSort = 25;

    public static function getNavigationGroup(): ?string
    {
        return 'PURF';
    }

    public function getTitle(): string
    {
        return '';
    }
}
