<?php

namespace App\Filament\Pages\Purf;

use Filament\Pages\Page;

class ReactivatePurf extends Page
{
    protected string $view = 'filament.pages.purf.reactivate-purf';

    protected static ?string $navigationLabel = 'Reactivate';

    protected static ?int $navigationSort = 35;

    public static function getNavigationGroup(): ?string
    {
        return 'PURF';
    }

    public function getTitle(): string
    {
        return '';
    }
}
