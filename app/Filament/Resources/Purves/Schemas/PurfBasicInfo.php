<?php

namespace App\Filament\Resources\Purves\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;

class PurfBasicInfo
{
    public static function getSchema(): array
    {
        return [
            // ── Header Information ──────────────────────────────────
            Section::make('Header Information')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextInput::make('id_generator')
                                ->label('ID Generator')
                                ->default('PURF-' . now()->format('mdYHis'))
                                ->disabled()
                                ->helperText('System-generated unique identifier')
                                ->dehydrated(true),

                            TextInput::make('tracking_number')
                                ->label('Tracking Number')
                                ->placeholder('Enter tracking number'),
                        ]),
                ]),

            // ── Request Information ─────────────────────────────────
            Section::make('Request Information')
                ->schema([
                    Grid::make(3)
                        ->schema([
                            TextInput::make('requester_name')
                                ->label("Requester's Name")
                                ->default(fn($state, $get) => auth()->user() ? auth()->user()->name : '')
                                ->disabled(),

                            TextInput::make('department')
                                ->label('Department')
                                ->default(fn($state, $get) => auth()->user() ? auth()->user()->department : '')
                                ->disabled(),

                            TextInput::make('requested_at')
                                ->label('Date')
                                ->disabled()
                                ->default(now()->toDateString()),
                        ]),
                ]),

            // ── Purpose of Request ──────────────────────────────────
            Section::make('Purpose of Request')
                ->schema([
                    Textarea::make('description')
                        ->label('Description')
                        ->placeholder('Describe the purpose and details of your request...')

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

                                ->searchable(),

                            Select::make('launch_type')
                                ->label('Launch Type')
                                ->placeholder('Select launch type')
                                ->options([
                                    'pilot' => 'Pilot',
                                    'system_wide' => 'System Wide',
                                ]),
                        ]),
                ]),

            // ── Data Types & Channel Coverage ───────────────────────
            Section::make('Data Types & Channel Coverage')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            CheckboxList::make('data_types')
                                ->label('Data Types to Include')
                                ->options([
                                    'menu_details'          => 'Menu Details',
                                    'bom'                   => 'BOM',
                                    'mis_menu_hierarchy'    => 'MIS Menu Hierarchy',
                                    'pp_marketing_campaign' => 'PP & Marketing Campaign',
                                ])
                                ->columns(2)
                                ->gridDirection('row'),

                            CheckboxList::make('channel_coverage')
                                ->label('Channel Coverage')
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
                                ->label('Launch Date'),

                            DatePicker::make('expiry_date')
                                ->label('Expiry Date'),

                            DatePicker::make('launch_date_checker')
                                ->label('Launch Date Checker'),
                        ]),
                ]),
        ];
    }
}
