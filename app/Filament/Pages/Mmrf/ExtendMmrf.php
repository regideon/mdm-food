<?php

namespace App\Filament\Pages\Mmrf;

use Filament\Pages\Page;

class ExtendMmrf extends Page
{
    protected string $view = 'filament.pages.mmrf.extend-mmrf';

    protected static ?string $navigationLabel = 'Extend';

    protected static ?int $navigationSort = 15;

    public static function getNavigationGroup(): ?string
    {
        return 'MMRF';
    }

    public function getTitle(): string
    {
        return '';
    }
}
