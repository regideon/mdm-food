<?php

namespace App\Filament\Resources\Mmrves\Schemas;

use Filament\Schemas\Components\View;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Schema;

class MmrfForm
{
    public static function configure(Schema $schema, int $currentStep = 1, array $approvalSteps = []): Schema
    {
        if (empty($approvalSteps)) {
            $approvalSteps = [
                1 => 'Submitted',
                2 => 'Under Review',
                3 => 'Purchasing',
                4 => 'MRP Planning (PP)',
                5 => 'MRP Planning (SO)',
                6 => 'Accounting',
                7 => 'Operations',
                8 => 'MDM Specialist',
                9 => 'Completed',
            ];
        }

        return $schema
            ->columns(1)
            ->components([
                // ── Form Header Banner ──────────────────────────────────
                View::make('filament.pages.mmrf.partials.header-banner'),

                // ── Approval Progress Tracker ───────────────────────────
                View::make('filament.pages.mmrf.partials.approval-progress')
                    ->viewData([
                        'currentStep'   => $currentStep,
                        'approvalSteps' => $approvalSteps,
                    ]),

                Wizard::make([
                    Wizard\Step::make('Basic Info')
                        ->icon('heroicon-m-circle-stack')
                        ->schema([
                            ...MmrfBasicInfo::getSchema(),
                        ]),
                    Wizard\Step::make('Basic Data')
                        ->icon('heroicon-m-circle-stack')
                        ->schema([
                            ...MmrfBasicData::getSchema(),
                        ]),
                    Wizard\Step::make('Sales View')
                        ->icon('heroicon-m-shopping-cart')
                        ->schema([
                            ...MmrfSalesData::getSchema(),
                        ]),
                    Wizard\Step::make('Plant View')
                        ->icon('heroicon-m-building-office')
                        ->schema([
                            ...MmrfPlantData::getSchema(),
                        ]),
                ])
                    ->columnSpanFull(),
            ]);
    }
}
