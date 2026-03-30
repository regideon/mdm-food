<?php

namespace App\Filament\Resources\Purves\Schemas;

use Filament\Forms\Components\ViewField;

class PurfProductHierarchy
{
    public static function getSchema(): array
    {
        return [
            ViewField::make('product_hierarchy_items')
                ->view('components.repeater-table')
                ->viewData([
                    'columns' => [
                        ['key' => 'ph_product_code',          'label' => 'Product Code',          'width' => '130px'],
                        ['key' => 'ph_sales_item_name',       'label' => 'Sales Item Name',        'width' => '150px'],
                        ['key' => 'ph_sales_item_description','label' => 'Sales Item Description', 'width' => '180px'],
                        ['key' => 'ph_sales_item_category',   'label' => 'Sales Item Category',    'width' => '150px', 'type' => 'select', 'options' => [], 'placeholder' => 'Select category'],
                        ['key' => 'ph_product_type',          'label' => 'Product Type',           'width' => '130px', 'type' => 'select', 'options' => [], 'placeholder' => 'Select product type'],
                        ['key' => 'ph_product_segment',       'label' => 'Product Segment',        'width' => '140px', 'type' => 'select', 'options' => [], 'placeholder' => 'Select product segment'],
                        ['key' => 'ph_bundle_type',           'label' => 'Bundle Type',            'width' => '130px', 'type' => 'select', 'options' => [], 'placeholder' => 'Select bundle type'],
                        ['key' => 'ph_menu_type',             'label' => 'Menu Type',              'width' => '130px', 'type' => 'select', 'options' => [], 'placeholder' => 'Select menu type'],
                        ['key' => 'ph_meat_block_1',          'label' => 'Meat Block 1',           'width' => '130px', 'type' => 'select', 'options' => [], 'placeholder' => 'Select meat block'],
                    ],
                    'defaultItems' => 15,
                ])
                ->columnSpanFull()
                ->hiddenLabel(),
        ];
    }
}