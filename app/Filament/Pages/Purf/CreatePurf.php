<?php

namespace App\Filament\Pages\Purf;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\View;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class CreatePurf extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected string $view = 'filament.pages.purf.create-purf';

    protected static ?string $navigationLabel = 'Create';

    protected static ?int $navigationSort = 20;

    protected static bool $shouldRegisterNavigation = false;

    public ?array $data = [];

    public int $currentStep = 1;

    public array $approvalSteps = [
        1 => 'Submitted',
        2 => 'Under Review',
        3 => 'Approved',
        4 => 'Scheduled',
        5 => 'Completed',
    ];

    public static function getNavigationGroup(): ?string
    {
        return 'PURF';
    }

    public function getTitle(): string
    {
        return '';
    }

    public function mount(): void
    {
        $user = Auth::user();

        $this->form->fill([
            'requester_name' => $user?->name,
            'department'     => $user?->department,
            'date'           => now()->format('M d, Y'),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ── Form Header Banner ──────────────────────────────────
                View::make('filament.pages.purf.partials.header-banner'),

                // ── Approval Progress Tracker ───────────────────────────
                View::make('filament.pages.purf.partials.approval-progress')
                    ->viewData([
                        'currentStep'   => $this->currentStep,
                        'approvalSteps' => $this->approvalSteps,
                    ]),

                // ── Header Information ──────────────────────────────────
                Section::make('Header Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('id_generator')
                                    ->label('ID Generator')
                                    ->prefix('PURF-')
                                    ->placeholder('Auto-generated')
                                    ->disabled()
                                    ->helperText('System-generated unique identifier'),

                                TextInput::make('tracking_number')
                                    ->label('Tracking Number')
                                    ->placeholder('Enter tracking number')
                                    ->required(),
                            ]),
                    ]),

                // ── Request Information ─────────────────────────────────
                Section::make('Request Information')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('requester_name')
                                    ->label("Requester's Name")
                                    ->placeholder('Auto-filled from profile')
                                    ->disabled(),

                                TextInput::make('department')
                                    ->label('Department')
                                    ->placeholder('Auto-filled from profile')
                                    ->disabled(),

                                TextInput::make('date')
                                    ->label('Date')
                                    ->disabled(),
                            ]),
                    ]),

                // ── Purpose of Request ──────────────────────────────────
                Section::make('Purpose of Request')
                    ->schema([
                        Textarea::make('description')
                            ->label('Description')
                            ->placeholder('Describe the purpose and details of your request...')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                // ── Project & Configuration Details ─────────────────────
                Section::make('Project & Configuration Details')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('project_name')
                                    ->label('Project Name')
                                    ->placeholder('Enter project name'),

                                Select::make('project_lead')
                                    ->label('Project Lead')
                                    ->placeholder('Select project lead')
                                    ->options([])
                                    ->searchable(),

                                Select::make('quality_control')
                                    ->label('Quality Control')
                                    ->placeholder('Select QC')
                                    ->options([])
                                    ->searchable(),
                            ]),

                        Grid::make(3)
                            ->schema([
                                Select::make('brand')
                                    ->label('Brand')
                                    ->placeholder('Select brand')
                                    ->options([])
                                    ->required()
                                    ->searchable(),

                                Select::make('action_required')
                                    ->label('Action Required')
                                    ->placeholder('Select action')
                                    ->options([
                                        'add'    => 'Add',
                                        'update' => 'Update',
                                        'remove' => 'Remove',
                                    ])
                                    ->required(),

                                Select::make('launch_type')
                                    ->label('Launch Type')
                                    ->placeholder('Select launch type')
                                    ->options([
                                        'soft'  => 'Soft Launch',
                                        'hard'  => 'Hard Launch',
                                        'pilot' => 'Pilot',
                                    ])
                                    ->required(),
                            ]),
                    ]),

                // ── Data Types & Channel Coverage ───────────────────────
                Grid::make(2)
                    ->schema([
                        Section::make('Data Types to Include')
                            ->schema([
                                CheckboxList::make('data_types')
                                    ->label('')
                                    ->options([
                                        'menu_details'          => 'Menu Details',
                                        'bom'                   => 'BOM',
                                        'mis_menu_hierarchy'    => 'MIS Menu Hierarchy',
                                        'pp_marketing_campaign' => 'PP & Marketing Campaign',
                                    ])
                                    ->columns(2)
                                    ->gridDirection('row'),
                            ]),

                        Section::make('Channel Coverage')
                            ->schema([
                                CheckboxList::make('channel_coverage')
                                    ->label('')
                                    ->options([
                                        'pos'               => 'POS',
                                        'call_center'       => 'Call Center',
                                        'chatbot'           => 'Chatbot',
                                        'web_app'           => 'Web App',
                                        'grabfood_gi'       => 'GrabFood/GI',
                                        'gcash'             => 'GCash',
                                        'foodpanda_fp'      => 'FoodPanda/FP',
                                        'mobile_app'        => 'Mobile App',
                                        'sdk'               => 'SDK',
                                        'dual_screen_pos'   => 'Dual Screen POS Image',
                                        'dsmr'              => 'DSMR',
                                        'splash_wheelchair' => 'Splash/Wheelchair Image',
                                        'kds'               => 'KDS',
                                    ])
                                    ->columns(2)
                                    ->gridDirection('row'),
                            ]),
                    ]),

                // ── Schedule Information ────────────────────────────────
                Section::make('Schedule Information')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                DatePicker::make('launch_date')
                                    ->label('Launch Date')
                                    ->required(),

                                DatePicker::make('expiry_date')
                                    ->label('Expiry Date'),

                                DatePicker::make('launch_date_checker')
                                    ->label('Launch Date Checker'),
                            ]),
                    ]),

            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        // Purf::create($data);

        Notification::make()
            ->title('PURF submitted successfully')
            ->success()
            ->send();
    }
}
