<?php

namespace App\Filament\Resources\Mmrves\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Support\Enums\Alignment;

class MmrfPlantData
{
    public static function getSchema(): array
    {
        return [
            Repeater::make('plant_data')
                ->columnSpanFull()
                ->compact()
                ->hiddenLabel()
                ->table([
                    TableColumn::make('Material'),
                    TableColumn::make('Material Description'),
                    TableColumn::make('Plant'),
                    TableColumn::make('Plant Description'),
                    TableColumn::make('P-S Material Status'),
                    TableColumn::make('Purchasing Group'),
                    TableColumn::make('Unit of Issue'),
                    TableColumn::make('MRP Type'),
                    TableColumn::make('MRP Controller'),
                    TableColumn::make('Pl. Deliv. Time'),
                    TableColumn::make('Period Ind.'),
                    TableColumn::make('Lot Sizing Procedure'),
                    TableColumn::make('Lot Sizing Procedure (Duplicate Entry)'),
                    TableColumn::make('SpecProcurement'),
                    TableColumn::make('Reorder Point'),
                    TableColumn::make('Rounding Value'),
                    TableColumn::make('Mixed MRP'),
                    TableColumn::make('Scheduling Margin Key'),
                    TableColumn::make('Backflush'),
                    TableColumn::make('Loading Group'),
                    TableColumn::make('Batch Mgmt Rqt'),
                    TableColumn::make('Availability Check'),
                    TableColumn::make('Profit Center'),
                    TableColumn::make('Plng Calendar'),
                    TableColumn::make('Consumption Mode'),
                    TableColumn::make('Bwd Cons. Per.'),
                    TableColumn::make('Cstg Lot Size'),
                    TableColumn::make('Prod. Stor. Loc.'),
                    TableColumn::make('Coverage Prof.'),
                    TableColumn::make('Strategy Group'),
                    TableColumn::make('Stor. loc. EP'),
                    TableColumn::make('Scheduling Profile'),
                    TableColumn::make('Order Unit'),
                    TableColumn::make('Valuation Class'),
                    TableColumn::make('Material Origin'),
                    TableColumn::make('Price Unit'),
                    TableColumn::make('Standard Price'),
                    TableColumn::make('MAP Price'),
                    TableColumn::make('Price Control'),
                    TableColumn::make('Storage Conditions'),
                ])
                ->schema([
                    Select::make('material_id')
                        ->label('Material')
                        ->options([
                            'mat001' => 'MAT001 - Burger Bun',
                            'mat002' => 'MAT002 - Chicken Fillet',
                            'mat003' => 'MAT003 - French Fries',
                            'mat004' => 'MAT004 - Soft Drink Cup',
                            'mat005' => 'MAT005 - Packaging Box',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('material_description')
                        ->label('Material Description'),

                    Select::make('plant_id')
                        ->label('Plant')
                        ->options([
                            'pl01' => 'PL01 - Manila Plant',
                            'pl02' => 'PL02 - Cebu Plant',
                            'pl03' => 'PL03 - Davao Plant',
                            'pl04' => 'PL04 - BGC Plant',
                            'pl05' => 'PL05 - Makati Plant',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('plant_description')
                        ->label('Plant Description'),

                    Select::make('ps_material_status_id')
                        ->label('P-S Material Status')
                        ->options([
                            'active'       => 'Active',
                            'inactive'     => 'Inactive',
                            'discontinued' => 'Discontinued',
                            'blocked'      => 'Blocked',
                        ])
                        ->searchable()
                        ->preload(),

                    Select::make('purchasing_group_id')
                        ->label('Purchasing Group')
                        ->options([
                            'pg01' => 'PG01 - Food & Beverage',
                            'pg02' => 'PG02 - Packaging',
                            'pg03' => 'PG03 - Equipment',
                            'pg04' => 'PG04 - Services',
                            'pg05' => 'PG05 - Consumables',
                        ])
                        ->searchable()
                        ->preload(),

                    Select::make('unit_of_issue_id')
                        ->label('Unit of Issue')
                        ->options([
                            'ea'  => 'EA - Each',
                            'cs'  => 'CS - Case',
                            'bx'  => 'BX - Box',
                            'kg'  => 'KG - Kilogram',
                            'pk'  => 'PK - Pack',
                        ])
                        ->searchable()
                        ->preload(),

                    Select::make('mrp_type_id')
                        ->label('MRP Type')
                        ->options([
                            'pd'  => 'PD - MRP',
                            'vb'  => 'VB - Reorder Point',
                            'nd'  => 'ND - No Planning',
                            'vv'  => 'VV - Forecast-Based',
                            'p1'  => 'P1 - MPS',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('mrp_controller')
                        ->label('MRP Controller'),

                    TextInput::make('pl_deliv_time')
                        ->label('Pl. Deliv. Time')
                        ->numeric(),

                    TextInput::make('period_ind')
                        ->label('Period Ind.'),

                    Select::make('lot_sizing_procedure_id')
                        ->label('Lot Sizing Procedure')
                        ->options([
                            'ex' => 'EX - Lot-for-Lot',
                            'fq' => 'FQ - Fixed Lot Size',
                            'hb' => 'HB - Replenish to Max',
                            'mb' => 'MB - Monthly Lot Size',
                            'wb' => 'WB - Weekly Lot Size',
                        ])
                        ->searchable()
                        ->preload(),

                    Select::make('lot_sizing_procedure_dup_id')
                        ->label('Lot Sizing Procedure (Duplicate Entry)')
                        ->options([
                            'ex' => 'EX - Lot-for-Lot',
                            'fq' => 'FQ - Fixed Lot Size',
                            'hb' => 'HB - Replenish to Max',
                            'mb' => 'MB - Monthly Lot Size',
                            'wb' => 'WB - Weekly Lot Size',
                        ])
                        ->searchable()
                        ->preload(),

                    Select::make('spec_procurement_id')
                        ->label('SpecProcurement')
                        ->options([
                            'sp01' => 'E1 - External Procurement',
                            'sp02' => 'F1 - In-House Production',
                            'sp03' => '20 - Consignment',
                            'sp04' => '40 - Stock Transfer',
                            'sp05' => '50 - Subcontracting',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('reorder_point')
                        ->label('Reorder Point')
                        ->numeric(),

                    TextInput::make('rounding_value')
                        ->label('Rounding Value')
                        ->numeric(),

                    Select::make('mixed_mrp_id')
                        ->label('Mixed MRP')
                        ->options([
                            '0' => '0 - No Mixed MRP',
                            '1' => '1 - Mixed MRP Active',
                            '2' => '2 - Phantom Assembly',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('scheduling_margin_key')
                        ->label('Scheduling Margin Key')
                        ->default('000'),

                    TextInput::make('backflush')
                        ->label('Backflush')
                        ->default('1'),

                    Select::make('loading_group_id')
                        ->label('Loading Group')
                        ->options([
                            'lg01' => 'LG01 - Manual',
                            'lg02' => 'LG02 - Forklift',
                            'lg03' => 'LG03 - Crane',
                            'lg04' => 'LG04 - Conveyor',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('batch_mgmt_rqt')
                        ->label('Batch Mgmt Rqt')
                        ->default('FALSE'),

                    Select::make('availability_check_id')
                        ->label('Availability Check')
                        ->options([
                            '01' => '01 - Daily Requirements',
                            '02' => '02 - Individual Requirements',
                            'ch' => 'CH - No Check',
                            'kp' => 'KP - No Check (Bulk)',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('profit_center')
                        ->label('Profit Center'),

                    TextInput::make('plng_calendar')
                        ->label('Plng Calendar'),

                    Select::make('consumption_mode_id')
                        ->label('Consumption Mode')
                        ->options([
                            '1' => '1 - Backwards',
                            '2' => '2 - Forwards',
                            '3' => '3 - Backwards/Forwards',
                        ])
                        ->searchable()
                        ->preload(),

                    Select::make('bwd_cons_per_id')
                        ->label('Bwd Cons. Per.')
                        ->options([
                            '0'  => '0 - No Consumption',
                            '5'  => '5 Days',
                            '10' => '10 Days',
                            '30' => '30 Days',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('cstg_lot_size')
                        ->label('Cstg Lot Size')
                        ->default('1000'),

                    Select::make('prod_stor_loc_id')
                        ->label('Prod. Stor. Loc.')
                        ->options([
                            'sl01' => 'SL01 - Main Warehouse',
                            'sl02' => 'SL02 - Cold Storage',
                            'sl03' => 'SL03 - Dry Storage',
                            'sl04' => 'SL04 - Production Floor',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('coverage_prof')
                        ->label('Coverage Prof.'),

                    TextInput::make('strategy_group')
                        ->label('Strategy Group')
                        ->default('40'),

                    Select::make('stor_loc_ep_id')
                        ->label('Stor. loc. EP')
                        ->options([
                            'sl01' => 'SL01 - Main Warehouse',
                            'sl02' => 'SL02 - Cold Storage',
                            'sl03' => 'SL03 - Dry Storage',
                            'sl04' => 'SL04 - Production Floor',
                        ])
                        ->searchable()
                        ->preload(),

                    Select::make('scheduling_profile_id')
                        ->label('Scheduling Profile')
                        ->options([
                            'sp01' => 'SP01 - Standard',
                            'sp02' => 'SP02 - Rush',
                            'sp03' => 'SP03 - Extended',
                        ])
                        ->searchable()
                        ->preload(),

                    Select::make('order_unit_id')
                        ->label('Order Unit')
                        ->options([
                            'ea'  => 'EA - Each',
                            'cs'  => 'CS - Case',
                            'bx'  => 'BX - Box',
                            'kg'  => 'KG - Kilogram',
                            'pk'  => 'PK - Pack',
                        ])
                        ->searchable()
                        ->preload(),

                    Select::make('valuation_class_id')
                        ->label('Valuation Class')
                        ->options([
                            '3000' => '3000 - Finished Goods',
                            '3001' => '3001 - Semi-Finished',
                            '3002' => '3002 - Raw Materials',
                            '3003' => '3003 - Packaging',
                            '3004' => '3004 - Spare Parts',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('material_origin')
                        ->label('Material Origin')
                        ->default('X'),

                    TextInput::make('price_unit')
                        ->label('Price Unit')
                        ->default('1000'),

                    TextInput::make('standard_price')
                        ->label('Standard Price')
                        ->numeric(),

                    TextInput::make('map_price')
                        ->label('MAP Price')
                        ->numeric(),

                    Select::make('price_control_id')
                        ->label('Price Control')
                        ->options([
                            'v' => 'V - Moving Average Price',
                            's' => 'S - Standard Price',
                        ])
                        ->searchable()
                        ->preload(),

                    Select::make('storage_conditions_id')
                        ->label('Storage Conditions')
                        ->options([
                            'sc01' => 'SC01 - Ambient',
                            'sc02' => 'SC02 - Refrigerated (2-8°C)',
                            'sc03' => 'SC03 - Frozen (-18°C)',
                            'sc04' => 'SC04 - Controlled (15-25°C)',
                            'sc05' => 'SC05 - Hazardous',
                        ])
                        ->searchable()
                        ->preload(),
                ])
                ->addable(true)
                ->addActionLabel('Add Another Data')
                ->addAction(fn($action) => $action->icon('heroicon-m-plus-circle'))
                ->addActionAlignment(Alignment::Start)
                ->deletable(true)
                ->reorderable(false)
                ->defaultItems(5),
        ];
    }
}
