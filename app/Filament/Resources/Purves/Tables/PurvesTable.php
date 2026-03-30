<?php

namespace App\Filament\Resources\Purves\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\ViewColumn;
use Carbon\Carbon;

class PurvesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_generator')
                    ->label('Request ID')
                    ->searchable()
                    ->sortable()
                    ->color('primary')
                    ->weight('bold'),

                TextColumn::make('requestedBy.name')
                    ->label('Requested By')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('requested_at')
                    ->label('Requested Date')
                    ->date('M d, Y')
                    ->sortable(),

                TextColumn::make('launch_date')
                    ->label('Launch Date')
                    ->date('M d, Y')
                    ->sortable(),

                // Rush Indicator as a custom view column
                // ViewColumn::make('launch_date')
                //     ->label('Priority')
                //     ->view('filament.tables.columns.rush-indicator-column')
                //     ->sortable(query: function ($query, $direction) {
                //         return $query->orderBy('launch_date', $direction);
                //     }),

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
            ])
            ->striped()
            ->defaultSort('launch_date', 'asc')
            ->recordClasses(function ($record): ?string {
                if (self::isRush($record)) {
                    // All rush orders (0-5 days) use danger styling
                    return 'bg-danger-50 dark:bg-danger-950/20 hover:bg-danger-100 dark:hover:bg-danger-950/30';
                }
                return null;
            });
    }

    private static function isRush($record): bool
    {
        if (!$record->launch_date) return false;
        $daysLeft = self::getDaysLeft($record);
        return $daysLeft >= 0 && $daysLeft <= 5;
    }

    private static function getDaysLeft($record): int
    {
        return now()->startOfDay()->diffInDays(
            Carbon::parse($record->launch_date)->startOfDay(),
            false
        );
    }
}
