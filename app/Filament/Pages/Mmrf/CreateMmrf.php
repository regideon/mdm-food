<?php

namespace App\Filament\Pages\Mmrf;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\RawHtmlContent;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\View;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class CreateMmrf extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected string $view = 'filament.pages.mmrf.create-mmrf';

    protected static ?string $navigationLabel = 'Create';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?int $navigationSort = 5;

    public ?array $data = [];

    // Current approval step (1 = Submitted, 2 = Under Review, ... 9 = Completed)
    public int $currentStep = 1;

    public array $approvalSteps = [
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

    public static function getNavigationGroup(): ?string
    {
        return 'MMRF';
    }

    public function getTitle(): string
    {
        return '';
    }

    public function mount(): void
    {
        $user = Auth::user();

        $this->form->fill([
            'requestor'       => $user?->name,
            'department'      => $user?->department,
            'date'            => now()->format('M d, Y'),
            'action_required' => 'create',
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ── Form Header Banner ──────────────────────────────────
                View::make('filament.pages.mmrf.partials.header-banner'),

                // ── Approval Progress Tracker ───────────────────────────
                View::make('filament.pages.mmrf.partials.approval-progress')
                    ->viewData([
                        'currentStep'   => $this->currentStep,
                        'approvalSteps' => $this->approvalSteps,
                    ]),

                Wizard::make([
                    Wizard\Step::make('Basic Info')
                        ->icon('heroicon-m-circle-stack')
                        ->schema([
                            // ── Header Information ──────────────────────────────────
                            Section::make('Header Information')
                                ->schema([
                                    Grid::make(3)
                                        ->schema([
                                            TextInput::make('id_generator')
                                                ->label('ID Generator')
                                                ->prefix('MMRF-')
                                                ->placeholder('####')
                                                ->disabled()
                                                ->helperText('System-generated unique identifier'),

                                            TextInput::make('tracking_number')
                                                ->label('Tracking Number')
                                                ->placeholder('Enter tracking number')
                                                ->required(),

                                            TextInput::make('material_code')
                                                ->label('Material Code')
                                                ->placeholder('Enter material code'),
                                        ]),
                                ]),

                            // ── Request Information ─────────────────────────────────
                            Section::make('Request Information')
                                ->schema([
                                    Grid::make(3)
                                        ->schema([
                                            TextInput::make('requestor')
                                                ->label('Requestor')
                                                ->placeholder('Auto-filled')
                                                ->disabled(),

                                            TextInput::make('department')
                                                ->label('Department')
                                                ->placeholder('Auto-filled')
                                                ->disabled(),

                                            TextInput::make('date')
                                                ->label('Date')
                                                ->disabled(),
                                        ]),

                                    Grid::make(2)
                                        ->schema([
                                            TextInput::make('project_lead')
                                                ->label('Project Lead')
                                                ->placeholder('Enter project lead'),

                                            TextInput::make('email_address')
                                                ->label('Email Address')
                                                ->placeholder('Enter email address')
                                                ->email(),
                                        ]),
                                ]),

                            // ── Basic Information ───────────────────────────────────
                            Section::make('Basic Information')
                                ->schema([
                                    Radio::make('action_required')
                                        ->label('Action Required')
                                        ->options([
                                            'create' => 'Create',
                                            'extend' => 'Extend',
                                            'change' => 'Change',
                                        ])
                                        ->inline()
                                        ->required(),

                                    Grid::make(3)
                                        ->schema([
                                            CheckboxList::make('brand')
                                                ->label('Brand')
                                                ->options([
                                                    'kfc'       => 'KFC',
                                                    'pizza_hut' => 'Pizza Hut',
                                                    'subway'    => 'Subway',
                                                    'taco_bell' => 'Taco Bell',
                                                    'wendys'    => "Wendy's",
                                                ])
                                                ->columns(2)
                                                ->gridDirection('row'),

                                            CheckboxList::make('enterprise')
                                                ->label('Enterprise')
                                                ->options([
                                                    'enterprise_a' => 'Enterprise A',
                                                    'enterprise_b' => 'Enterprise B',
                                                    'enterprise_c' => 'Enterprise C',
                                                ])
                                                ->gridDirection('row'),

                                            CheckboxList::make('location')
                                                ->label('Location')
                                                ->options([
                                                    'manila'      => 'Manila',
                                                    'davao'       => 'Davao',
                                                    'bgc'         => 'BGC',
                                                    'cebu'        => 'Cebu',
                                                    'makati'      => 'Makati',
                                                    'quezon_city' => 'Quezon City',
                                                ])
                                                ->columns(2)
                                                ->gridDirection('row'),
                                        ]),

                                    Grid::make(3)
                                        ->schema([
                                            CheckboxList::make('region')
                                                ->label('Region')
                                                ->options([
                                                    'ncr'      => 'NCR',
                                                    'visayas'  => 'Visayas',
                                                    'luzon'    => 'Luzon',
                                                    'mindanao' => 'Mindanao',
                                                ])
                                                ->columns(2)
                                                ->gridDirection('row'),

                                            CheckboxList::make('type')
                                                ->label('Type')
                                                ->options([
                                                    'raw_material'  => 'Raw Material',
                                                    'finished_good' => 'Finished Good',
                                                    'semi_finished' => 'Semi-Finished',
                                                    'packaging'     => 'Packaging',
                                                    'spare_parts'   => 'Spare Parts',
                                                ])
                                                ->gridDirection('row'),

                                            Select::make('loading_group')
                                                ->label('Loading Group')
                                                ->placeholder('Select group')
                                                ->options([])
                                                ->searchable(),
                                        ]),
                                ]),

                            // ── Purpose of Request ──────────────────────────────────
                            Section::make('Purpose of Request')
                                ->schema([
                                    Textarea::make('description')
                                        ->label(false)
                                        ->placeholder('Provide detailed justification for material creation, extension, or change...')
                                        ->required()
                                        ->rows(5)
                                        ->columnSpanFull(),
                                ]),
                        ])
                        ->columnSpanFull(),
                ]),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        // Mmrf::create($data);

        Notification::make()
            ->title('MMRF submitted successfully')
            ->success()
            ->send();
    }
}
