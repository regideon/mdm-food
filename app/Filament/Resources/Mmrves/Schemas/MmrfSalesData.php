<?php

namespace App\Filament\Resources\Mmrves\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Support\Enums\Alignment;

class MmrfSalesData
{
    public static function getSchema(): array
    {
        return [
            Repeater::make('sales_data')
                ->columnSpanFull()
                ->compact()
                ->hiddenLabel()
                ->table([
                    TableColumn::make('Material'),
                    TableColumn::make('Material Description'),
                    TableColumn::make('Sales Org.'),
                    TableColumn::make('Distribution Channel'),
                    TableColumn::make('Material Statistics Group'),
                    TableColumn::make('Sales Unit'),
                    TableColumn::make('Item Category Group'),
                    TableColumn::make('Account Assignment Group for Material'),
                    TableColumn::make('Material Group 1'),
                    TableColumn::make('Transportation Group'),
                    TableColumn::make('Sales Tax'),
                    TableColumn::make('Tax Category'),
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

                    Select::make('sales_org_id')
                        ->label('Sales Org.')
                        ->options([
                            'so01' => 'SO01 - Philippines',
                            'so02' => 'SO02 - NCR',
                            'so03' => 'SO03 - Visayas',
                            'so04' => 'SO04 - Mindanao',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('distribution_channel')
                        ->label('Distribution Channel')
                        ->default('10'),

                    TextInput::make('material_statistics_group')
                        ->label('Material Statistics Group')
                        ->default('1'),

                    Select::make('sales_unit_id')
                        ->label('Sales Unit')
                        ->options([
                            'ea'  => 'EA - Each',
                            'cs'  => 'CS - Case',
                            'bx'  => 'BX - Box',
                            'pk'  => 'PK - Pack',
                            'kg'  => 'KG - Kilogram',
                            'dz'  => 'DZ - Dozen',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('item_category_group')
                        ->label('Item Category Group')
                        ->default('NORM'),

                    Select::make('account_assignment_group_id')
                        ->label('Account Assignment Group for Material')
                        ->options([
                            'aag01' => '01 - Trading Goods',
                            'aag02' => '02 - Raw Materials',
                            'aag03' => '03 - Finished Goods',
                            'aag04' => '04 - Services',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('material_group_1')
                        ->label('Material Group 1'),

                    Select::make('transportation_group_id')
                        ->label('Transportation Group')
                        ->options([
                            'tg01' => 'TG01 - Standard',
                            'tg02' => 'TG02 - Refrigerated',
                            'tg03' => 'TG03 - Frozen',
                            'tg04' => 'TG04 - Hazardous',
                            'tg05' => 'TG05 - Fragile',
                        ])
                        ->searchable()
                        ->preload(),

                    TextInput::make('sales_tax')
                        ->label('Sales Tax')
                        ->numeric(),

                    TextInput::make('tax_category')
                        ->label('Tax Category')
                        ->default('TTX1'),
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
