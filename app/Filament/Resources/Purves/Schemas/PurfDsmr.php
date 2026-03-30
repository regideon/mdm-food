<?php

namespace App\Filament\Resources\Purves\Schemas;

use Filament\Forms\Components\ViewField;

class PurfDsmr
{
    public static function getSchema(): array
    {
        return [
            ViewField::make('dsmr_items')
                ->view('components.repeater-table')
                ->viewData([
                    'columns' => [
                        ['key' => 'dsmr_action_required',                'label' => 'Action Required',                          'width' => '150px', 'type' => 'select',   'options' => [], 'placeholder' => 'Select action'],
                        ['key' => 'dsmr_product_material_code',          'label' => 'Product Material Code',                    'width' => '170px'],
                        ['key' => 'dsmr_grouping',                       'label' => 'DSMR Grouping',                            'width' => '160px', 'type' => 'select',   'options' => [], 'placeholder' => 'Select DSMR grouping'],
                        ['key' => 'dsmr_yield_quantity',                 'label' => 'Yield Quantity',                           'width' => '130px', 'type' => 'number'],
                        ['key' => 'dsmr_base_item_lookup',               'label' => 'Base Item Lookup',                         'width' => '160px', 'type' => 'readonly'],
                        ['key' => 'dsmr_grouping_repeated',              'label' => 'DSMR Grouping (Repeated)',                 'width' => '180px'],
                        ['key' => 'dsmr_item_type',                      'label' => 'Item Type',                                'width' => '130px', 'type' => 'select',   'options' => [], 'placeholder' => 'Select item type'],
                        ['key' => 'dsmr_make_default_base_item',         'label' => 'Default Base Item',                       'width' => '130px', 'type' => 'checkbox'],
                        ['key' => 'dsmr_product_material_code_secondary', 'label' => 'Product Material Code (Secondary)',        'width' => '200px'],
                        ['key' => 'dsmr_group_base_item',                'label' => 'DSMR Group Base Item',                    'width' => '160px', 'type' => 'select',   'options' => [], 'placeholder' => 'Select base item'],
                        ['key' => 'dsmr_yield_quantity_secondary',       'label' => 'Yield Quantity (Secondary)',               'width' => '180px', 'type' => 'number'],
                    ],
                    'defaultItems' => 15,
                ])
                ->columnSpanFull()
                ->hiddenLabel(),
        ];
    }
}
