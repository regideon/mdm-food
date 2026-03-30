<?php

namespace App\Filament\Resources\Purves\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;

class PurfBomScreenshot
{
    public static function getSchema(): array
    {
        return [
            // ── BOM Screenshot ───────────────────────────────────────
            Section::make('BOM Screenshot')
                ->schema([
                    FileUpload::make('bom_screenshot')
                        ->label('Store BOM')
                        ->acceptedFileTypes([
                            'image/jpeg',
                            'image/png',
                            'image/gif',
                            'image/webp',
                            'application/pdf',
                        ])
                        ->maxSize(10240) // 10MB
                        ->downloadable()
                        ->previewable()
                        ->helperText('Accepted formats: JPG, PNG, GIF, WEBP, PDF (max 10MB)'),
                ])
                ->collapsible(),
        ];
    }
}
