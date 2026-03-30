<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Mmrf;
use App\Models\Purf;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total MMRF Requests', Mmrf::count())
                ->description('+12% from last month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->icon('heroicon-o-document-text'),

            Stat::make('Total PURF Requests', Purf::count())
                ->description('+8% from last month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('info')
                ->icon('heroicon-o-user-group'),

            Stat::make('Pending Approvals', Mmrf::where('status_id', 'pending')->count())
                ->description('Pending')
                ->color('warning')
                ->icon('heroicon-o-clock'),

            Stat::make('Approved This Month', Mmrf::where('status_id', 'approved')
                ->whereMonth('updated_at', now()->month)
                ->count())
                ->description('Complete')
                ->color('success')
                ->icon('heroicon-o-check-circle'),
        ];
    }
}
