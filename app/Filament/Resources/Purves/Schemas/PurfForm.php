<?php

namespace App\Filament\Resources\Purves\Schemas;

use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;

class PurfForm
{
    public static function configure(Schema $schema, int $currentStep = 1, array $approvalSteps = []): Schema
    {
        if (empty($approvalSteps)) {
            $approvalSteps = [
                1 => 'Submitted',
                2 => 'Under Review',
                3 => 'Approved',
                4 => 'Scheduled',
                5 => 'Completed',
            ];
        }
        return $schema
            ->columns(1)
            ->components([
                // ── Form Header Banner ──────────────────────────────────
                View::make('filament.pages.purf.partials.header-banner'),

                // ── Approval Progress Tracker ───────────────────────────
                View::make('filament.pages.purf.partials.approval-progress')
                    ->viewData([
                        'currentStep'   => $currentStep,
                        'approvalSteps' => $approvalSteps,
                    ]),

                // ── Basic Information Section ───────────────────────────
                Tabs::make('Basic Information')
                    ->tabs([
                        Tabs\Tab::make('Basic Info')
                            ->icon('heroicon-m-circle-stack')
                            ->schema([
                                ...PurfBasicInfo::getSchema(),
                            ]),

                        Tabs\Tab::make('Menu Details')
                            ->icon('heroicon-m-document-text')
                            ->schema([
                                ...PurfMenu::getSchema(),
                            ]),

                        Tabs\Tab::make('Pilot Details')
                            ->icon('heroicon-m-rocket-launch')
                            ->schema([
                                ...PurfPilot::getSchema(),
                            ]),

                        Tabs\Tab::make('PP & Marketing Campaign')
                            ->icon('heroicon-m-chart-bar')
                            ->schema([
                                ...PurfPpMarketingCampaign::getSchema(),
                            ]),

                        Tabs\Tab::make('Regular BOM')
                            ->icon('heroicon-m-ellipsis-horizontal')
                            ->schema([
                                ...PurfRegularBom::getSchema(),
                            ]),

                        Tabs\Tab::make('Combo BOM')
                            ->icon('heroicon-m-puzzle-piece')
                            ->schema([
                                ...PurfComboBom::getSchema(),
                            ]),

                        Tabs\Tab::make('BOM Screenshot')
                            ->icon('heroicon-m-photo')
                            ->schema([
                                ...PurfBomScreenshot::getSchema(),
                            ]),

                        Tabs\Tab::make('Product Hierarchy')
                            ->icon('heroicon-m-cube-transparent')
                            ->schema([
                                ...PurfProductHierarchy::getSchema(),
                            ]),

                        Tabs\Tab::make('MIS')
                            ->icon('heroicon-m-computer-desktop')
                            ->schema([
                                ...PurfMis::getSchema(),
                            ]),

                        Tabs\Tab::make('DSMR')
                            ->icon('heroicon-m-cpu-chip')
                            ->schema([
                                ...PurfDsmr::getSchema(),
                            ]),

                        Tabs\Tab::make('Dual Screen')
                            ->icon('heroicon-m-archive-box')
                            ->schema([
                                ...PurfDualScreen::getSchema(),
                            ]),
                    ])
                    ->activeTab(1),
            ]);
    }
}
