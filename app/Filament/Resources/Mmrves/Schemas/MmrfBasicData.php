<?php

namespace App\Filament\Resources\Mmrves\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Support\Enums\Alignment;

class MmrfBasicData
{
    public static function getSchema(): array
    {
        return [
            Repeater::make('basic_data')
                ->columnSpanFull()
                ->compact()
                ->hiddenLabel()
                ->table([
                    TableColumn::make('Material'),
                    TableColumn::make('Material Type'),
                    TableColumn::make('Industry Sector'),
                    TableColumn::make('Description'),
                    TableColumn::make('Base Unit'),
                    TableColumn::make('Material Group'),
                    TableColumn::make('Old Material Number'),
                    TableColumn::make('Ext. Material Group'),
                    TableColumn::make('Division'),
                    TableColumn::make('Lab/Office'),
                    TableColumn::make('Product Allocation'),
                    TableColumn::make('Product Hierarchy'),
                    TableColumn::make('X-Plant Status'),
                    TableColumn::make('Valid From'),
                    TableColumn::make('GenItemCatGroup'),
                    TableColumn::make('Authorization Group'),
                    TableColumn::make('Gross Weight'),
                    TableColumn::make('Net Weight'),
                    TableColumn::make('Weight Unit'),
                    TableColumn::make('Volume'),
                    TableColumn::make('Volume Unit'),
                    TableColumn::make('Size/Dimensions'),
                    TableColumn::make('Length'),
                    TableColumn::make('Width'),
                    TableColumn::make('Height'),
                    TableColumn::make('Unit of Dimension'),
                    TableColumn::make('Alternative Unit'),
                    TableColumn::make('Base Unit Value'),
                    TableColumn::make('EAN/UPC'),
                    TableColumn::make('EAN Category'),
                    TableColumn::make('Matl Grp Pckmat'),
                    TableColumn::make('Ref. mat. for pckg'),
                    TableColumn::make('Basic Material'),
                    TableColumn::make('DGIndProfile'),
                    TableColumn::make('Envt. Relevant'),
                    TableColumn::make('In Bulk/Liquid'),
                    TableColumn::make('Highly Viscous'),
                    TableColumn::make('Configurable'),
                    TableColumn::make('X-Plant CM'),
                    TableColumn::make('Document'),
                    TableColumn::make('Document Type'),
                    TableColumn::make('Document Version'),
                    TableColumn::make('Page Number'),
                    TableColumn::make('Doc. Change No.'),
                    TableColumn::make('Page Format'),
                    TableColumn::make('Number of Sheets'),
                    TableColumn::make('Order Unit'),
                    TableColumn::make('Purch. Value Key'),
                    TableColumn::make('Alternative Unit Value'),
                    TableColumn::make('Volume Unit (CCM)'),
                ])
                ->schema([
                    TextInput::make('material')
                        ->label('Material'),

                    Select::make('material_type_id')
                        ->label('Material Type')
                        ->options([
                            'fert' => 'FERT - Finished Product',
                            'halb' => 'HALB - Semi-Finished Product',
                            'roh'  => 'ROH - Raw Material',
                            'hibe' => 'HIBE - Operating Supplies',
                            'verp' => 'VERP - Packaging',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('industry_sector')
                        ->label('Industry Sector')
                        ->default('F'),

                    TextInput::make('description')
                        ->label('Description')
                        ->maxLength(40),

                    Select::make('base_unit_id')
                        ->label('Base Unit')
                        ->options([
                            'ea'  => 'EA - Each',
                            'kg'  => 'KG - Kilogram',
                            'g'   => 'G - Gram',
                            'l'   => 'L - Liter',
                            'ml'  => 'ML - Milliliter',
                            'cs'  => 'CS - Case',
                            'bx'  => 'BX - Box',
                            'pk'  => 'PK - Pack',
                            'dz'  => 'DZ - Dozen',
                            'pc'  => 'PC - Piece',
                        ])
                        ->searchable()
                        ->preload(),

                    Select::make('material_group_id')
                        ->label('Material Group')
                        ->options([
                            'mg01' => 'MG01 - Food & Beverage',
                            'mg02' => 'MG02 - Packaging Materials',
                            'mg03' => 'MG03 - Raw Materials',
                            'mg04' => 'MG04 - Spare Parts',
                            'mg05' => 'MG05 - Consumables',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('old_material_number')
                        ->label('Old Material Number'),

                    Select::make('ext_material_group_id')
                        ->label('Ext. Material Group')
                        ->options([
                            'emg01' => 'EMG01 - External Group A',
                            'emg02' => 'EMG02 - External Group B',
                            'emg03' => 'EMG03 - External Group C',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('division')
                        ->label('Division')
                        ->default('10'),

                    TextInput::make('lab_office')
                        ->label('Lab/Office'),

                    TextInput::make('product_allocation')
                        ->label('Product Allocation'),

                    TextInput::make('product_hierarchy')
                        ->label('Product Hierarchy'),

                    TextInput::make('x_plant_status')
                        ->label('X-Plant Status'),

                    TextInput::make('valid_from')
                        ->label('Valid From'),

                    TextInput::make('gen_item_cat_group')
                        ->label('GenItemCatGroup')
                        ->default('NORM'),

                    TextInput::make('authorization_group')
                        ->label('Authorization Group'),

                    TextInput::make('gross_weight')
                        ->label('Gross Weight')
                        ->numeric(),

                    TextInput::make('net_weight')
                        ->label('Net Weight')
                        ->numeric(),

                    TextInput::make('weight_unit')
                        ->label('Weight Unit')
                        ->default('KG'),

                    TextInput::make('volume')
                        ->label('Volume')
                        ->numeric(),

                    Select::make('volume_unit_id')
                        ->label('Volume Unit')
                        ->options([
                            'l'   => 'L - Liter',
                            'ml'  => 'ML - Milliliter',
                            'ccm' => 'CCM - Cubic Centimeter',
                            'cm3' => 'CM3 - Cubic Centimeter',
                            'm3'  => 'M3 - Cubic Meter',
                        ])
                        ->searchable()
                        ->preload(),

                    Select::make('size_dimensions_id')
                        ->label('Size/Dimensions')
                        ->options([
                            'small'  => 'Small',
                            'medium' => 'Medium',
                            'large'  => 'Large',
                            'xlarge' => 'X-Large',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('length')
                        ->label('Length')
                        ->numeric(),

                    TextInput::make('width')
                        ->label('Width')
                        ->numeric(),

                    TextInput::make('height')
                        ->label('Height')
                        ->numeric(),

                    Select::make('unit_of_dimension_id')
                        ->label('Unit of Dimension')
                        ->default('cm')
                        ->options([
                            'cm' => 'CM - Centimeter',
                            'mm' => 'MM - Millimeter',
                            'm'  => 'M - Meter',
                            'in' => 'IN - Inch',
                            'ft' => 'FT - Feet',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('alternative_unit')
                        ->label('Alternative Unit')
                        ->numeric(),

                    TextInput::make('base_unit_value')
                        ->label('Base Unit Value')
                        ->numeric(),

                    TextInput::make('ean_upc')
                        ->label('EAN/UPC'),

                    TextInput::make('ean_category')
                        ->label('EAN Category'),

                    TextInput::make('matl_grp_pckmat')
                        ->label('Matl Grp Pckmat'),

                    TextInput::make('ref_mat_for_pckg')
                        ->label('Ref. mat. for pckg'),

                    TextInput::make('basic_material')
                        ->label('Basic Material'),

                    TextInput::make('dg_ind_profile')
                        ->label('DGIndProfile'),

                    TextInput::make('envt_relevant')
                        ->label('Envt. Relevant'),

                    TextInput::make('in_bulk_liquid')
                        ->label('In Bulk/Liquid'),

                    TextInput::make('highly_viscous')
                        ->label('Highly Viscous'),

                    TextInput::make('configurable')
                        ->label('Configurable'),

                    TextInput::make('x_plant_cm')
                        ->label('X-Plant CM'),

                    TextInput::make('document')
                        ->label('Document'),

                    TextInput::make('document_type')
                        ->label('Document Type'),

                    TextInput::make('document_version')
                        ->label('Document Version')
                        ->numeric(),

                    TextInput::make('page_number')
                        ->label('Page Number')
                        ->numeric(),

                    TextInput::make('doc_change_no')
                        ->label('Doc. Change No.')
                        ->numeric(),

                    TextInput::make('page_format')
                        ->label('Page Format'),

                    TextInput::make('number_of_sheets')
                        ->label('Number of Sheets'),

                    Select::make('order_unit_id')
                        ->label('Order Unit')
                        ->default('norm')
                        ->options([
                            'norm' => 'NORM - Standard',
                            'ea'   => 'EA - Each',
                            'cs'   => 'CS - Case',
                            'kg'   => 'KG - Kilogram',
                            'bx'   => 'BX - Box',
                        ])
                        ->searchable()
                        ->preload(),

                    Select::make('purch_value_key_id')
                        ->label('Purch. Value Key')
                        ->options([
                            'pvk1' => 'PVK1 - Standard',
                            'pvk2' => 'PVK2 - Special',
                            'pvk3' => 'PVK3 - Consignment',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('alternative_unit_value')
                        ->label('Alternative Unit Value'),

                    Select::make('volume_unit_2_id')
                        ->label('Volume Unit (CCM)')
                        ->default('ccm')
                        ->options([
                            'ccm' => 'CCM - Cubic Centimeter',
                            'l'   => 'L - Liter',
                            'ml'  => 'ML - Milliliter',
                            'm3'  => 'M3 - Cubic Meter',
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