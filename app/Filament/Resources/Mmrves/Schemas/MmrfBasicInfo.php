<?php

namespace App\Filament\Resources\Mmrves\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\View;
use Filament\Schemas\Components\Wizard;

class MmrfBasicInfo
{
    public static function getSchema(): array
    {
        return [
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
                                ->placeholder('Enter tracking number'),

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

                        ->rows(5)
                        ->columnSpanFull(),
                ]),
        ];
    }
}
