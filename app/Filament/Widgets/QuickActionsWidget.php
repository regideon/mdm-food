<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class QuickActionsWidget extends Widget
{
    protected string $view = 'filament.widgets.quick-actions-widget';

    protected static ?int $sort = 5;

    protected int | string | array $columnSpan = 2;

    public function getActivities(): array
    {
        return [
            [
                'status'      => 'approved',
                'title'       => 'MMRF-2024-0042 Approved',
                'description' => 'Material request approved by Finance Manager',
                'time'        => '2h ago',
            ],
            [
                'status'      => 'new',
                'title'       => 'New PURF Created',
                'description' => 'PURF-2024-0089 submitted for review',
                'time'        => '4h ago',
            ],
            [
                'status'      => 'pending',
                'title'       => 'MMRF-2024-0041 Pending',
                'description' => 'Awaiting department head approval',
                'time'        => '1d ago',
            ],
            [
                'status'      => 'rejected',
                'title'       => 'PURF-2024-0087 Rejected',
                'description' => 'Insufficient budget allocation',
                'time'        => '2d ago',
            ],
            [
                'status'      => 'approved',
                'title'       => 'MMRF-2024-0040 Approved',
                'description' => 'Approved by Finance Manager',
                'time'        => '3d ago',
            ],
        ];
    }

    public function getQuickActions(): array
    {
        $plus = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>';

        $doc  = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>';

        return [
            ['label' => 'Create MMRF', 'url' => '/mdm/create-mmrf',  'bg_color' => '#eff6ff', 'icon_color' => '#3b82f6', 'svg' => $plus],
            ['label' => 'Create PURF', 'url' => '/mdm/create-purf',  'bg_color' => '#f0fdf4', 'icon_color' => '#22c55e', 'svg' => $plus],
            ['label' => 'View Reports', 'url' => '/mdm/reports',        'bg_color' => '#faf5ff', 'icon_color' => '#8b5cf6', 'svg' => $doc],
        ];
    }
}
