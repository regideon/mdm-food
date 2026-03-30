<?php

namespace App\Filament\Resources\Mmrves\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MmrvesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label('Request ID')
                    ->searchable()
                    ->sortable()
                    ->color('primary')
                    ->weight('bold'),

                TextColumn::make('material_code')
                    ->label('Material Code')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('requestedBy.name')
                    ->label('Requested By')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('requested_at')
                    ->label('Date')
                    ->date('M d, Y')
                    ->sortable(),

                TextColumn::make('status.name')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Completed'  => 'success',
                        'For Review' => 'warning',
                        'Submitted'  => 'info',
                        'Rejected'   => 'danger',
                        'Return'     => 'warning',
                        'Draft'      => 'gray',
                        default      => 'gray',
                    })
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
