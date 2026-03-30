<?php

namespace App\Filament\Resources\Mmrves\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MmrfInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('requested_by')
                    ->numeric(),
                TextEntry::make('status_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('tracking_number')
                    ->placeholder('-'),
                TextEntry::make('code'),
                TextEntry::make('requested_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
