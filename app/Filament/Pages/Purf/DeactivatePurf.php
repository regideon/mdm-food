<?php

namespace App\Filament\Pages\Purf;

use Filament\Pages\Page;

class DeactivatePurf extends Page
{
    protected string $view = 'filament.pages.purf.deactivate-purf';

    protected static ?string $navigationLabel = 'Deactivate';

    protected static ?int $navigationSort = 30;

    public static function getNavigationGroup(): ?string
    {
        return 'PURF';
    }

    public function getTitle(): string
    {
        return '';
    }
}
